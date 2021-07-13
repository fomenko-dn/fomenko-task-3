<?php
    $first_name = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $last_name = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_EMAIL));
    $role = trim(filter_var($_POST['role'], FILTER_SANITIZE_STRING));
    $status = trim(filter_var($_POST['status'], FILTER_SANITIZE_STRING));

    $error = '';

    if(strlen($first_name) <= 3) //если длина переменной меньше трехсимволов
        $error = 'Input first name';
    else if(strlen($last_name) <= 3) //если длина переменной меньше трехсимволов
        $error = 'Input last name';
    else if(strlen($role) <= 3) //если длина переменной меньше трехсимволов
        $error = 'Choose role';
    else if(strlen($status) <= 3) //если длина переменной меньше трехсимволов
        $error = 'Choose status';

    if($error != ''){
        echo $error;
        exit();
    }

    require_once'../db.php';
    
    $sql = 'INSERT INTO `users`(`first_name`, `last_name`, `role`, `status`) VALUES ($first_name, $last_name, $role, $status)';
    $query = $pdo->prepare($sql);
    $query->execute([$first_name, $last_name, $role, $status]);

    echo 'Готово';

?>
<!-- INSERT INTO `users` (`id`, `first_name`, `last_name`, `role`, `status`) VALUES ('1', 'Dima', 'Fomenko', 'admin', 'active'); -->