<?php
require_once '../models/User.php';

function store()
{
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $user = new User();

  $user->fullname = $fullname;
  $user->email = $email;
  $user->username = $username;
  $user->password = $password;
  $user->role = $role;

  $user->save();
}

function validate_request()
{
  $errors = [];

  foreach ($_POST as $key => $value) {
    if (empty($value)) {
      array_push($errors, "{$key} is requerid");
    }
  }

  if ($_POST['password'] != $_POST['repassword']) {
    array_push($errors, "Passwords does not match");
  }

  return $errors;
}

function main()
{
  $errors = validate_request();
  if (empty($errors)) {
    store();
    // require_once '../views/home.php';
    header('Location: ../views/home.php');
  } else {
    session_start();
    $_SESSION['errors'] = $errors;
    require_once '../views/register.php';
    // header('Location: ../views/register.php');
  }
}

main();
