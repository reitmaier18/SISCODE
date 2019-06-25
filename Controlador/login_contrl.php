<?php
    $user = base64_encode($_POST['user']);
    $passwd = md5($_POST['password']);
    echo($user." esto significa ".base64_decode($user));

?>