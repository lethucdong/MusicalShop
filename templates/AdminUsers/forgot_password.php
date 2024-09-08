<!-- //----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : forgot_password
//  Overview        : Tìm lại mật khẩu admin (View)
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

<h1>Quên Mật Khẩu</h1>

<?= $this->Form->create() ?>
    <?= $this->Form->control('email', ['label' => 'Email của bạn', 'required' => true]) ?>
    <?= $this->Form->button('Gửi') ?>
<?= $this->Form->end() ?>
