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
}