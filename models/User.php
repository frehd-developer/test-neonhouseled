<?php
class User
{
  public $fullname;
  public $username;
  public $password;
  public $email;
  public $role;
  public $conn;

  public function __construct()
  {
    $this->fullname = '';
    $this->username = '';
    $this->password = '';
    $this->email = '';
    $this->role = '';

    $this->conn = new mysqli('localhost', 'root', '123456', 'neonhouseled');
  }

  public static function get($username, $password)
  {
    $user = [];

    $query = "SELECT * FROM users WHERE username = '$username'";
    try {
      $conn = new mysqli('localhost', 'root', '123456', 'neonhouseled');

      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $user = $row;
        }

        if ($user['password'] == $password) {
          return ['user' => $user, 'message' => null];
        } else {
          return ['user' => null, 'message' => 'Password incorrect'];
        }
      } else {
        return ['user' => null, 'message' => 'User dont exist'];
      }


      throw new Exception($conn->errno);
    } catch (Exception $e) {
      return;
    } finally {
      $conn->close();
    }

    return $user;
  }

  public function save()
  {
    $query = "INSERT INTO users (fullname, username, password, email, role) VALUES ('$this->fullname', '$this->username', '$this->password', '$this->email', '$this->role');";

    try {
      $this->conn->query($query);
      throw new Exception($this->conn->errno);
    } catch (Exception $e) {
      return;
    } finally {
      $this->conn->close();
    }
  }
}
