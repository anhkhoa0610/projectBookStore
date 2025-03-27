<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
ul {
    display: flex;
    justify-content: center;
    margin: auto;
}
.nav-item {
    margin: 0 15px;
}

a{
    margin-right: 15px;
    text-decoration: none;
    font-size: 25px;
}


form {
    width: 500px;
    margin: 20px auto;

    padding: 20px;
    border: 1px solid black;
    border-radius: 15px;
}

.view-info {
    width: 500px;
    margin: 50px auto;
    border: 1px solid black;
    border-radius: 15px;
    padding: 15px;
}

.info {
    font-weight: bold;

}

.title {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
}

footer {
    display: flex;
    justify-content: center;
}

.footer-control {
    font-weight: bolder;
    font-size: 2rem;

}

.-table {
    width: 600px;
    margin: 20px auto;
}
</style>
<body>
    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
          </ul>
        </div>
      
      </nav>
      <div class="title mt-2">Login Screen</div>
      <form action="">
        <div class="mb-3 mt-3">
          <label for="user" class="form-label">Username:</label>
          <input type="text" class="form-control" id="user" placeholder="Enter username" name="username">
        </div>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <div class="form-check mb-3">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


</body>
<footer>
    <div class="footer-control">23211TT0029 &copy; 2025</div>
</footer>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>