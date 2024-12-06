<?php

namespace Source\App\Api;

use Source\Models\Workout;

class Workouts extends Api
{
    public function __construct()
    {
        parent::__construct();
        // Autenticação pode ser ativada aqui se necessário
        // $this->auth();
    }

    public function getByUserId(array $data): void
    {
        // Verifica se o ID do usuário foi enviado
        if (empty($data['userId'])) {
            $this->back([
                "type" => "error",
                "message" => "O ID do usuário é obrigatório."
            ]);
            return;
        }

        $workout = new Workout();
        $result = $workout->listByUserId($data['userId']);

        // Verifica se encontrou resultados
        if (empty($result)) {
            $this->back([
                "type" => "error",
                "message" => $workout->getMessage() ?: "Nenhum treino encontrado para este usuário."
            ]);
            return;
        }

        // Retorna os resultados encontrados
        $this->back([
            "type" => "success",
            "data" => $result
        ]);
    }

    // public function createWorkout(array $data): void
    // {
    //     // Valida os dados obrigatórios
    //     if (empty($data['userId']) || empty($data['workoutType'])) {
    //         $this->back([
    //             "type" => "error",
    //             "message" => "Os campos 'userId' e 'workoutType' são obrigatórios."
    //         ]);
    //         return;
    //     }

    //     $workout = new Workout();
    //     $workout->setUserId($data['userId']);
    //     $workout->setWorkoutType($data['workoutType']);

    //     $id = $workout->insert();

    //     if (!$id) {
    //         $this->back([
    //             "type" => "error",
    //             "message" => $workout->getMessage() ?: "Erro ao criar o treino."
    //         ]);
    //         return;
    //     }

    //     $this->back([
    //         "type" => "success",
    //         "message" => "Treino criado com sucesso.",
    //         "workoutId" => $id
    //     ]);
    // }

    // public function deleteWorkout(array $data): void
    // {
    //     // Verifica se o ID do treino foi enviado
    //     if (empty($data['workoutId'])) {
    //         $this->back([
    //             "type" => "error",
    //             "message" => "O ID do treino é obrigatório."
    //         ]);
    //         return;
    //     }

    //     $workout = new Workout();
    //     $deleted = $workout->delete($data['workoutId']);

    //     if (!$deleted) {
    //         $this->back([
    //             "type" => "error",
    //             "message" => $workout->getMessage() ?: "Erro ao deletar o treino."
    //         ]);
    //         return;
    //     }

    //     $this->back([
    //         "type" => "success",
    //         "message" => "Treino deletado com sucesso."
    //     ]);
    // }
}
