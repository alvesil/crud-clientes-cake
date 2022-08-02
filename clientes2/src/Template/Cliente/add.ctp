<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cliente form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Add Cliente') ?></legend>
        <div class="beforeCPFCheck">
            <?php
            echo $this->Form->control('nome');
            ?>
        </div>
        <?php
        echo $this->Form->control('cpf', ['id' => 'cpf']);
        ?>
        <div class="beforeCPFCheck">
            <?php
            echo $this->Form->control('dt_nascimento');
            echo $this->Form->control('sexo', ['options' => ['M' => 'Masculino', 'F' => 'Feminino']]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('fk_id_uf', ['type' => 'select', 'id' => 'fk_id_uf']);
            echo $this->Form->control('fk_id_cidade', ['type' => 'select', 'id' => 'fk_id_cidade']);
            echo $this->Form->control('dt_cadastro');
            ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Checar'), ['id' => 'check', 'type' => 'button']) ?>
    <?= $this->Form->button(__('Submit'), ['id' => 'submit']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {
        $(".beforeCPFCheck").hide();
        $("#submit").hide();

        $('#check').on('click', function() {
            var cpf = $('#cpf').val();
            var targeturl = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'verifyCpf']) ?>';
            var urlUFs = '<?= $this->Url->build(['controller' => 'Uf', 'action' => 'getUfs']) ?>';
            //console.log(targeturl);

            $.ajax({
                url: targeturl,
                method: 'POST',
                data: {
                    cpf: $('#cpf').val()
                },
                success: function(data) {
                    let resposta = JSON.parse(data);
                    if (resposta['status'] == 'error') {
                        alert('CPF já cadastrado');
                        $('#cpf').val('');
                    } else {
                        var cpf = $('#cpf').val();
                        $("#cpf").on('keyup', function() {
                            alert('Voce não pode alterar este campo!');
                            $('#cpf').val(cpf);
                            $("#cpf").attr('readonly', true);
                        })
                        $("#cpf").attr('readonly', true);
                        $(".beforeCPFCheck").show();
                        $("#submit").show();
                        $("#check").hide();
                        $.ajax({
                            url: urlUFs,
                            method: 'GET',
                            success: function(data) {
                                var ufs = JSON.parse(data);
                                //console.log(ufs.message[0].UF);
                                var options = '<option value="">Selecione</option>';
                                for (var i = 0; i < ufs.message.length; i++) {
                                    options += '<option value="' + ufs.message[i].id + '">' + ufs.message[i].UF + '</option>';
                                }
                                $('#fk_id_uf').html(options);

                            },
                            error: function(data) {
                                alert(data);
                            },
                            always: function(data) {
                                //alert(data);
                            },
                            headers: {
                                'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                            }
                        });
                    }
                },
                headers: {
                    'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                }
            });


        });
        $("#fk_id_uf").on('change', function() {
            var id_cidade = $('#fk_id_uf').val();
            //alert(id_cidade);
            var urlCidades = '<?= $this->Url->build(['controller' => 'Cidade', 'action' => 'getCidades']) ?>';
            console.log(1);
            $.ajax({
                headers: {
                    'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                },
                url: 'http://localhost/crud-clientes-cake/clientes2/cidade/get-cidades',
                data: {
                    id: $(this).val()
                },
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log(data.data);
                    if (data.data.length > 0) {
                        var options = '<option value="">Selecione</option>';
                    }else{
                        var options = '<option value="">Nenhuma cidade encontrada par a UF selecionada</option>';
                    }
                    $.each(data.data, function(index, value) {
                        options += '<option value="' + value.id + '">' + value.cidade + '</option>';
                    });
                    $('#fk_id_cidade').html(options);
                },
                error: function(data) {
                    console.log(data);
                },
            });
        });
    });
</script>