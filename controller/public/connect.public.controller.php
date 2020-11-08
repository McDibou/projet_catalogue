<?php

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.model.php';

if (isset($_POST['connect_user'])) {

    $name_user = analyseData($_POST['name_user']);
    $password_user = analyseData($_POST['password_user']);

    if (!empty($name_user) && !empty($password_user)) {

        $user = readUser($name_user, $db);

        if (empty($user)) {

            $error_input = 'Invalid name';

        } elseif (password_verify($password_user, $user['password_user']) && $user['key_user'] === '7f76997b1a2f5d5d5a6439430d7f6fdd') {

            $_SESSION['id_session'] = session_id();
            header('Location: ?p=create.article.admin');

        } else {

            $error_input = 'Invalid password';

        }
    }
}

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.view.php';