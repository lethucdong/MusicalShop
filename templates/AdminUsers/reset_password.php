<h1>Đặt Lại Mật Khẩu</h1>

<?= $this->Form->create() ?>
    <?= $this->Form->control('password', ['label' => 'Mật khẩu mới', 'type' => 'password', 'required' => true]) ?>
    <?= $this->Form->button('Đặt Lại Mật Khẩu') ?>
<?= $this->Form->end() ?>
