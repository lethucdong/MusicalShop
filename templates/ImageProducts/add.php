<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ImageProduct $imageProduct
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Image Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="imageProducts form content">
            <?= $this->Form->create($imageProduct) ?>
            <fieldset>
                <legend><?= __('Add Image Product') ?></legend>
                <?php
                    echo $this->Form->control('piority');
                    echo $this->Form->control('path_image');
                    echo $this->Form->control('start_date');
                    echo $this->Form->control('end_date');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at');
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                    echo $this->Form->control('product_id', ['options' => $products]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
