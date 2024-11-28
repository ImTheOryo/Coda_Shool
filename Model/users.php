<?php
    function getAll(PDO $pdo): array
    {
        $statement = $pdo->prepare("SELECT * FROM users");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function toggleEnabled (PDO $pdo, int $id): void
    {
        $statement = $pdo->prepare("UPDATE users SET enabled = NOT enabled WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }

    function delete (PDO $pdo, int $id)
    {
        try {
            $statement = $pdo->prepare("DELETE FROM users WHERE id = :id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
        }
        catch (PDOException $e) {
            return $e ->getMessage();
        }
    }