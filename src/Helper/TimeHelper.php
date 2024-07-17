<?php
namespace App\Helper;

use Cake\I18n\FrozenTime;

class TimeHelper
{
    public static function getCurrentTime()
    {
        return FrozenTime::now()->setTimezone('Asia/Ho_Chi_Minh');
    }
}