<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $endereco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Endereco'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="endereco form large-9 medium-8 columns content">
    <?= $this->Form->create($endereco) ?>
    <fieldset>
        <legend><?= __('Edit Endereco') ?></legend>
        <?php
            echo $this->Form->control('fk_id_cliente');
            echo $this->Form->control('endereco');
            echo $this->Form->control('complemento');
            echo $this->Form->control('bairro');
            echo $this->Form->control('cep');
            echo $this->Form->control('fk_id_uf');
            echo $this->Form->control('fk_id_cidade');
            echo $this->Form->control('dt_cadastro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
