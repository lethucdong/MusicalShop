<?php
// src/Model/Behavior/AuditLogBehavior.php
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
        $ahihi = Router::getRequest();

        $ahuhu = IdentityHelper::isPermission($ahihi);

        // debug($ahuhu);
        // die();

        $user = IdentityHelper::getIdentity();

        if ($entity->isNew()) {
            $entity->delete_flg = 0;
            $entity->created_at = TimeHelper::getCurrentTime();
            $entity->created_by = $user->username;
        }
        $entity->updated_at = TimeHelper::getCurrentTime();
        $entity->updated_by = $user->username; 
        
    }
}