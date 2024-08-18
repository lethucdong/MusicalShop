
<h1>Quên Mật Khẩu</h1>

<?= $this->Form->create() ?>
    <?= $this->Form->control('email', ['label' => 'Email của bạn', 'required' => true]) ?>
    <?= $this->Form->button('Gửi') ?>
<?= $this->Form->end() ?>
