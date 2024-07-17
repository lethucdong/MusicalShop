<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderDetail $orderDetail
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Order Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="orderDetails form content">
            <?= $this->Form->create($orderDetail) ?>
            <fieldset>
                <legend><?= __('Edit Order Detail') ?></legend>
                <?php
                    echo $this->Form->control('price');
                    echo $this->Form->control('quantity');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at', ['empty' => true]);
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('order_id', ['options' => $orders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
