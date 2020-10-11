<?php

if(isset($_SESSION['id_session'])) {
    session_destroy();
    header('Location: ./');
}
