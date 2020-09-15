<?php

namespace Access\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Access\Controller\UserController;

class ApiController
{
    private $userController;

    public function __construct()
    {
        $this->userController = new UserController;
    }

    public function index()
    {
        $users = $this
            ->userController->index(); 
    
        echo json_encode($users);
    }

    public function show(Request $request, Response $response, array $args)
    {
        $id = $args['id'];

        $user = $this
            ->userController->show($id);

        echo json_encode($user);

        return $response;
    }

    public function search(string $login)
    {
        // Show by Login
    }

    public function store(Request $request, Response $response)
    {
        $body = $request->getParsedBody();

        $this
            ->userController->store(
                $body['login'],
                $body['password']
            );

        return $response;
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $body = $request->getParsedBody();

        $this
            ->userController->update(
                $id,
                $body['login'],
                $body['password']
            );

        return $response;
    }

    public function destroy(Request $request, Response $response, array $args)
    {
        $id = $args['id'];

        $this
            ->userController->destroy($id);

        return $response;
    }
}

