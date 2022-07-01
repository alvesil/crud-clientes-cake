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
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('cpf', ['name' => 'cpf', 'id' => 'cpf']);
            echo $this->Form->control('dt_nascimento');
            echo $this->Form->control('sexo');
            echo $this->Form->control('observacao');
            echo $this->Form->control('fk_id_uf');
            echo $this->Form->control('fk_id_cidade');
            echo $this->Form->control('dt_cadastro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $(document).ready(function(){
        $('#cpf').change(function(){
            var cpf = $('#cpf').val();
            var targeturl = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'verifyCpf']) ?>';
            console.log(targeturl);
            $.ajax({
                url: targeturl,
                method: 'POST',
                data: {cpf: $(this).val()},
                success: function(data){
                    let resposta = JSON.parse(data);  
                    if(resposta['status'] == 'error'){
                        alert('CPF já cadastrado');
                       
                        $('#cpf').val('');
                    }
                },
                headers:{   
                    'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                }
            });
        });
    });
</script>