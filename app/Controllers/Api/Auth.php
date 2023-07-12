<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
use CodeIgniter\Shield\Models\UserModel;

class Auth extends ResourceController
{
    use ResponseTrait;

    public function login()
    {
        $credentials = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];

        if (auth()->loggedIn()) {
            auth()->logout();
        }

        $loginAttempt = auth()->attempt($credentials);

        if (!$loginAttempt->isOK()) {
            return $this->fail('Invalid username or password. Please try again');
        } else {
            $model = new UserModel();
            $userData = $model->find(auth()->id());
            $token = $userData->generateAccessToken('thisismytoken');
            $auth_token = $token->raw_token;

            $key = getenv('JWT_SECRET');
            $iat = time();
            $exp = $iat + 3600;

            $user = auth()->user();

            $payload = [
                'iat' => $iat,
                'exp' => $exp,
                'user' => [
                    'id' => auth()->id(),
                    'name' => $user->username,
                    'active' => $user->active,
                    'groups' => $user->getGroups(),
                    'permissions' => $user->getPermissions(),
                    'token' => $auth_token,
                ],
            ];

            $jwt_token = JWT::encode($payload, $key, 'HS256');

            $response = [
                'message' => 'You are loggedin successfully',
                'error' => false,
                'status' => 200,
                'token' => $jwt_token
            ];
            return $this->respond($response);
        }
    }

    public function index()
    {
        return view('welcome_message');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('jwt');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}