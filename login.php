<?php

session_start();
//if user is already logged in
if(isset($_SESSION['username']))
{//redirect to welcome.php
    header("location:welcome.php");
    exit;
}
//if not logged in ->create commection with db
require_once "config.php";

$username = $password ="";
$err = "";

//if request method is post 
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
   {
     $err="please enter username + password";
    }
    else
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
     }
 
if(empty($err))
{
    $sql="SELECT id,username, password FROM users WHERE username= ?"; //mysql prepared statememt
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$param_username);
    $param_username=$username;
  
    
    //try to execute this statement
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==1)
        {
            mysqli_stmt_bind_result($stmt,$id,$username,$hashed_password);
            if(mysqli_stmt_fetch($stmt))
            {
                if(password_verify($password,$hashed_password))
                {//password corred allow user to login
                    session_start();
                    $_SESSION["username"]=$username;
                    $_SESSION["id"]=$id;
                    $_SESSION["loggedin"]=true;
                    
                    //redirect user to welcome page
                    header("location:welcome.php");
                }
               
            }
        }
    }
}
  

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We"
      crossorigin="anonymous"
    />

    <title>login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">systemlogin</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Dropdown link
              </a>
              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li>
                  <a class="dropdown-item" href="register.php">register</a>
                </li>
                <li><a class="dropdown-item" href="#">login</a></li>
                <li><a class="dropdown-item" href="logout.php">logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--form-->
    <div class="container mt-4" ;>
      <h3>login here</h3>
      <hr />
      <form action="" method="post">
        <div class="row mb-3">
          <label for="inputEmail3" class="col-sm-2 col-form-label"
            >username</label
          >
          <div class="col-sm-10">
            <input
              type="text"
              name="username"
              class="form-control"
              id="inputEmail3"
            />
          </div>
        </div>
        <div class="row mb-3">
          <label for="inputPassword3" class="col-sm-2 col-form-label"
            >password</label
          >
          <div class="col-sm-10">
            <input
              type="password"
              name="password"
              class="form-control"
              id="inputPassword3"
            />
          </div>
        </div>

        <!-- <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
          Example checkbox
        </label>
      </div>
    </div>
  </div> -->
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
