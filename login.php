<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <title>Login</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
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
        <div class="logo">
          <a href="face_to_face.php"><img src="assets/img/logo.png" style="height:70px;"><i class="fas fas-logo"></i></a>
        </div>
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


   <div class="container">
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="name" id="inputName" class="form-control" placeholder="Name" required>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>
            </form><!-- /form -->
            <a href="new_registration_screen.php" class="forgot-password">
                Sign up?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

    <!--     <div class="content">
     <div class="forming">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="col-lg-4 col-md-4 col-xs-4 col-lg-offset-4 col-md-offset-4 col-xs-offset-4">
    	   <p>Please fill out the following blank.</p>
    			<dl>
    				<dt>Nick name </dt>
    					<input type="text" name="name" size="35" maxlength="255" placeholder="Please fill out your nick name"> 
    				<dt>e-mail address</dt>
    				<dd> 
    					<input type="text" name="email" size="35" maxlength="255"value="">
    					<p classs="error"> *　Please fill out your nick name</p>
    				</dd>
    			</dl>
    		 </form>
      </div>
     </div><!- <div class="forming"> -->

      <!--  <div class="under">
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc back" >
    	 	<input type="button" onclick="history.back()" value="back">
    	 </div>
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc login">
    	 	<input type="submit" value="login">
    	 </div>
    	 <div class="col-lg-4 col-md-4 col-xs-12 desc" >
    	 	<a href="new_registration_screen.php"><input type="button" value="new entry"></a>
         </div> 	
       </div><!-under  -->
  </div><!-- content"> -->
		<footer class="bg-dark-gray padding-top40" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

	<div id="" class="container">
		<div class="row">

		
			<div class="col-sm-3 col-xs-12 bg-white no-space">
				<div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/pages/Phil-Portal/475643152593855" data-width="245" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"></blockquote></div></div>
			</div>

		</div>
	</div>

	<p class="foot-text text-center top30 white"> 2015.Face×Fece  All Rights Reserved.</p>
</footer>
  </body>

	<footer>
	    <div class="container"><!-- ここにコードを書いていきましょう -->
	    <img src="">
	    <p></p>
	    </div>
	</footer>
  
</html>
