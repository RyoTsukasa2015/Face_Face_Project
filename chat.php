<?php

	session_start();
	require('dbconnect.php');

	$plan_id = $_GET['plan_id'];
	//chatの内容を取得する
	$sql_p = sprintf('SELECT * FROM plans pl, posts po WHERE pl.id=po.plan_id AND po.plan_id=%d ORDER BY po.created DESC', $plan_id);
	$posts = mysqli_query($db, $sql_p) or die(mysqli_error($db));

	//URLを取得する
	$sql_u = sprintf('SELECT u.url FROM plans p, url u WHERE p.id=u.plan_id AND u.plan_id=%d ORDER BY u.created DESC', $plan_id);
	$urls = mysqli_query($db, $sql_u) or die(mysqli_error($db));

  //仮
  $user_id = 1;
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

    <title>Chat</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/chat.css" rel="stylesheet">
        
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

    <div class="navbar-collapse collapse">
      <div class="header-right btnk">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="mypage.php?user=<?php echo $user_id ?>"><strong>My Page</strong></a></li>
            <li><a href="schedule.php"><strong>Schedule</strong></a></li>
          </ul>
      </div><!-- <div class="header-right btn1"> -->
    </div>
  </div>
</div>

	<div class="container">	

		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h2>たいとる</h2>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-lg-3 col-md-3 col-xs-12 desc">
				<p>URL</p>
				<div class="input-group">
			      <input type="text" class="form-control" placeholder="URL..?">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">input</button>
			      </span>
			    </div><!-- /input-group -->
				<hr-d>
				<ol>
			 	<?php
					while($url = mysqli_fetch_assoc($urls)):
			?>
					<li><a href="<?php echo $url['url']; ?>"><?php echo $url['url']; ?></a></li>
				<?php
					endwhile;
				?>
				</ol>
				<br>
				<p>MEMO</p>
				<div class="input-group">
			      <input type="text" class="form-control" placeholder="memo..?">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">input</button>
			      </span>
			    </div><!-- /input-group -->
				<hr-d>
				<p></p>
				<p class="lead">December 18th</p>
				<p class="lead">8:00~</p>


			</div><!-- col-lg-4 -->
			
			<div class="col-lg-6 col-md-6 col-xs-12 desc">
				<p>CHAT</p>
				<div class="input-group">
			      <input type="text" class="form-control" placeholder="Let's talk..">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">send</button>
			      </span>
			    </div><!-- /input-group -->
			    <hr-d>
			    <div class="col-lg-3 col-md-3 col-xs-12 desc">
					<p><a href="#">hanako</a></p>
					<p><a href="#">taro</a></p>
					<p><a href="#">Jennifer</a></p>
					<p><a href="#">Karen</a></p>
					<p><a href="#">Joan</a></p>
					<p><a href="#">Joy</a></p>
					<p><a href="#">Goro</a></p>
					<p><a href="#">Megu</a></p>
				</div>
			    <div class="col-lg-9 col-md-9 col-xs-12 desc">
					<p>;)</p>
					<p>I can't wait!!!</p>
					<p>Let's go !</p>
					<p>Yeah!</p>
					<p>Good~~~~.</p>
					<p>I send URL.</p>
					<p>Hi!</p>
					<p>Good morning!</p>
				</div>

			</div><!-- col-lg-4 -->
			
			<div class="col-lg-3 col-md-3 col-xs-12 desc">
				<p>DECISION</p>
				<div class="input-group">
			      <input type="text" class="form-control" placeholder="decision">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">input</button>
			      </span>
			    </div><!-- /input-group -->
				<hr-d>
				<p></p>
				<p class="lead">日付；12月15日（水）</p>
				<p class="lead">時間；8:00~</p>
				<p class="lead">場所；カモテス島</p>
				<p class="lead">目的；10mジャンプをする！</p>
				<p class="lead">メンバー；hanako</p>

				<div class="pull-right">
					<button type="button" class="btn btn-default">
					  <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Save
					</button>
				</div>
			</div><!-- col-lg-4 -->
			
		</div><!-- /row -->
	</div><!-- /container -->
	
  </body>
</html>
