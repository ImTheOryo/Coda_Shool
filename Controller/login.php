<?php

    /**
     * @var PDO $pdo
     */

    require "Model/login.php";

    if (isset($_POST["login_button"])) {
        $username = !empty($_POST["username"]) ? $_POST['username'] : null;
        $password = !empty($_POST["password"]) ? $_POST["password"] : null;

        if (!empty($username) &&
            !empty($password)
        ) {
            $username = cleanString($username);
            $password = cleanString($password);

            $user = getUser($pdo, $username);

            $isMatchPassword = is_array($user) && password_verify($password, $user['password']);

            if ($isMatchPassword && $user['enabled']) {
                $_SESSION["auth"] = true;
                header("Location: index.php");
            } elseif (!$user['enabled'] && $isMatchPassword) {
                $errors[] = "L'utilisateur n'est pas actif";
            }
            else {
                $errors[] = "L'identification a échoué";
            }
        }
    }

    require "View/login.php";