<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Cliente'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cliente form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Edit Cliente') ?></legend>
        <?php
        echo $this->Form->control('nome');
        echo $this->Form->control('cpf');
        echo $this->Form->control('dt_nascimento', ['type' => 'date', 'value' => date('Y-m-d', strtotime($cliente->dt_nascimento))]);
        echo $this->Form->control('sexo');
        echo $this->Form->control('observacao');
        echo $this->Form->control('fk_id_uf', ['type' => 'select', 'id' => 'fk_id_uf']);
        echo $this->Form->control('fk_id_cidade', ['type' => 'select', 'id' => 'fk_id_cidade']);
        echo $this->Form->control('dt_nascimento', ['type' => 'date', 'value' => date('Y-m-d', strtotime($cliente->dt_cadastro))]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function() {
        var cpf = $('#cpf').val();
        var targeturl = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'verifyCpf']) ?>';
        var urlUFs = '<?= $this->Url->build(['controller' => 'Uf', 'action' => 'getUfs']) ?>';
        
        $.ajax({
            headers: {
                'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
            },
            url: urlUFs,
            method: 'GET',
            success: function(data) {
                var ufs = JSON.parse(data);
                //console.log(ufs.message[0].UF);
                var options = '<option value="">Selecione</option>';
                for (var i = 0; i < ufs.message.length; i++) {
                    if (ufs.message[i].id == <?= $cliente->fk_id_uf ?>) {
                        options += '<option selected value="' + ufs.message[i].id + '">' + ufs.message[i].UF + '</option>';
                    } else {
                        options += '<option value="' + ufs.message[i].id + '">' + ufs.message[i].UF + '</option>';
                    }
                }
                $('#fk_id_uf').html(options);

            },
            error: function(data) {
                alert(data);
            },
            always: function(data) {
                //alert(data);
            }
        });
        $("#fk_id_uf").on('change', function() {
            var id_cidade = $('#fk_id_uf').val();
            //alert(id_cidade);
            var urlCidades = '<?= $this->Url->build(['controller' => 'Cidade', 'action' => 'getCidades']) ?>';
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
                    } else {
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
        $.ajax({
            headers: {
                'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
            },
            url: 'http://localhost/crud-clientes-cake/clientes2/cidade/get-cidades',
            data: {
                id: '<?= $cliente->fk_id_uf ?>'
            },
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                console.log(data.data);
                if (data.data.length > 0) {
                    var options = '<option value="">Selecione</option>';
                } else {
                    var options = '<option value="">Nenhuma cidade encontrada par a UF selecionada</option>';
                }
                $.each(data.data, function(index, value) {
                    if (value.id == <?= $cliente->fk_id_cidade ?>) {
                        options += '<option selected value="' + value.id + '">' + value.cidade + '</option>';
                    }else{
                        options += '<option value="' + value.id + '">' + value.cidade + '</option>';
                    }
                });
                $('#fk_id_cidade').html(options);
            },
            error: function(data) {
                console.log(data);
            },
        });
    });
</script>