<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ImageProduct> $imageProducts
 */
?>
<div class="imageProducts index content">
    <?= $this->Html->link(__('New Image Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Image Products') ?></h3>
    <!-- Form tìm kiếm -->
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('search', ['label' => __('Search'), 'value' => $this->request->getQuery('search')]) ?>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('piority') ?></th>
                    <th><?= $this->Paginator->sort('path_image') ?></th>
                    <th><?= $this->Paginator->sort('start_date') ?></th>
                    <th><?= $this->Paginator->sort('end_date') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('created_by') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_by') ?></th>
                    <!-- <th><?= $this->Paginator->sort('delete_flg') ?></th> -->
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imageProducts as $imageProduct): ?>
                <tr>
                    <td><?= $this->Number->format($imageProduct->id) ?></td>
                    <td><?= $this->Number->format($imageProduct->piority) ?></td>
                    <td><?= h($imageProduct->path_image) ?></td>
                    <td><?= h($imageProduct->start_date) ?></td>
                    <td><?= h($imageProduct->end_date) ?></td>
                    <td><?= h($imageProduct->created_at) ?></td>
                    <td><?= h($imageProduct->created_by) ?></td>
                    <td><?= h($imageProduct->updated_at) ?></td>
                    <td><?= h($imageProduct->updated_by) ?></td>
                    <!-- <td><?= h($imageProduct->delete_flg) ?></td> -->
                    <td><?= $imageProduct->has('product') ? $this->Html->link($imageProduct->product->name, ['controller' => 'Products', 'action' => 'view', $imageProduct->product->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $imageProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imageProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imageProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageProduct->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
