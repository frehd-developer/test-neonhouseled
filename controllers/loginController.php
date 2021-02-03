<?php
require_once '../models/User.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = User::get($username, $password);

$errors = [];

if (isset($result['user'])) {
  $_SESSION['user'] = $result['user']['username'];
  $_SESSION['role'] = $result['user']['role'];
  $_SESSION['name'] = $result['user']['fullname'];

  require_once '../views/home.php';
} else {
  array_push($errors, $result['message']);
  require_once '../views/login.php';
}
