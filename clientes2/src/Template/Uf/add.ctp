<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uf $uf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Uf'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="uf form large-9 medium-8 columns content">
    <?= $this->Form->create($uf) ?>
    <fieldset>
        <legend><?= __('Add Uf') ?></legend>
        <?php
            echo $this->Form->control('UF');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
