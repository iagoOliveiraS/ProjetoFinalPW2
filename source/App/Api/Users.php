<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;
use Source\Models\User;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listUsers ()
    {
        $users = new User();
        $this->back($users->selectAll());
    }

    public function createUser(array $data)
{
    // Decodifica o corpo da requisição JSON
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo

    // Verifica se todos os campos estão presentes e não estão vazios
    if (!isset($data["name"]) || !isset($data["email"]) || !isset($data["password"]) || in_array("", $data)) {
        $this->back([
            "type" => "error",
            "message" => "Preencha todos os campos"
        ]);
        return;
    }

    // Cria o usuário com os dados recebidos
    $user = new User(
        null,
        $data["name"],
        $data["email"],
        $data["password"]
    );

    // Tenta inserir o usuário
    $insertUser = $user->insert();

    if (!$insertUser) {
        $this->back([
            "type" => "error",
            "message" => $user->getMessage()
        ]);
        return;
    }

    // Retorna mensagem de sucesso
    $this->back([
        "type" => "success",
        "message" => "Usuário cadastrado com sucesso!"
    ]);
}


public function loginUser(array $data)
{
    // Decodifica o corpo da requisição JSON
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo

    // Verifica se os campos 'email' e 'password' estão presentes e não vazios
    if (!isset($data["email"]) || !isset($data["password"]) || in_array("", $data)) {
        $this->back([
            "type" => "error",
            "message" => "Preencha todos os campos obrigatórios!"
        ]);
        return;
    }

    // Tenta fazer o login
    $user = new User();
    if (!$user->login($data["email"], $data["password"])) {
        $this->back([
            "type" => "error",
            "message" => $user->getMessage()
        ]);
        return;
    }

    // Gera o token JWT
    $token = new TokenJWT();
    $this->back([
        "type" => "success",
        "message" => "Login realizado com sucesso!",
        "user" => [
            "id" => $user->getId(),
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "token" => $token->create([
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ])
        ]
    ]);
}



    public function updateUser(array $data)
    {
        
        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User(
            $this->userAuth->id,
            $data["name"],
            $data["email"]
        );

        if(!$user->update()){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ]
        ]);
    }

    public function setPassword(array $data)
    {
        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User($this->userAuth->id);

        if(!$user->updatePassword($data["password"],$data["newPassword"],$data["confirmNewPassword"])){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage()
        ]);
    }
}