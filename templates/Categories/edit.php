<?php
//----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : add
//  Overview        : Thay đổi loại hàng
//  Programmer      : DongLT
//  Created Date    : 2024/07/14
//  Version         : 0.0.0.1
//
//----------< History >--------------------------------------------------------
//  ID              : 
//  Programmer      : 
//  Updated Date    : 
//  Comment         : 
//  Version         :  
//-----------------------------------------------------------------------------
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categories form content">
            <?= $this->Form->create($category) ?>
            <fieldset>
                <legend><?= __('Edit Category') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('description');
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at', ['empty' => true]);
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
