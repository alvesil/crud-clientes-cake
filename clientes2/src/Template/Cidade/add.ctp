<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cidade $cidade
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cidade'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="cidade form large-9 medium-8 columns content">
    <?= $this->Form->create($cidade) ?>
    <fieldset>
        <legend><?= __('Add Cidade') ?></legend>
        <?php
            echo $this->Form->control('fk_id_uf');
            echo $this->Form->control('cidade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
