<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('full_name');
                    echo $this->Form->control('password');
                    echo $this->Form->control('birthday', ['empty' => true]);
                    echo $this->Form->control('sex');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    // //echo $this->Form->control('created_at', ['empty' => true]);
                    // //echo $this->Form->control('created_by');
                    // //echo $this->Form->control('updated_at', ['empty' => true]);
                    // //echo $this->Form->control('updated_by');
                    // //echo $this->Form->control('delete_flg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
