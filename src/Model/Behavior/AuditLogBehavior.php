<?php
//----------------------------------------------------------------------------
//
//  Project name    : Musical Shop
//  Class Name      : AuditLogBehavior
//  Overview        : 
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
//-----------------------------------------------------------------------------

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\EventInterface;
use ArrayObject;
use App\Helper\IdentityHelper;
use App\Helper\TimeHelper;
use Cake\Routing\Router;

class AuditLogBehavior extends Behavior
{

    public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
    {

        $user = IdentityHelper::getIdentity();

        if ($entity->isNew()) {
            $entity->delete_flg = 0;
            $entity->created_at = TimeHelper::getCurrentTime();
            if($user)
            {
                $entity->created_by = $user->username;
            }
        }
        $entity->updated_at = TimeHelper::getCurrentTime();
        if($user)
        {
            $entity->updated_by = $user->username; 
        }
    }
}