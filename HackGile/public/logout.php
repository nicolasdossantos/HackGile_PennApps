<?php
    //require_login();
    
    if (isset($_COOKIE[session_name()])){
        setcookie(session_name(), "", time()-3600, "/");
    }
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
?>