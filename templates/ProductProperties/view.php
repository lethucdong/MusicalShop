<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductProperty $productProperty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Property'), ['action' => 'edit', $productProperty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Property'), ['action' => 'delete', $productProperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productProperty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Property'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productProperties view content">
            <h3><?= h($productProperty->created_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($productProperty->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($productProperty->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productProperty->has('product') ? $this->Html->link($productProperty->product->name, ['controller' => 'Products', 'action' => 'view', $productProperty->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Property') ?></th>
                    <td><?= $productProperty->has('property') ? $this->Html->link($productProperty->property->name, ['controller' => 'Properties', 'action' => 'view', $productProperty->property->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productProperty->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($productProperty->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($productProperty->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $productProperty->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
