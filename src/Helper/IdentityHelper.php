<?php
// src/Helper/IdentityHelper.php
namespace App\Helper;

use Cake\Http\ServerRequest;

class IdentityHelper
{
    public static function getIdentity(ServerRequest $request)
    {
        return $request->getAttribute('identity');
    }
}
