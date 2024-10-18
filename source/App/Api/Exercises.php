<?php

namespace Source\App\Api;

use Source\Models\Exercise;

class Exercises extends Api
{
    public function __construct()
    {
        parent::__construct();
        // quando todas as rotas da classe são autenticadas, o método $this->auth() pode ser evocado aqui
        // $this->auth();
    }

    public function listAll(): void
    {
        $exercises = new Exercise();
        $this->back($exercises->selectAll());
    }

    public function getById(array $data)
    {
        // método é chamaddo quando a rota precisa de autenticação
        //$this->auth();
        $exercise = new Exercise();
        $response = $exercise->listById($data["exerciseId"]);
        $this->back($response);
    }

    public function listByGroup (array $data)
    {
        // quando a rota não necessita de autenticação, não evoca o método $this->auth()
        $exercise = new Exercise();
        $listServices = $exercise->listByGroup($data["muscleGroup"]);
        $this->back($listServices);
    }

    public function update(array $data)
{
    // Obtém o corpo da requisição JSON e o decodifica para um array associativo
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo

    // Verifica se todos os campos necessários foram preenchidos
    if (empty($data["exerciseId"]) || empty($data["name"]) || empty($data["muscle_group"])) {
        $this->back([
            "type" => "error",
            "message" => "Preencha todos os campos"
        ]);
        return;
    }

    // Inicializa o objeto Exercise com os novos dados
    $exercise = new Exercise(
        $data["exerciseId"],
        $data["name"],
        $data["muscle_group"]
    );

    // Tenta atualizar o exercício
    $updateExercise = $exercise->update($data["exerciseId"]);

    // Verifica se a atualização foi bem-sucedida
    if (!$updateExercise) {
        $this->back([
            "type" => "error",
            "message" => $exercise->getMessage()
        ]);
        return;
    }

    // Retorna mensagem de sucesso
    $this->back([
        "type" => "success",
        "message" => "Exercício alterado com sucesso!"
    ]);
}


    public function delete(array $data)
    {
        $exercise = new Exercise();
    
        $delete = $exercise->delete($data["exerciseId"]);
    
        if (!$delete) {
            $this->back([
                "type" => "error",
                "message" => "Exercicio Não Deletado"
            ]);
            return;
        }
    
        $this->back([
            "type" => "success",
            "message" => "Exercicio Deletado"
        ]);
    }

    public function insert(array $data)
{
    // Decodifica o corpo da requisição JSON
    $json = file_get_contents('php://input'); // Obtém o corpo da requisição
    $data = json_decode($json, true); // Decodifica o JSON para um array associativo

    // Verifica se os campos estão presentes
    if (!isset($data["name"]) || !isset($data["muscle_group"]) || in_array("", $data)) {
        $this->back([
            "type" => "error",
            "message" => "Por favor, informe todos os campos!"
        ]);
        return;
    }

    // Cria o exercício com os dados recebidos
    $exercise = new Exercise(null, $data["name"], $data["muscle_group"]);

    $insertExercise = $exercise->insert();

    if (!$insertExercise) {
        $this->back([
            "type" => "error",
            "message" => $exercise->getMessage()
        ]);
        return;
    }

    $this->back([
        "type" => "success",
        "message" => "Exercicio cadastrado com sucesso!"
    ]);
}

}