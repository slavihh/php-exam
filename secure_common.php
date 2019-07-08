<?php
require_once 'common.php';

if (!isset($_SESSION['id']))
    header('Location: login.php');
