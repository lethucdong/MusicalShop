<?php
// src/Helper/Constants.php
namespace App\Helper;

class Constants
{
    // Thêm các controller muỗn xác thực bằng user

    // Bỏ qua đăng nhập
    public const AUTHEN_USER_CONTROLLER = ['Users'];

    // Hiển thị sidebar
    public const SHOW_SIDEBAR_CONTROLLER = ['Dashboard','Users', 'Roles', 'RolePermissions', 'Properties', 'Products', 'ProductProperties', 'Permissions', 'OrderDetails', 'ImageProducts', 'ImageBanners', 'Orders', 'Categories', 'Carts', 'CartDetails', 'Brands', 'AdminUsers', 'Error'];
    
    // Bỏ qua phân quyền [controller, action]
    public const CONTROLLER_PASS_AUTHOR = [['AdminUsers', 'login'], ['AdminUsers', 'logout'],['Error', 'error403']];
}
