<?php
//to call when logging out
if(isset($_SESSION['id_session'])) {

    // empties the global session
    $_SESSION = array();

    // Reads the value of an option "session.use_cookies", return bool
    if (ini_get("session.use_cookies")) {

        // stores the configuration of the session cookies
        $params = session_get_cookie_params();

        // configures a coockies  with a previous time to delete it
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // destroy the session quote server and redirection home
    session_destroy();
    header('Location: ./');

}