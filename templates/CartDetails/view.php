<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartDetail $cartDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cart Detail'), ['action' => 'edit', $cartDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart Detail'), ['action' => 'delete', $cartDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cart Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartDetails view content">
            <h3><?= h($cartDetail->created_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($cartDetail->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($cartDetail->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $cartDetail->has('product') ? $this->Html->link($cartDetail->product->name, ['controller' => 'Products', 'action' => 'view', $cartDetail->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cart') ?></th>
                    <td><?= $cartDetail->has('cart') ? $this->Html->link($cartDetail->cart->created_by, ['controller' => 'Carts', 'action' => 'view', $cartDetail->cart->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cartDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $this->Number->format($cartDetail->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($cartDetail->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($cartDetail->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $cartDetail->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
