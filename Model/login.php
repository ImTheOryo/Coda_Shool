<?php


    function getUser(PDO $pdo, string $username): array | bool
    {
        $query = 'SELECT username, password, enabled FROM users WHERE username = :username';
        $res = $pdo->prepare($query);
        $res->bindValue(':username', $username);
        $res->execute();
        return $res->fetch(PDO::FETCH_ASSOC);

    }
