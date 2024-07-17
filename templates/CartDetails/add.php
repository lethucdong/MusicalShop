<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartDetail $cartDetail
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $carts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cart Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cartDetails form content">
            <?= $this->Form->create($cartDetail) ?>
            <fieldset>
                <legend><?= __('Add Cart Detail') ?></legend>
                <?php
                    echo $this->Form->control('quantity');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at', ['empty' => true]);
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('cart_id', ['options' => $carts]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
