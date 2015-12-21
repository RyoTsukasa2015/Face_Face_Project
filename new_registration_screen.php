<?php 

    session_start();

    require('dbconnect.php');
var_dump($_FILES['image']);
    $image = "";
    if (!empty($_POST)) {
       if (!empty($_FILES['image'])) {
            $image = date('YmdHis') . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '/assets/img/user_img/' . $image); 
        }

        $sql = sprintf('INSERT INTO users SET nickname="%s", email="%s", password="%s", age=%d, gender="%s", hobby="%s", country="%s", upicture="%s", created=NOW()',
            mysqli_real_escape_string($db, $_POST['nickname']),
            mysqli_real_escape_string($db, $_POST['email']),
            mysqli_real_escape_string($db, sha1($_POST['password'])),
            mysqli_real_escape_string($db, $_POST['age']),
            mysqli_real_escape_string($db, $_POST['gender']),
            mysqli_real_escape_string($db, $_POST['hobby']),
            mysqli_real_escape_string($db, $_POST['country']),
            mysqli_real_escape_string($db, $image)
            );
        mysqli_query($db, $sql) or die(mysqli_error($db));

        // header('Location: thanks.php');
        // exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>New registration screen</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/jasny-bootstrap.css" rel="stylesheet">
    <link href="assets/css/new.css" rel="stylesheet">
    
    
    
  </head>

  <body>
<div class="navbar navbar-inverse navbar-static-top hidden-print">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-bars fa-lg"></i>
      </button>
      <div class="logo" href="face_to_face.php" ><img src="assets/img/logo.png" style="height:70px;"><i class="fas fas-logo"></i></div>
    </div>

      <div class="header-right btnk">
          <ul class="nav navbar-nav navbar-right" >
            <!-- <li><a href="マイページのurl"><strong>My Page</strong></a></li> -->
            <!-- <li><a href="file:///Users/ryotsukasa/Documents/web201510/Marco%20Theme/index-ichiran.html"><strong>Schedule</strong></a></li> -->
          </ul>
      </div><!-- <div class="header-right btn1"> -->
  </div>
</div>

   <div class="container">
        <div class="row mt centered ">
            <div class="col-lg-4 col-lg-offset-4">
                <h3>New registration screen</h3>
                <hr>
            </div>
            <div class="col-lg-6 col-lg-offset-3">
                <div class="card card-container">
                    <p id="profile-name" class="profile-name-card"></p>
                    <form class="form-signin" action="" method="post" enctype="multipart/form-data">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="nickname" class="form-control" placeholder="Nick name" required autofocus>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <input type="text" name="age" class="form-control" placeholder="Age" required>
                        <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                        <input type="text" name="hobby" class="form-control" placeholder="Hobby" required>
                        <input type="text" name="country" class="form-control" placeholder="Country" required>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                            <div>
                                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image"></span><?php echo $_FILES['image']['name']; ?>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Registration</button>
                    </form><!-- /form -->
                </div><!-- /card-container -->
            </div>
        </div><!-- /row -->
    </div><!-- /container -->


<!-- 
        <div class="container">
            <form method="post" action="" class="text-center">
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Nickname:</label>
                  <input type="text" name="title" id="title" placeholder="Nickname" class="form-control">
                </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Age:</label>
                  <input type="text" name="date" id="date" placeholder="Age" class="form-control">
                </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Gender:</label>
                  <input type="text" name="when" id="when" placeholder="Gender" class="form-control">
                </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Hobby:</label>
                  <input type="text" name="where" id="where" placeholder="Hobby" class="form-control">
                </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Country :</label>
                  <input type="text" name="purpose" id="purpose" placeholder="Country" class="form-control">
                </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">E-mail:</label>
                  <input type="text" name="date" id="date" placeholder="E-mail" class="form-control">
                </div>
                <img src="assets/img/portfolio/007p.jpg" alt="John Doe">
                <div class="pull-center">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Commit
                    </button>
                </div>
            </form>
        </div>
 -->
               
  </body>
</html>
