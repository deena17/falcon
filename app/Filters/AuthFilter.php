<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */

    protected $request;

    public function before(RequestInterface $request, $arguments = null)
    {
        // $key = getenv('JWT_SECRET');
        // $header = $request->header('Authorization');
        // $token = null;
        // if (!empty($header)) {
        //     if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
        //         $token = $matches[1];
        //     }
        // }
        // if (is_null($token) || empty($token)) {
        //     $response = service('response');
        //     $response->setBody('Access denied');
        //     $response->setStatusCode(401);
        //     return $response;
        // }
        // $key = getenv('JWT_SECRET');
        // $header = $request->getServer('HTTP_AUTHORIZATION');
        // if (!$header) {
        //     $response = service('response');
        //     $response->setBody('Access token required');
        //     $response->setStatusCode(401);
        //     return $response;
        // }

        // $token = explode(' ', $header)[1];
        // try {
        //     $decoded = JWT::decode($token, new Key($key, 'HS256'));
        //     $userData = [
        //         'id' => $decoded->user->id,
        //         'name' => $decoded->user->name,
        //         'active' => $decoded->user->active,
        //         'groups' => $decoded->user->groups,
        //         'permissions' => $decoded->user->permissions
        //     ];
        //     $session = \Config\Services::session();
        //     $session->set('userdata', $userData);
        // } catch (Exception $e) {
        //     $response = service('response');
        //     $response->setBody('Invalid access token');
        //     $response->setStatusCode(401);
        //     return $response;
        // }

        
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}