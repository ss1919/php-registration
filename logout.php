<?php
require_once 'db.php';
unset($_SESSION['user']);
header('Location: /');
