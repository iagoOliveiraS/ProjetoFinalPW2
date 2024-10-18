<?php

namespace Source\Models;

use PDOException;
use Source\Core\Connect;
use Source\Core\Model;

class Personal extends Model
{
    private $id;
    private $name;
    private $specialty;
    private $message;

    public function __construct(
        int $id = null,
        string $name = null,
        string $specialty = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->specialty = $specialty;
        $this->entity = "personal_trainers";
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

    public function getSpecialty(): ?string
    {
        return $this->specialty;
    }

    public function setSpecialty(?string $specialty): void
    {
        $this->specialty = $specialty;
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
        $query = "SELECT personal_trainers.id, personal_trainers.name, personal_trainers.specialty
                  FROM personal_trainers
                  WHERE personal_trainers.id = :personal_trainers_id";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->bindParam("personal_trainers_id",$id);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function listAll (): array
    {
        $query = "SELECT personal_trainers.id, personal_trainers.name, personal_trainers.specialty
                  FROM personal_trainers";

        $conn = Connect::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function delete(int $id): bool
{
    $conn = Connect::getInstance();

    $query = "SELECT * FROM personal_trainers WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        $this->message = "Produto não encontrado!";
        return false;
    }

    $query = "DELETE FROM personal_trainers WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);

    try {
        $stmt->execute();
        $this->message = "Produto deletado com sucesso!";
        return true;
    } catch (PDOException $e) {
        $this->message = "Erro ao deletar o produto: ";
        return false;
    }
}

public function insert(): ?int
    {

        $conn = Connect::getInstance();

        $query = "INSERT INTO personal_trainers (name, specialty) 
                  VALUES (:name, :specialty)";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":specialty", $this->specialty);

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

        $query = "SELECT * FROM personal_trainers WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        if ($stmt->rowCount() == 0) {
            $this->message = "Personal não encontrado!";
            return false;
        }

        $query = "UPDATE personal_trainers
                  SET name = :name, specialty = :specialty
                  WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":specialty", $this->specialty);
        $stmt->bindParam(":id", $this->id);

        try {
            $stmt->execute();
            $this->message = "Personal atualizado com sucesso!";
            return true;
        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }

    }

    

}