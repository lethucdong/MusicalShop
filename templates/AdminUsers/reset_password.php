<!-- //----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : reset_password
//  Overview        : Cấp lại mật khẩu (View)
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
//----------------------------------------------------------------------------- -->

<h1>Đặt Lại Mật Khẩu</h1>

<?= $this->Form->create() ?>
    <?= $this->Form->control('password', ['label' => 'Mật khẩu mới', 'type' => 'password', 'required' => true]) ?>
    <?= $this->Form->button('Đặt Lại Mật Khẩu') ?>
<?= $this->Form->end() ?>
