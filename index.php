<?php
//@category: Задачник (реализация на чистом php с использованием паттерна MVC)
//@author: Pavel Slepov
//В проекте использованы некоторые наработки взятые с репозитория https://github.com/VladimirShaganian/task_manager
//@copyright 2019 
//@version: 19.5.18
//@email: p.coder911@gmail.com

// FRONT COTROLLER
// 1. Общие настройки

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');

// 3. Запуск работы с сессиями

session_start();

// 4. Вызов Router

$router = new Router();
$router->run();
