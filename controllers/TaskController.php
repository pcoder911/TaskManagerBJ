<?php

include_once ROOT . '/models/Task.php';
include_once ROOT . '/components/Pagination.php';

class TaskController {

    public function actionIndex($page = 1) {

        if (isset($_GET['sort'])) {
            $_SESSION['sort'] = $_GET['sort'];
        }
        $action1='index';
        $obj = new Task;
        $data['task_list'] = $obj->getTaskList($page);
        $total = $obj->getTaskCount();
        $data['pagination'] = new Pagination($total + 1, $page, 3, 'page-');
        
        
        require_once(ROOT . '/views/task/_templates/header.php');
        require_once(ROOT . '/views/task/index.php');
        require_once(ROOT . '/views/task/_templates/footer.php');

        return true;
    }

    public function actionView() {
        if (isset($_POST) && !empty($_POST)) {
            $gl1 = new Task;
            $action1='add';
            if ($gl1->addTask()) {
                header('Location: http://' . $_SERVER['HTTP_HOST']);
                exit;
            }
        }
        require_once(ROOT . '/views/task/_templates/header.php');
        require_once(ROOT . '/views/task/view.php');
        require_once(ROOT . '/views/task/_templates/footer.php');

        return true;
    }

    public function actionUpdate($n) {
        $obj = new Task;
        $obj->updateTask($n);
    }

    public function actionLogin() {

        $data = array();

        if (isset($_POST) && !empty($_POST)) {
            $obj = new Task;
            $user = $obj->loginUser();

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: http://' . $_SERVER['HTTP_HOST']);
                exit;
            } else {
                $data['message'] = 'Неправильные логин или пароль!';
            }
        }
        require_once(ROOT . '/views/task/_templates/header.php');
        require_once(ROOT . '/views/task/login.php');
        require_once(ROOT . '/views/task/_templates/footer.php');
    }

    public function actionLogout() {
        session_destroy();
        header('Location: http://' . $_SERVER['HTTP_HOST']);
        exit;
    }
}
