<?php

// call model of the current page
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.model.php';

// user tries to connect
if (isset($_POST['connect_user'])) {

    // analyse data
    $name_user = analyseData($_POST['name_user']);
    $password_user = analyseData($_POST['password_user']);

    // if no field is empty
    if (!empty($name_user) && !empty($password_user)) {

        // read user
        $user = readUser($name_user, $db);

        // if empty user, return message
        if (empty($user)) {

            $error_input = 'Invalid name';

            // else if verify password and key user return true
        } elseif (password_verify($password_user, $user['password_user']) && $user['key_user'] === '7f76997b1a2f5d5d5a6439430d7f6fdd') {

            // insert session id to table $_SESSION
            $_SESSION['id_session'] = session_id();

            // redirection to the main admin page
            header('Location: ?p=create.article.admin');

        } else {

            // else return message
            $error_input = 'Invalid password';

        }
    }
}

// call view of the current page
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.view.php';