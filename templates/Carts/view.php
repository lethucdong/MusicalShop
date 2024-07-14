<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cart $cart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Carts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="carts view content">
            <h3><?= h($cart->created_by) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $cart->has('user') ? $this->Html->link($cart->user->id, ['controller' => 'Users', 'action' => 'view', $cart->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($cart->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($cart->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cart->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($cart->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($cart->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $cart->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Cart Details') ?></h4>
                <?php if (!empty($cart->cart_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Cart Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cart->cart_details as $cartDetails) : ?>
                        <tr>
                            <td><?= h($cartDetails->id) ?></td>
                            <td><?= h($cartDetails->quantity) ?></td>
                            <td><?= h($cartDetails->created_at) ?></td>
                            <td><?= h($cartDetails->created_by) ?></td>
                            <td><?= h($cartDetails->updated_at) ?></td>
                            <td><?= h($cartDetails->updated_by) ?></td>
                            <td><?= h($cartDetails->delete_flg) ?></td>
                            <td><?= h($cartDetails->product_id) ?></td>
                            <td><?= h($cartDetails->cart_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CartDetails', 'action' => 'view', $cartDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CartDetails', 'action' => 'edit', $cartDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CartDetails', 'action' => 'delete', $cartDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
