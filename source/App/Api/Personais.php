<?php

namespace Source\App\Api;

use Source\Models\Personal;

class Personais extends Api
{
    public function __construct()
    {
        parent::__construct();
        // quando todas as rotas da classe são autenticadas, o método $this->auth() pode ser evocado aqui
        // $this->auth();
    }

    public function listAll(): void
    {
        $personais = new Personal();
        $this->back($personais->selectAll());
    }

    public function getById(array $data)
    {
        // método é chamaddo quando a rota precisa de autenticação
        //$this->auth();
        $personal = new Personal();
        $response = $personal->listById($data["personalId"]);
        $this->back($response);
    }

    public function deletePersonal(array $data)
    {
        $personal = new Personal();
    
        $delete = $personal->delete($data["personalId"]);
    
        if (!$delete) {
            $this->back([
                "type" => "error",
                "message" => $personal->getName()
            ]);
            return;
        }
    
        $this->back([
            "type" => "success",
            "message" => $personal->getName()
        ]);
    }

    public function insert(array $data)
{
    // Decodifica o corpo da requisição JSON
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo

    // Verifica se os campos estão presentes ou vazios
    if (!isset($data["name"]) || !isset($data["specialty"]) || in_array("", $data)) {
        $this->back([
            "type" => "error",
            "message" => "Preencha todos os campos"
        ]);
        return;
    }

    // Cria o personal com os dados recebidos
    $personal = new Personal(
        null,
        $data["name"],
        $data["specialty"]
    );

    // Tenta inserir o personal
    $insertPersonal = $personal->insert();

    if (!$insertPersonal) {
        $this->back([
            "type" => "error",
            "message" => $personal->getMessage()
        ]);
        return;
    }

    // Se inserção for bem-sucedida, retorna sucesso
    $this->back([
        "type" => "success",
        "message" => "Personal cadastrado com sucesso!"
    ]);
}


public function update(array $data)

{
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo
    // Verifica se todos os campos necessários foram preenchidos
    if (empty($data["personalId"]) || empty($data["name"]) || empty($data["specialty"])) {
        $this->back([
            "type" => "error",
            "message" => "Preencha todos os campos"
        ]);
        return;
    }

    // Inicializa o objeto Personal com os novos dados
    $personal = new Personal(
        $data["personalId"],
        $data["name"],
        $data["specialty"]
    );

    // Tenta atualizar o personal
    $updatePersonal = $personal->update($data["personalId"]);

    // Verifica se a atualização foi bem-sucedida
    if (!$updatePersonal) {
        $this->back([
            "type" => "error",
            "message" => $personal->getMessage()
        ]);
        return;
    }

    // Retorna mensagem de sucesso
    $this->back([
        "type" => "success",
        "message" => "Personal alterado com sucesso!"
    ]);
}
}