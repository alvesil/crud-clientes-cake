<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco $endereco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Endereco'), ['action' => 'edit', $endereco->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Endereco'), ['action' => 'delete', $endereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Endereco'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Endereco'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="endereco view large-9 medium-8 columns content">
    <h3><?= h($endereco->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($endereco->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Complemento') ?></th>
            <td><?= h($endereco->complemento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bairro') ?></th>
            <td><?= h($endereco->bairro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($endereco->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($endereco->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Id Cliente') ?></th>
            <td><?= $this->Number->format($endereco->fk_id_cliente) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Id Uf') ?></th>
            <td><?= $this->Number->format($endereco->fk_id_uf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fk Id Cidade') ?></th>
            <td><?= $this->Number->format($endereco->fk_id_cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dt Cadastro') ?></th>
            <td><?= h($endereco->dt_cadastro) ?></td>
        </tr>
    </table>
</div>
