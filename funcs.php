<?php
function users(){
    $file_json = "users.json";
    $json      = file_get_contents($file_json);
    $users     = json_decode($json, true);
    return $users;
}

// Проверка, существует ли пользователь с указанным логином
function existsUser($login){
    $users = users();
    foreach ($users as $user) {
        // print_r($user);
        if($user['login'] === $login){
            return true;
        }
    }
    return false;
}

// Сделал, но не вижу смысла использовать её тут
function getUsersList(){
    $users = users();
    $usersList = [];
    foreach($users as $user){
        $hashedPas = password_hash($user['password'], PASSWORD_DEFAULT);
        $usersList[] = [
            'login'=> $user['login'],
            'password'=> $hashedPas
        ];
    }
    return $usersList;
}

// Добавление пользователя в БД
function addUser($login, $password){
    $file_json  = "users.json";
    $hashedPas = password_hash($password, PASSWORD_DEFAULT);
    $json = file_get_contents($file_json);
    $data = json_decode($json, true);
    $data[] = [
        'login'    => $login,
        'password' => $hashedPas
    ];
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    // Запись в файл
    $fp = fopen($file_json, 'w');
    fwrite($fp, $jsonString);
    fclose($fp);
}

// Проверка, правильно ли пользователь ввел пароль
function checkPassword($login, $password){
    $users = users();
    foreach($users as $user){
        if($user['login'] == $login){
            return password_verify($password, $user['password']);
        }
    }
    return false;
}

// Определение имени пользователя
function getCurrentUser(){
    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    } else {
        return null;
    }
}