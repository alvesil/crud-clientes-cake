<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $cliente
 */
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cliente index large-9 medium-8 columns content">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
    <h3><?= __('Cliente') ?></h3>
    <table id="clienteIndexTable" cellpadding="0" cellspacing="0">
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
            <?php foreach ($cliente as $cliente) : ?>
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
    $(document).ready(function() {
        //WebSocket
        var conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function(e) {
            console.log("Connection established!");
        };
        conn.onmessage = function(e) {
            console.log(e.data);
            //showMessages('other', e.data);
            $('.toast-body').text(e.data);
            $('.toast').toast({delay: 50000});
            $('.toast').toast('show');

        };
        $("#clienteIndexTable #fk_id_uf").each(function() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                },
                url: '<?= $this->Url->build(['controller' => 'Uf', 'action' => 'getUf']) ?>',
                type: 'POST',
                data: {
                    id_uf: $(this).text()
                },
                success: function(data) {
                    var resultado = JSON.parse(data);
                    console.log(resultado);
                    $("#clienteIndexTable #fk_id_uf").text(resultado.message.UF);
                }
            });
        });
        $("#clienteIndexTable #fk_id_cidade").each(function() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': '<?= h($this->request->getParam('_csrfToken')); ?>'
                },
                url: '<?= $this->Url->build(['controller' => 'Cidade', 'action' => 'getCidade']) ?>',
                type: 'POST',
                data: {
                    id_cidade: $(this).text()
                },
                success: function(data) {
                    var resultado = JSON.parse(data);
                    $("#clienteIndexTable #fk_id_cidade").text(resultado.data.cidade);
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>