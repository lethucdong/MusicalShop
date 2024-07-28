<!-- templates/element/sidebar_menu.php -->
<div class="sidebar-menu">
    <ul>
        <li><?= $this->Html->link('Dashboard', ['controller' => 'Dashboard', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Roles', ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('RolePermissions', ['controller' => 'RolePermissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Properties', ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Products', ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Permissions', ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('OrderDetails', ['controller' => 'OrderDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('ImageProducts', ['controller' => 'ImageProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('ImageBanners', ['controller' => 'ImageBanners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Orders', ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Categories', ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Carts', ['controller' => 'Carts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('CartDetails', ['controller' => 'CartDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Brands', ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('AdminUsers', ['controller' => 'AdminUsers', 'action' => 'index']) ?></li>
    </ul>
</div>
