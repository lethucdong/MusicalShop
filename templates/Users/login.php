<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<h1>Đăng nhập user</h1>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your email and password') ?></legend>
    <?= $this->Form->control('email', ['required' => true]) ?>
    <?= $this->Form->control('password', ['required' => true]) ?>
</fieldset>
<?= $this->Form->button(__('Login')) ?>
<?= $this->Form->end() ?>
