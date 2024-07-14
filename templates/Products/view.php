<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products view content">
            <h3><?= h($product->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($product->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created By') ?></th>
                    <td><?= h($product->created_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated By') ?></th>
                    <td><?= h($product->updated_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Brand') ?></th>
                    <td><?= $product->has('brand') ? $this->Html->link($product->brand->name, ['controller' => 'Brands', 'action' => 'view', $product->brand->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($product->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($product->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tax') ?></th>
                    <td><?= $this->Number->format($product->tax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Max Quantity') ?></th>
                    <td><?= $this->Number->format($product->max_quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= $this->Number->format($product->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Date') ?></th>
                    <td><?= h($product->start_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Date') ?></th>
                    <td><?= h($product->end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($product->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($product->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $product->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($product->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Cart Details') ?></h4>
                <?php if (!empty($product->cart_details)) : ?>
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
                        <?php foreach ($product->cart_details as $cartDetails) : ?>
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
            <div class="related">
                <h4><?= __('Related Image Products') ?></h4>
                <?php if (!empty($product->image_products)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Piority') ?></th>
                            <th><?= __('Path Image') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('End Date') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->image_products as $imageProducts) : ?>
                        <tr>
                            <td><?= h($imageProducts->id) ?></td>
                            <td><?= h($imageProducts->piority) ?></td>
                            <td><?= h($imageProducts->path_image) ?></td>
                            <td><?= h($imageProducts->start_date) ?></td>
                            <td><?= h($imageProducts->end_date) ?></td>
                            <td><?= h($imageProducts->created_at) ?></td>
                            <td><?= h($imageProducts->created_by) ?></td>
                            <td><?= h($imageProducts->updated_at) ?></td>
                            <td><?= h($imageProducts->updated_by) ?></td>
                            <td><?= h($imageProducts->delete_flg) ?></td>
                            <td><?= h($imageProducts->product_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ImageProducts', 'action' => 'view', $imageProducts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ImageProducts', 'action' => 'edit', $imageProducts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ImageProducts', 'action' => 'delete', $imageProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imageProducts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Order Details') ?></h4>
                <?php if (!empty($product->order_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->order_details as $orderDetails) : ?>
                        <tr>
                            <td><?= h($orderDetails->id) ?></td>
                            <td><?= h($orderDetails->price) ?></td>
                            <td><?= h($orderDetails->quantity) ?></td>
                            <td><?= h($orderDetails->created_at) ?></td>
                            <td><?= h($orderDetails->created_by) ?></td>
                            <td><?= h($orderDetails->updated_at) ?></td>
                            <td><?= h($orderDetails->updated_by) ?></td>
                            <td><?= h($orderDetails->delete_flg) ?></td>
                            <td><?= h($orderDetails->product_id) ?></td>
                            <td><?= h($orderDetails->order_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderDetails', 'action' => 'delete', $orderDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Properties') ?></h4>
                <?php if (!empty($product->properties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Value') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Created By') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th><?= __('Updated By') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($product->properties as $properties) : ?>
                        <tr>
                            <td><?= h($properties->id) ?></td>
                            <td><?= h($properties->product_id) ?></td>
                            <td><?= h($properties->name) ?></td>
                            <td><?= h($properties->value) ?></td>
                            <td><?= h($properties->created_at) ?></td>
                            <td><?= h($properties->created_by) ?></td>
                            <td><?= h($properties->updated_at) ?></td>
                            <td><?= h($properties->updated_by) ?></td>
                            <td><?= h($properties->delete_flg) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
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
