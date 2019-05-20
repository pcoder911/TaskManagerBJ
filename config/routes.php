<?php
// устанавливаем правила роутинга
return array(
    'page-([0-9]+)' => 'task/index/$1',
    'add' => 'task/view',
    'update/status' => 'task/update/status',
    'update/task' => 'task/update/task',
    'login' => 'task/login',
    'logout' => 'task/logout',
    '' => 'task/index/1'
);
