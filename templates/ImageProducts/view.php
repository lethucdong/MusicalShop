<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageProduct $imageProduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Image Product'), ['action' => 'edit', $imageProduct->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Image Product'), ['action' => 'delete', $imageProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageProduct->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Image Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Image Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="imageProducts view content">
            <h3><?= h($imageProduct->path_image) ?></h3>
            <table>
                <tr>
                    <th><?= __('Path Image') ?></th>
                    <td><?= h($imageProduct->path_image) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($imageProduct->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($imageProduct->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $imageProduct->has('product') ? $this->Html->link($imageProduct->product->name, ['controller' => 'Products', 'action' => 'view', $imageProduct->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imageProduct->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Piority') ?></th>
                    <td><?= $this->Number->format($imageProduct->piority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($imageProduct->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($imageProduct->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($imageProduct->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($imageProduct->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $imageProduct->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
