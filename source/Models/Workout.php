<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Workout extends Model
{
    private $id;
    private $userId;
    private $workoutType;
    private $message;

    public function __construct(
        int $id = null,
        int $userId = null,
        string $workoutType = null
    )
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->workoutType = $workoutType;
        $this->entity = "workouts";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

    public function getWorkoutType(): ?string
    {
        return $this->workoutType;
    }

    public function setWorkoutType(?string $workoutType): void
    {
        $this->workoutType = $workoutType;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function listByUserId(int $userId): array
    {
        $query = "
            SELECT 
                u.name AS Usuario,
                dw.day_of_week AS Dia_da_Semana,
                w.workout_type AS Tipo_Treino,
                e.name AS Exercicio,
                e.muscle_group AS Grupo_Muscular
            FROM 
                users u
            JOIN 
                days_workout dw ON u.id = dw.user_id
            JOIN 
                workouts w ON dw.workout_id = w.id
            JOIN 
                exercises_workout ew ON w.id = ew.workout_id
            JOIN 
                exercises e ON ew.exercise_id = e.id
            WHERE 
                u.id = :user_id
            ORDER BY 
                FIELD(dw.day_of_week, 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'),
                w.workout_type
        ";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":user_id", $userId, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    // public function insert(): ?int
    // {
    //     $conn = Connect::getInstance();

    //     $query = "INSERT INTO workouts (user_id, workout_type) 
    //               VALUES (:user_id, :workout_type)";

    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(":user_id", $this->userId, \PDO::PARAM_INT);
    //     $stmt->bindParam(":workout_type", $this->workoutType, \PDO::PARAM_STR);

    //     try {
    //         $stmt->execute();
    //         return $conn->lastInsertId();
    //     } catch (PDOException $exception) {
    //         $this->message = "Erro ao inserir o treino: {$exception->getMessage()}";
    //         return false;
    //     }
    // }

    // public function delete(int $id): bool
    // {
    //     $conn = Connect::getInstance();

    //     $query = "SELECT * FROM workouts WHERE id = :id";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    //     $stmt->execute();

    //     if ($stmt->rowCount() == 0) {
    //         $this->message = "Treino não encontrado!";
    //         return false;
    //     }

    //     $query = "DELETE FROM workouts WHERE id = :id";
    //     $stmt = $conn->prepare($query);
    //     $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
    // }};
}