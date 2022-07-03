<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cliente index large-9 medium-8 columns content">
    <h3><?= __('Cliente') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dt_nascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sexo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_uf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_cidade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dt_cadastro') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cliente as $cliente): ?>
            <tr>
                <td><?= $this->Number->format($cliente->id) ?></td>
                <td><?= h($cliente->nome) ?></td>
                <td><?= h($cliente->cpf) ?></td>
                <td><?= h($cliente->dt_nascimento) ?></td>
                <td><?= h($cliente->sexo) ?></td>
                <td id="fk_id_uf"><?= $this->Number->format($cliente->fk_id_uf) ?></td>
                <td id="fk_id_cidade"><?= $this->Number->format($cliente->fk_id_cidade) ?></td>
                <td><?= h($cliente->dt_cadastro) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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
<script>
    $(document).ready(function() {;
        let fk_id_uf = $('#fk_id_uf').text();
        let urlUF = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'getUf']) ?>';
        let urlCidade = '<?= $this->Url->build(['controller' => 'Cliente', 'action' => 'getCidade']) ?>';
        $.ajax({
            url: urlUF,
            method: 'POST',
            data: {id_uf: fk_id_uf},
            success: function(data) {
                //alert(data);
                var uf = JSON.parse(data);
                //alert(uf.message["UF"]);
                $('#fk_id_uf').text(uf.message["UF"]);
            },
            error: function(data) {
                //alert(data);
            },
            always: function(data) {
                //alert(data);
            },
            headers:{   
                'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
            }
        });
        $.ajax({
            url: urlCidade,
            method: 'POST',
            data: {id_cidade: fk_id_cidade},
            success: function(data) {
                //alert(data);
                var uf = JSON.parse(data);
                //alert(uf.message["UF"]);
                $('#fk_id_cidade').text(uf.message["cidade"]);
            },
            error: function(data) {
                //alert(data);
            },
            always: function(data) {
                //alert(data);
            },
            headers:{   
                'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
            }
        });
    });
</script>