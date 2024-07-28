<?php
// src/Helper/Constants.php
namespace App\Helper;

class Constants
{
    // Thêm các controller muỗn xác thực bằng user
    public const AUTHEN_USER_CONTROLLER = ['Users'];
    public const SHOW_SIDEBAR_CONTROLLER = ['Dashboard','Users', 'Roles', 'RolePermissions', 'Properties', 'Products', 'Permissions', 'OrderDetails', 'ImageProducts', 'ImageBanners', 'Orders', 'Categories', 'Carts', 'CartDetails', 'Brands', 'AdminUsers'];

}
