<?php
	session_start();
	require('dbconnect.php');

	//投稿を取得する
	$sql = sprintf('SELECT * FROM plans WHERE status<>2 ORDER BY created DESC');
	$plans = mysqli_query($db, $sql) or die(mysqli_error($db));

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Schedule</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main-ichiran.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/teisei-ichiran.css" rel="stylesheet">

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
		    	<a href="face_to_face.php"><img src="assets/img/logo.png" height=80px width=130px><i class="fas fas-logo"></i></a>
		    </div>
	   	</div>

      	<div class="header-right btnk">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="mypage.php"><strong>My Page</strong></a></li>
          </ul>
      	</div>
      </div>
	</div>
 
	<div class="container">	
		<div class="row mt centered">
			<div class="col-lg-4 col-lg-offset-4">
				<h3>Learning English(カテゴリー名表示)</h3>
				<hr>
			</div>
		</div>

	 	<?php
			while($plan = mysqli_fetch_assoc($plans)):
		?>
		<div class="row mt">
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<span class="kikaku1">
					<div class="b-wrapper">
					  	<h4><?php echo $plan['title']?></h4>
					  	<p>Date:<?php echo $plan['day']?></p>
					  	<p>Time:<?php echo $plan['time']?></p>
					  	<p>Where:<?php echo $plan['place']?></p>
					  	<p>Remark:<?php echo $plan['remark']?></p>
					</div>
				</span>
				<hr-d>
			</div><!-- col-lg-4 -->
		<?php
			endwhile;
		?>
		</div><!-- /container -->


	<div class="next">
		 	<a href="">次へ</a>
	</div>	

  </body>
</html>
