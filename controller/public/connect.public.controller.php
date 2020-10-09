<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.model.php';

if (isset($_POST['connect_user'])) {

    $name_user = analyseData($_POST['name_user']);
    $password_user = analyseData($_POST['password_user']);

    if (!empty($name_user) && !empty($password_user)) {

        $user = readUser($name_user, $db);

        if (password_verify($password_user, $user['password_user'])) {

            $_SESSION['id_session'] = session_id();
            header('Location: ?p=crud.admin');

        } else {
            header('Location: ?p=connect.public');
        }

    }
}

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.view.php';