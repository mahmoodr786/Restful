<?php
namespace Restful\Controller\Api;

use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Restful\Controller\AppController;

/**
 * Users Controller
 *
 * @property \Restful\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['token']);
    }
    public function token()
    {
        $user = $this->Auth->identify();
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 604800,
                ],
                    Security::salt()),
            ],
            '_serialize' => ['success', 'data'],
        ]);
    }
}
