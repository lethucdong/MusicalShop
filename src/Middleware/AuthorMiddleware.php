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
use App\Helper\Constants;

class AuthorMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $user = $request->getAttribute('identity');
        if ($user) {
            $isAllow = true;
            $route = $request->getAttribute('params');
            $controller = $route['controller'] ?? 'Unknown';
            $action = $route['action'] ?? 'Unknown';

            foreach (Constants::CONTROLLER_PASS_AUTHOR as $item)
            {
                if($item[0] == $controller && $item[1] == $action)
                {
                    return $handler->handle($request);
                }
            }
            
            if (!in_array($controller, Constants::CONTROLLER_PASS_AUTHOR)) {
                $isAllow = false;
                foreach ($user->role->role_permissions as $rolePermission) {
                    if ($rolePermission->permission->delete_flg == false) {
                        $moduleFunction = explode(":", $rolePermission->permission->module_function);
                        if ($moduleFunction[0] == $controller && $moduleFunction[1] == $action) {
                            $isAllow = true;
                            break;
                        }
                    }
                }
            }

            if (!$isAllow) {
                // Chuyển hướng đến trang lỗi 403
                // return $this->redirect($request, 'Error', 'error403');
            }
        }

        return $handler->handle($request);
    }

    private function redirect(ServerRequestInterface $request, string $controller, string $action): ResponseInterface
    {
        $response = new Response();
        $url = Router::url(['controller' => $controller, 'action' => $action]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }
}
