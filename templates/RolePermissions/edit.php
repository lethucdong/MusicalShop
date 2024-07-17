<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RolePermission $rolePermission
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 * @var string[]|\Cake\Collection\CollectionInterface $permissions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $rolePermission->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rolePermission->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Role Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="rolePermissions form content">
            <?= $this->Form->create($rolePermission) ?>
            <fieldset>
                <legend><?= __('Edit Role Permission') ?></legend>
                <?php
                    echo $this->Form->control('role_id', ['options' => $roles]);
                    echo $this->Form->control('permission_id', ['options' => $permissions]);
                    //echo $this->Form->control('created_at');
                    //echo $this->Form->control('created_by');
                    //echo $this->Form->control('updated_at');
                    //echo $this->Form->control('updated_by');
                    //echo $this->Form->control('delete_flg');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
