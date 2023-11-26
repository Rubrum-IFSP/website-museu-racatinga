<?php
    if (session_id() == '') session_start();
    session_unset();
    header("Location: {$_SERVER['HTTP_REFERER']}");
?>