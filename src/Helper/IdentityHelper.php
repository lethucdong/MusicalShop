<?php
// src/Helper/IdentityHelper.php
namespace App\Helper;

use Cake\Http\ServerRequest;

class IdentityHelper
{
    protected static $user;

    public static function getIdentity()
    {
        return self::$user;
    }

    public static function setIdentity(ServerRequest $request)
    {
        self::$user = $request->getAttribute('identity');
    }

    public static function isPermission(ServerRequest $request)
    {
        $user = $request->getAttribute('identity');
        $isPermission = true;
        if($user)
        {
            $isPermission = false;
            $route = $request->getAttribute('params');
            $controller = $route['controller'] ?? 'Unknown';
            $action = $route['action'] ?? 'Unknown';

            foreach ($user->role->role_permissions as $rolePermission)
            {
                if($rolePermission->permission->delete_flg == false)
                {
                    $moduleFunction = $pieces = explode(":", $rolePermission->permission->module_function);
                    if($moduleFunction[0]==$controller && $moduleFunction[1]==$action)
                    {
                        $isPermission = true;
                        break;
                    }
                }
                
            }
        }
        return $isPermission;
    }
}