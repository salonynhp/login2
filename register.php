

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>login2</title>
  </head>
  <body style="background-color:#FFE3D8">
  <nav style="background-color:  #262A53" class="navbar navbar-expand-lg navbar-light" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">systemlogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="register.php">register</a></li>
            <li><a class="dropdown-item" href="#">login</a></li>
            <li><a class="dropdown-item" href="logout.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--form-->
<div class="container mt-4";>
    <h3>resister here</h3>
    <hr>
<form  action="newsubmit.php" method="post" class="row g-3" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputpassword4" class="form-label">password</label>
    <input type="password" class="form-control" name="password" id="inputpassword4">
  </div>
  <div class="col-md-6">
    <label for="inputpassword4" class="form-label">confirm password</label>
    <input type="password" class="form-control" name="confirm_password" id="inputpassword">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">email id</label>
    <input type="email" name="email" class="form-control" id="inputAddress2" >
  </div>
  <div class="col-12">
    <label for="inputAddresss5" class="form-label">student name</label>
    <input type="text" name="stuname" class="form-control" id="inputAddress5" >
  </div>
  <div class="col-12">
  <label for="email"> <strong> Gender </strong></label>
                    <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male"><strong>Male</strong></label>
                    <label for="Female" class="radio-inline"><input type="radio" name="gender" value="f" id="Female"><strong>Female</strong></label>
                    <label for="Others" class="radio-inline"><input type="radio" name="gender" value="o" id="Others"><strong>Others</strong></label>
                   </div>

  <div class="mb-3">
                <lebel for="religion">Religion:</lebel>
                <select name="rele" class="form-select" aria-label="Default select example">
                  <option selected>Select your religion</option>
                  <?php
                      include 'config.php';
                        $sql="SELECT rel_id, rel_name FROM religion"; //declaring variable preparing statement
                        $result=mysqli_query($conn,$sql); //connecting to db table religion conn defined in config.php
                        //fetching from db 
                        while ($rel= mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $rel["rel_id"]; ?>">  <!--entering into table user -->
                        <?php echo $rel["rel_name"]; ?></option> <!--dikhane ka dant .showing in form-->
                        <?php
                      }
                      ?>
                </select>
            </div>

   <!-- <div class="col-12">
    <div class="form-check">
      <input name="facility[]" class="form-check-input" type="checkbox" id="gridCheck" value="1">
      <label class="form-check-label" for="gridCheck">
        bus
      </label>
    </div>
 </div>
 <div class="col-12">
    <div class="form-check">
      <input name="facility[]" class="form-check-input" type="checkbox" id="gridCheck1" value="2">
      <label class="form-check-label" for="gridCheck">
        gym
      </label>
    </div>
</div>

<div class="col-12">
    <div class="form-check">
      <input name="facility[]" class="form-check-input" type="checkbox" id="gridCheck1" value="3">
      <label class="form-check-label" for="gridCheck">
       canteen
      </label>
    </div>
</div>
<div class="col-12">
    <div class="form-check">
      <input name="facility[]" class="form-check-input" type="checkbox" id="gridCheck1" value="4">
      <label class="form-check-label" for="gridCheck">
       hostel
      </label>
    </div>
</div>  -->


<div class="mb-3 form-value-container">
                <label for="facility" class="form-label" name="facilities">Facilities availed:</label>
                  <br>
                  <?php
                    include 'config.php';
                    $sql_facility="SELECT fac_id,fac_name
                    FROM facility";
                    $result_facility=mysqli_query($conn,$sql_facility);

                    while($rel_facility=mysqli_fetch_assoc($result_facility)){
                      ?>
                      <div class="form-check form-check-inline ms-3 col-3">
                      <input class="form-check-input" type="checkbox" name="facility[]" value="<?php echo $rel_facility["fac_id"]; ?>">
                      <label class="form-check-label" for="inlineCheckbox"><?php echo $rel_facility["fac_name"]; ?></label>
                      </div>
                      <?php
                    }
                
                  ?>                 
            </div>



            
            
 <!-- <div class="col-md-3">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
   <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div> 
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>-->

  <div class="col">
        Photo<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
   </div>



  <div class="col-12">
    <button type="submit" value="submit" name="submit" class="btn btn-primary">submit</button>
  </div>
</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>