<?php

    if(isset($_POST["password"])){
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_DEFAULT);
        echo $password;
    }

?>