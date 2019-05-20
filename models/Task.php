<?php

class Task {

    // Подключаемся к БД
    public function db() {
        $db = array();

        require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

        try {
            $pdo = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE . ';charset=UTF8;', '' . USERNAME . '', '' . PASSWORD . '');
        } catch (PDOException $e) {
            echo 'DB connection fail ' . $e->getMessage();
            die();
        }
        $pdo->exec('SET NAMES utf8');
        return $pdo;
    }

    // Получаем список задач, по 3 на страницу
    public function getTaskList($page) {
        $order = isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'name';
        $order_type = $order == 'status' ? 'DESC' : 'ASC';

        $pdo = $this->db();
        $offset = 3 * ($page - 1);
        $query = $pdo->prepare("SELECT * FROM task ORDER BY $order $order_type LIMIT 3 OFFSET $offset");
        //$query = $pdo->prepare("SELECT * FROM task ORDER BY $order $order_type");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //Получаем общее кол-во задач
    public function getTaskCount() {
        $pdo = $this->db();
        $query = $pdo->prepare("SELECT count(*) as count FROM task");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $result = $row['count'];
        return $result;
    }

    //Добавляем задачу
    public function addTask() {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $task = isset($_POST['task']) ? $_POST['task'] : '';
        $image_name = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $file = $_FILES['image']['tmp_name'];
            $image_type = $_FILES['image']['type'];

            list($orig_width, $orig_height) = getimagesize($file);

            $width = $orig_width;
            $height = $orig_height;

            if ($height > 240) {
                $width = (240 / $height) * $width;
                $height = 240;
            }

            if ($width > 320) {
                $height = (320 / $width) * $height;
                $width = 320;
            }

            $image = imagecreatetruecolor($width, $height);

            switch ($image_type) {
                case "image/jpeg":
                    $file = imagecreatefromjpeg($file);
                    break;
            }

            imagecopyresampled($image, $file, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
            $image_name = uniqid() . '.jpg';
            $image_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/';
            imagejpeg($image, $image_path . $image_name);
        }

        $pdo = $this->db();
        $query = $pdo->prepare('INSERT INTO task (name, email, task, image) VALUES (:name, :email, :task, :image)');
        $result = $query->execute(array(
            'name' => $name,
            'email' => $email,
            'task' => $task,
            'image' => $image_name,
        ));
        return $result;
    }

    //Редактируем задачу
    public function updateTask($n) {
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $task = isset($_POST['task']) ? $_POST['task'] : '';
        $pdo = $this->db();
        if ($n === 'status') {
            $query = $pdo->prepare('UPDATE task SET status=:status WHERE id=:id');
            $result = $query->execute(array(
                'id' => $id,
                'status' => $status,
            ));
        }
        if ($n === 'task') {
            $query = $pdo->prepare('UPDATE task SET task=:task WHERE id=:id');
            $result = $query->execute(array(
                'id' => $id,
                'task' => $task,
            ));
        }

        return $result;
    }

    //Авторизация
    public function loginUser() {
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $pdo = $this->db();
        $query = $pdo->prepare('SELECT * FROM user WHERE login=:login ');
        $query->execute(array('login' => $login));
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
