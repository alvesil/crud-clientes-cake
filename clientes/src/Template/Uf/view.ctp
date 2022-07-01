<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uf $uf
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Uf'), ['action' => 'edit', $uf->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Uf'), ['action' => 'delete', $uf->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uf->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Uf'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Uf'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="uf view large-9 medium-8 columns content">
    <h3><?= h($uf->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('UF') ?></th>
            <td><?= h($uf->UF) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($uf->id) ?></td>
        </tr>
    </table>
</div>
