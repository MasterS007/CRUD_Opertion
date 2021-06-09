<?php
  

  require_once("../control/display.php");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>
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
    <div class="col-12">

    <div class="col-5">
    <h2>Users Information</h2>
    </div>
      
    <table class="table" border="2">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Photo</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>

          <?php
           // echo count($data);

            for($d=0; $d!=count($data); $d++)
            {
              ?>
            <tr>
                <td scope="row"><?=$data[$d]['id']?></td>
                <td><?=$data[$d]['first_name']?></td>
                <td><?=$data[$d]['last_name']?></td>
                <td><?=$data[$d]['gender']?></td>
                <td><?=$data[$d]['age']?></td>
                <td><?='<img src="data:asset/;base64,'.base64_encode( $data[$d]['photo'] ).'"'?></td>
                <td><a href="edit.php?id=<?=$data[$d]['id']?>"><button type="button" class="btn btn-success">Edit</button></a> 
                <button type="button" class="btn btn-danger">Delete</button>
              </td>
              </tr>
          
              
        <?php
             }
        ?>
         
        </tbody>
      </table>
      </div>
</body>
</html>