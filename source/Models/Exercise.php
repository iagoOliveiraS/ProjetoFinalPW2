<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Exercise extends Model
{
    private $id;
    private $name;
    private $muscle_group;
    private $message;

    public function __construct(
        int $id = null,
        string $name = null,
        string $muscle_group = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->muscle_group = $muscle_group;
        $this->entity = "exercises";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getGroup(): ?string
    {
        return $this->muscle_group;
    }

    public function setGroup(?string $muscle_group): void
    {
        $this->muscle_group = $muscle_group;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    public function listById (int $id)
    {
        $query = "SELECT exercises.id, exercises.name, exercises.muscle_group
                  FROM exercises
                  WHERE exercises.id = :exercise_id";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam("exercise_id",$id);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listAll (): array
    {
        $query = "SELECT exercises.id, exercises.name, exercises.muscle_group
                  FROM exercises";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listByGroup (string $muscle_group): array
    {
        $query = "SELECT exercises.id, exercises.name, exercises.muscle_group
                  FROM exercises
                  WHERE exercises.muscle_group = :muscleGroup";
        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam("muscleGroup", $muscle_group);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function delete(int $id): bool
{
    $conn = Connect::getInstance();

    $query = "SELECT * FROM exercises WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $this->message = "Exercicio não encontrado!";
        return false;
    }

    $query = "DELETE FROM exercises WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);

    try {
        $stmt->execute();
        $this->message = "Exercicio deletado com sucesso!";
        return true;
    } catch (PDOException $e) {
        $this->message = "Erro ao deletar o Exercicio: ";
        return false;
    }
}

public function insert(): ?int
    {

        $conn = Connect::getInstance();

        $query = "INSERT INTO exercises (name, muscle_group) 
                  VALUES (:name, :muscle_group)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":muscle_group", $this->muscle_group);

        try {
            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException) {
            $this->message = "Por favor, informe todos os campos!";
            return false;
        }
    }

    public function update (int $id) : bool
    {
        $conn = Connect::getInstance();

        $query = "SELECT * FROM exercises WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        if ($stmt->rowCount() == 0) {
            $this->message = "Exercicio não encontrado!";
            return false;
        }

        $query = "UPDATE exercises
                  SET name = :name, muscle_group = :muscle_group
                  WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":muscle_group", $this->muscle_group);
        $stmt->bindParam(":id", $this->id);

        try {
            $stmt->execute();
            $this->message = "Exercicio atualizado com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

}