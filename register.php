<?php

require_once "common.php";
if(isset($_SESSION['id']))
    header('Location: profile.php');
$userHttpHandler->register($_POST);