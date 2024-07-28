<?php
// src/Middleware/AuthorMiddleware.php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use App\Helper\IdentityHelper;
use Cake\Http\Response;
use Cake\Routing\Router;

class AuthorMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $user = $request->getAttribute('identity');
        if($user)
        {
            $isAllow = false;
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
                        $isAllow = true;
                        break;
                    }
                }
                
            }
            if($isAllow)
            {
                return $handler->handle($request);
            }

            // return (new Response())->withLocation(Router::url(['controller' => 'Error', 'action' => 'forbidden']));
        }
        return $handler->handle($request);
    }
}
