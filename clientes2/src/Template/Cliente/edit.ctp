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
