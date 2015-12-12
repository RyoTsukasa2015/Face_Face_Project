<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Login</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main-login.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-static-top hidden-print">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars fa-lg"></i>
          </button>
          <a href="face_to_face.php"><img src="assets/img/logo.png" height=80px width=130px><i class="fas fas-logo"></i></a>
        </div>
      </div>
    </div>

    	<div class="container">	

    		<div class="row mt centered ">
    			<div class="col-lg-4 col-lg-offset-4">
    				<h3>LOGIN</h3>
    				<hr>
    			</div>
    		</div><!-- /row -->

    	</div>	<!-- CSSですが、「BLOG POSTS」エリアはまだ消していません -->



    <div class="content">
     <div class="forming">
    	 <p>Please fill out the following blank.</p>
    		 <form action="" method="post" enctype="multipart/form-data">
    			<dl>
    				<dt>Nick name </dt>
    				<dd>
    					<input type="text" name="name" size="35" maxlength="255"value=""> 
    					<p class="error">*　Please fill out your nick name</p>
    				</dd>
    				<dt>e-mail address</dt>
    				<dd> 
    					<input type="text" name="email" size="35" maxlength="255"value="">
    					<p classs="error"> *　Please fill out your nick name</p>
    				</dd>
    			</dl>
    		 </form>
     </div><!-- <div class="forming"> -->


       <div class="under">
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc back" >
    	 	<input type="button" onclick="history.back()" value="back">
    	 </div>
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc login">
    	 	<input type="submit" value="login">
    	 </div>
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc" >
    	 	<a href="new_registration_screen.php"><input type="button" value="new entry"></a>
         </div> 	
       </div><!--under  -->
  </div><!-- content"> -->
		
  </body>

	<footer>
	    <div class="container"><!-- ここにコードを書いていきましょう -->
	    <img src="">
	    <p></p>
	    </div>
	</footer>
  
</html>
