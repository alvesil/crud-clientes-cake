<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Endereco[]|\Cake\Collection\CollectionInterface $endereco
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Endereco'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="endereco index large-9 medium-8 columns content">
    <h3><?= __('Endereco') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_cliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('endereco') ?></th>
                <th scope="col"><?= $this->Paginator->sort('complemento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bairro') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cep') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_uf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dt_cadastro') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($endereco as $endereco): ?>
            <tr>
                <td><?= $this->Number->format($endereco->id) ?></td>
                <td><?= $this->Number->format($endereco->fk_id_cliente) ?></td>
                <td><?= h($endereco->endereco) ?></td>
                <td><?= h($endereco->complemento) ?></td>
                <td><?= h($endereco->bairro) ?></td>
                <td><?= h($endereco->cep) ?></td>
                <td><?= $this->Number->format($endereco->fk_id_uf) ?></td>
                <td><?= $this->Number->format($endereco->fk_id_cidade) ?></td>
                <td><?= h($endereco->dt_cadastro) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $endereco->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $endereco->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $endereco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $endereco->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
