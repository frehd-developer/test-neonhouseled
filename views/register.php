<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>System | Register</title>
</head>

<body>
  <div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
      <form action="../controllers/registerController.php" method="POST">
        <div class="mb-3">
          <label for="fullname" class="form-label">Name:</label>
          <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
          <label for="repassword" class="form-label">Confirm password:</label>
          <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Password">
        </div>
        <div class="mb-3">
          <label for="repassword" class="form-label">Role:</label>
          <select name="role" id="role" class="form-select">
            <option value="editor">Editor</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="ml-auto">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) : ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($_SESSION['errors'] as $error) : ?>
              <li><?php echo $error; ?></li>
            <?php endforeach ?>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </div>
</body>

</html>