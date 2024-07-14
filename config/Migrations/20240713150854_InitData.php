<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InitData extends AbstractMigration
{
    public function up()
    {
        // roles table
        $roles = $this->table('roles');
        $roles
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => true, 'default' => null])
            ->create();

            
        // permissions table
        $permissions = $this->table('permissions');
        $permissions
            ->addColumn('module_function', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => true, 'default' => null])
            ->create();

            
        // role_permissions table
        $rolePermissions = $this->table('role_permissions');
        $rolePermissions
            ->addColumn('role_id', 'integer', ['null' => false])
            ->addColumn('permission_id', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => false])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addForeignKey('role_id', 'roles', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('permission_id', 'permissions', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

             // users table
        $users = $this->table('users');
        $users
            ->addColumn('full_name', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('birthday', 'datetime', ['null' => false, 'default' => null])
            ->addColumn('sex', 'integer', ['null' => false, 'default' => null])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('phone', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('address', 'string', ['limit' => 255, 'null' => false, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => true, 'default' => null])
            ->create();


        // admin_users table
        $adminUsers = $this->table('admin_users');
        $adminUsers
            ->addColumn('username', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('email', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('birthday', 'datetime', ['null' => false])
            ->addColumn('sex', 'integer', ['limit' => 11, 'null' => false])
            ->addColumn('phone', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('address', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('full_name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('role_id', 'integer', ['limit' => 11, 'null' => false])
            ->addIndex(['username'], ['unique' => true])
            ->addForeignKey('role_id', 'roles', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

            
        // categories table
        $categories = $this->table('categories');
        $categories
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->create();

        // brands table
        $brands = $this->table('brands');
        $brands
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->create();

            // products table
        $products = $this->table('products');
        $products
            ->addColumn('name', 'string', ['limit' => 250, 'null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 0, 'null' => false])
            ->addColumn('tax', 'decimal', ['precision' => 10, 'scale' => 0, 'null' => false])
            ->addColumn('max_quantity', 'integer', ['null' => false])
            ->addColumn('type', 'integer', ['limit' => 11, 'null' => false])
            ->addColumn('start_date', 'datetime', ['null' => false])
            ->addColumn('end_date', 'datetime', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => false])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('category_id', 'integer', ['null' => false])
            ->addColumn('brand_id', 'integer', ['null' => false])
            ->addForeignKey('category_id', 'categories', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('brand_id', 'brands', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        // properties table
        $properties = $this->table('properties');
        $properties
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('name', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('value', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

            // image_banners table
        $imageBanners = $this->table('image_banners');
        $imageBanners
            ->addColumn('piority', 'integer', ['null' => false])
            ->addColumn('path_image', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('url_decription', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('start_date', 'datetime', ['null' => false])
            ->addColumn('end_date', 'datetime', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => false])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->create();

        // image_products table
        $imageProducts = $this->table('image_products');
        $imageProducts
            ->addColumn('piority', 'integer', ['null' => false])
            ->addColumn('path_image', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('start_date', 'datetime', ['null' => false])
            ->addColumn('end_date', 'datetime', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => false])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        // carts table
        $carts = $this->table('carts');
        $carts
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addIndex(['user_id'], ['unique' => true])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        // cart_details table
        $cartDetails = $this->table('cart_details');
        $cartDetails
            ->addColumn('quantity', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('cart_id', 'integer', ['null' => false])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('cart_id', 'carts', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        // orders table
        $orders = $this->table('orders');
        $orders
            ->addColumn('total_amount', 'decimal', ['precision' => 10, 'scale' => 0, 'null' => false])
            ->addColumn('payment_div', 'char', ['limit' => 3, 'null' => false])
            ->addColumn('delivery_div', 'char', ['limit' => 3, 'null' => false])
            ->addColumn('address', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('status', 'char', ['limit' => 2, 'null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        // order_details table
        $orderDetails = $this->table('order_details');
        $orderDetails
            ->addColumn('price', 'decimal', ['precision' => 10, 'scale' => 0, 'null' => false])
            ->addColumn('quantity', 'integer', ['null' => false])
            ->addColumn('created_at', 'datetime', ['null' => false])
            ->addColumn('created_by', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('updated_at', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('updated_by', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('delete_flg', 'boolean', ['null' => false, 'default' => 0])
            ->addColumn('product_id', 'integer', ['null' => false])
            ->addColumn('order_id', 'integer', ['null' => false])
            ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('order_id', 'orders', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
       
    }

    public function down()
    {
        $this->table('role_permissions')->drop()->save();
        $this->table('order_details')->drop()->save();
        $this->table('orders')->drop()->save();
        $this->table('cart_details')->drop()->save();
        $this->table('carts')->drop()->save();
        $this->table('properties')->drop()->save();
        $this->table('image_products')->drop()->save();
        $this->table('products')->drop()->save();
        $this->table('image_banners')->drop()->save();
        $this->table('brands')->drop()->save();
        $this->table('categories')->drop()->save();
        $this->table('admin_users')->drop()->save();
        $this->table('permissions')->drop()->save();
        $this->table('users')->drop()->save();
        $this->table('roles')->drop()->save();
        
    }
}
