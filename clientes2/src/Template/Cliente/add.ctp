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
            echo $this->Form->control('sexo');
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
            var urlUFs = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'getUfs']) ?>';
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
            $("#fk_id_uf").on('change', function() {
                var id_cidade = $('#fk_id_uf').val();
                //alert(id_cidade);
                var urlCidades = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'getCidades']) ?>';
                $.ajax({
                    url: urlCidades,
                    data: {
                        id: $(this).val()
                    },
                    method: 'PUT',
                    dataType: 'json',
                    success: function(data) {
                        console.log(JSON.parse(data));
                        // var cidades = JSON.parse(data);
                        // console.log(cidades);
                        // var options = '<option value="">Selecione</option>';
                        // for (var i = 0; i < cidades.message.length; i++) {
                        //     options += '<option value="' + cidades.message[i].id + '">' + cidades.message[i].UF + '</option>';
                        // }
                        // $('#fk_id_cidade').html(options);
                    },
                    error: function(data) {
                        console.log(JSON.stringify(data));
                        //console.log(data);
                    },
                    always: function(data) {
                        //alert(data);
                    },
                    headers: {
                        'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                    }
                });
            });

        });
    });
</script>