<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $brands
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Add Product') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    echo $this->Form->control('price');
                    echo $this->Form->control('tax');
                    echo $this->Form->control('max_quantity');
                    echo $this->Form->control('type');
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at');
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('brand_id', ['options' => $brands]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
