<?php

    // session_start();
    $_SESSION['firstname'] = '';
    session_destroy();
    header('location: index.php');

?>