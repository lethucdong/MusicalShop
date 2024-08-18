<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductProperty $productProperty
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $properties
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Product Properties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="productProperties form content">
            <?= $this->Form->create($productProperty) ?>
            <fieldset>
                <legend><?= __('Add Product Property') ?></legend>
                <?php
                    // echo $this->Form->control('created_at');
                    // echo $this->Form->control('created_by');
                    // echo $this->Form->control('updated_at', ['empty' => true]);
                    // echo $this->Form->control('updated_by');
                    // echo $this->Form->control('delete_flg');
                    echo $this->Form->control('product_id', ['options' => $products]);
                    echo $this->Form->control('properties_id', ['options' => $properties]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
