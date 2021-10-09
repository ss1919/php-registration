<?php
require_once 'lib/rb.php';
R::setup('mysql:host=localhost; dbname=reg', 'root', 'root');
session_start();
/**
 * Возвращаем первую строку массива
 **/
function showError($errors)
{
    return array_shift($errors);
}
