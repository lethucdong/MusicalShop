<?php
ob_start();
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser $adminUser
 */
?>
<h1>Đăng nhập Admin</h1>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your email and password') ?></legend>
    <?= $this->Form->control('email', ['required' => true]) ?>
    <?= $this->Form->control('password', ['required' => true]) ?>
</fieldset>
<div style="    display: flex;
    justify-content: space-between;">
<?= $this->Form->button(__('Login')) ?>
<?= $this->Html->link('Quên mật khẩu', ['controller' => 'AdminUsers', 'action' => 'forgotPassword']) ?>
</div>
<?= $this->Form->end() ?>