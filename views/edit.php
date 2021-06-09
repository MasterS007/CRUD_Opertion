<?php

require_once("../control/display.php");
    $id = $_REQUEST["id"];
    $data = $obj->display_userby_id($id);

   // print_r($data);

   // echo $id;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
</head>
<body>

    <header>    
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarExample01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar -->
    </header>
</br>
<div class="container border" >
        <!-- edit form column -->

        <div class="col-lg-10 text-lg-center">
            <h2>Edit Profile</h2>
            <br>
            <br>
        </div>
        <div class="col-lg-8 push-lg-4 personal-info">
         <form  action="../control/edit_check.php" method="POST" enctype="multipart/form-data">
         <div class="col-lg-20 text-xs-center justify-content-center">
               
                <img src="../asset/<?=$data['photo']?>" height="50px" width="50px">
                
                <h6>Upload a different photo</h6>
                <label class="custom-file" style="text-align: center;">
                <input
                type="file"
                class="form-control-file"
                name="profilePic"
                id="profilePic"
                style="text-align: center;"
                />
                </label>
          </div>

                <input type="hidden" name="id" value="<?= $data["id"]?>">
            
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">First Name</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?=$data["first_name"]?>" name="fname"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Last Name</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" value="<?=$data["last_name"]?>" name="lname"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Age</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="number" value="<?=$data["age"]?>" name="age"/>
                    </div>
                </div>
                <div class="form-group row form-check">
                    <p style="margin-left:-8px;">Gender</p>
                    <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="male"
                    value="male"
                    checked
                    />
                    <label class="form-check-label" for="exampleRadios1"> Male </label>
                </div>
                <div class="form-group row form-check">
                    <input
                    class="form-check-input"
                    type="radio"
                    name="gender"
                    id="female"
                    value="female"
                    />
                    <label class="form-check-label" for="exampleRadios2"> Female </label>
                </div>
                
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="reset" class="btn btn-secondary" value="Cancel" />
                        <input type="submit" name="save"  class="btn btn-primary" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
       
</div>
</body>
</html>