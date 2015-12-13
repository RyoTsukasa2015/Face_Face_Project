<?php

  //仮
  $user_id = 1;

	session_start();
	require('dbconnect.php');

	$plan_id = $_GET['plan_id'];

	//planの内容を取得する
	$sql_pl = sprintf('SELECT * FROM plans WHERE id=%d', $plan_id);
	$plans = mysqli_query($db, $sql_pl) or die(mysqli_error($db));
   	$plan = mysqli_fetch_assoc($plans);

	//messageの内容を取得する
	$sql_p = sprintf('SELECT * FROM plans pl, posts po, users u WHERE pl.id=po.plan_id AND po.user_id=u.id AND po.plan_id=%d ORDER BY po.created DESC', $plan_id);
	$posts = mysqli_query($db, $sql_p) or die(mysqli_error($db));

	//DBから取得した内容を配列へ格納する
	while($post = mysqli_fetch_assoc($posts)){
		$posts_r[]=$post;
	}

	//messageを書き込む
	if (isset($_POST['message'])) {
		$sql=sprintf('INSERT INTO posts SET message="%s", plan_id=%d, user_id=%d, created=NOW()',
				mysqli_real_escape_string($db, $_POST['message']),
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $user_id)
			);
		mysqli_query($db, $sql) or die(mysqli_error($db));

		header('Location: chat.php?plan_id='.$plan_id);
		exit();
	}

	//URLを取得する
	$sql_u = sprintf('SELECT u.url FROM plans p, url u WHERE p.id=u.plan_id AND u.plan_id=%d ORDER BY u.created', $plan_id);
	$urls = mysqli_query($db, $sql_u) or die(mysqli_error($db));

	//URLを書き込む
	if (isset($_POST['url'])) {
		$sql=sprintf('INSERT INTO url SET plan_id=%d, url="%s", created=NOW()',
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $_POST['url'])
			);
		mysqli_query($db, $sql) or die(mysqli_error($db));

		header('Location: chat.php?plan_id='.$plan_id);
		exit();
	}

	//memoを取得する
	$sql_m = sprintf('SELECT m.memo FROM plans p, memos m WHERE p.id=m.plan_id AND m.plan_id=%d AND m.user_id=%d ORDER BY m.created', $plan_id, $user_id);
	$memos = mysqli_query($db, $sql_m) or die(mysqli_error($db));

	//memoを書き込む
	if (isset($_POST['memo'])) {
		$sql=sprintf('INSERT INTO memos SET plan_id=%d, user_id=%d, memo="%s", created=NOW()',
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $user_id),
				mysqli_real_escape_string($db, $_POST['memo'])
			);
		mysqli_query($db, $sql) or die(mysqli_error($db));

		header('Location: chat.php?plan_id='.$plan_id);
		exit();
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
				<h2><?php echo $plan['title'] ?></h2>
				<hr>
			</div>
		</div><!-- /row -->
		<form action="" method="post">
			<div class="row mt">
				<div class="col-lg-3 col-md-3 col-xs-12 desc">
					<p>URL</p>
					<div class="input-group">
				      <input type="text" name="url" class="form-control" placeholder="URL..?" <?php if ($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" <?php if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>input</button>
				      </span>
				    </div><!-- /input-group -->
					<hr-d>
					<ol>
				 	<?php
						while($url = mysqli_fetch_assoc($urls)):
					?>
						<li><a href="<?php echo $url['url']; ?>" target="_blank"><?php echo $url['url']; ?></a></li>
					<?php
						endwhile;
					?>
					</ol>
					<br>
					<p>MEMO</p>
					<div class="input-group">
				      <input type="text" name="memo" class="form-control" placeholder="memo..?">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit">input</button>
				      </span>
				    </div><!-- /input-group -->
					<hr-d>
					<?php
						while($memo = mysqli_fetch_assoc($memos)):
					?>
						<p class="lead"><?php echo $memo['memo']; ?></p>
					<?php
						endwhile;
					?>

				</div><!-- col-lg-4 -->
				
				<div class="col-lg-6 col-md-6 col-xs-12 desc">
					<p>CHAT</p>
					<div class="input-group">
				      <input type="text" name="message" class="form-control" placeholder="Let's talk..">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit">send</button>
				      </span>
				    </div><!-- /input-group -->
				    <hr-d>
				    <div class="col-lg-3 col-md-3 col-xs-12 desc">
					<?php
						foreach ($posts_r as $post_each) {
					?>
						<p><a href="mypage.php?user_id=<?php echo $post_each['user_id']; ?>"><?php echo $post_each['nickname']; ?></a></p>
					<?php
						}
					?>
					</div>
				    <div class="col-lg-9 col-md-9 col-xs-12 desc">
					<?php
						foreach ($posts_r as $post_each) {
					?>
						<p><?php echo $post_each['message']; ?></p>
					<?php
						}
					?>

					</div>

				</div><!-- col-lg-4 -->
				
				<div class="col-lg-3 col-md-3 col-xs-12 desc">
					<p>DECISION</p>
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="decision" <?php if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="button" <?php if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>input</button>
				      </span>
				    </div><!-- /input-group -->
					<hr-d>
					<p></p>
					<p class="lead">Date；<?php echo $plan['day']; ?></p>
					<p class="lead">Time；<?php echo $plan['time']; ?></p>
					<p class="lead">Place；<?php echo $plan['place']; ?></p>
					<p class="lead">Remark；<?php echo $plan['remark']; ?></p>
					<p class="lead">Members；考え中</p>

					<div class="pull-right">
						<button type="button" class="btn btn-default">
						  <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Save
						</button>
					</div>
				</div><!-- col-lg-4 -->
			</form>
		</div><!-- /row -->
	</div><!-- /container -->
	
  </body>
</html>
