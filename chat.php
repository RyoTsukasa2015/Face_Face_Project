<?php

  //仮
  $user_id = 1;

	session_start();
	require('dbconnect.php');

	//企画が選択されていない場合、TOP画面に戻る
	if (!isset($_GET['plan_id'])) {
		header('Location: face_to_face.php');
		exit();
	}

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
	if (isset($_POST['b_message']) && $_POST['message']!="")  {
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
	if (isset($_POST['b_url']) && $_POST['url']!="") {
		$sql=sprintf('INSERT INTO url SET plan_id=%d, url="%s", created=NOW()',
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $_POST['url'])
			);
		mysqli_query($db, $sql) or die(mysqli_error($db));

		header('Location: chat.php?plan_id='.$plan_id);
		exit();
	}

	//memoを取得する
	$sql_m = sprintf('SELECT m.id, m.memo FROM plans p, memos m WHERE p.id=m.plan_id AND m.plan_id=%d AND m.user_id=%d ORDER BY m.created', $plan_id, $user_id);
	$memos = mysqli_query($db, $sql_m) or die(mysqli_error($db));
	$memo = mysqli_fetch_assoc($memos);

	//memoを書き込む
	if (isset($_POST['b_memo']) && $_POST['memo']!="") {
		if (empty($memo)) {
			$sql=sprintf('INSERT INTO memos SET plan_id=%d, user_id=%d, memo="%s", created=NOW()',
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $user_id),
				mysqli_real_escape_string($db, $_POST['memo'])
			);
		}else{
			$sql=sprintf('UPDATE memos SET plan_id=%d, user_id=%d, memo="%s", created=NOW() WHERE id=%d',
				mysqli_real_escape_string($db, $plan_id),
				mysqli_real_escape_string($db, $user_id),
				mysqli_real_escape_string($db, $_POST['memo']),
				mysqli_real_escape_string($db, $memo['id'])
			);

		}

		mysqli_query($db, $sql) or die(mysqli_error($db));

		header('Location: chat.php?plan_id='.$plan_id);
		exit();
	}

	//を書き込む
	if (isset($_POST['update'])) {
		$sql=sprintf('UPDATE plans SET day="%s", time=%d, place="%s", remark="%s" WHERE id=%d',
			mysqli_real_escape_string($db, $_POST['d_day']),
			mysqli_real_escape_string($db, $_POST['d_time']),
			mysqli_real_escape_string($db, $_POST['d_place']),
			mysqli_real_escape_string($db, $_POST['d_remark']),
			mysqli_real_escape_string($db, $plan_id)
		);
		var_dump($sprintfql);

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
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <meta http-equiv="refresh" content="30">

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
      <a href="face_to_face.php"><img src="assets/img/logo.png" style="height:70px;"><i class="fas fas-logo"></i></a>
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
				<div class="col-lg-3 col-md-3 col-xs-3 desc">
					<p>URL</p>
					<div class="input-group">
				      <input type="text" name="url" class="form-control" placeholder="URL..?" <?php if ($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" name="b_url" value="input" <?php if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>input</button>
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
					<p></p>
					<div class="input-group">
						<input class="input-group-btn">
				        <button class="btn btn-default" type="submit" name="b_memo" value="input">input</button>
				        <hr-d>
				      	<textarea name="memo" cols="50" rows="10" class="form-control" placeholder="memo..?"><?php echo $memo['memo']; ?></textarea>
						<!-- <input type="text" name="memo" <?php //echo $memo['memo']; ?>"> -->
				      
				    </div><!-- /input-group -->

				</div><!-- col-lg-4 -->
				
				<div class="col-lg-6 col-md-6 col-xs-6 desc">
					<p>CHAT</p>
					<div class="input-group">
				      <input type="text" name="message" class="form-control" placeholder="Let's talk..">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit" name="b_message" value="send">send</button>
				      </span>
				    </div><!-- /input-group -->
				    <hr-d>
				    <div class="col-lg-3 col-md-3 col-xs-3 desc">
					<?php
					if(!empty($posts_r)){
						foreach ($posts_r as $post_each) {
					?>
						<p><a href="mypage.php?user_id=<?php echo $post_each['user_id']; ?>"><?php echo $post_each['nickname']; ?></a></p>
					<?php
						}
					}
					?>
					</div>
				    <div class="col-lg-9 col-md-9 col-xs-9 desc">
					<?php
					if(!empty($posts_r)){
						foreach ($posts_r as $post_each) {
					?>
						<p><?php echo $post_each['message']; ?></p>
					<?php
						}
					}
					?>

					</div>

				</div><!-- col-lg-4 -->
				
				<div class="col-lg-3 col-md-3 col-xs-3 desc">
					<p>DECISION</p>
					<!-- <div class="input-group"> -->
				      <!-- <input type="text" class="form-control" placeholder="decision" <?php //if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>> -->
				      <!-- <span class="input-group-btn">
				        <button class="btn btn-default" type="button" name="decision" value="input" <?php //if($user_id!=$plan['user_id']){echo 'disabled'; }; ?>>decision</button>
				      </span> -->
				    <!-- </div>/input-group -->
					<hr-d>
					<p></p>
					<input class="input-group-btn">
					<p class="lead">Date；<input type="text" class="form-control" name="d_day" value="<?php echo $plan['day']; ?>">
					<p class="lead">Time；<input type="text" class="form-control" name="d_time" value="<?php echo $plan['time']; ?>">
					<p class="lead">Place；<textarea type="text" class="form-control" name="d_place"><?php echo $plan['place']; ?></textarea>
					<p class="lead">Remark；<textarea type="text" class="form-control" name="d_remark"><?php echo $plan['remark']; ?></textarea>
					<p class="lead">Members；プルダウンで選択?</p>

					<div class="pull-right">
						<button type="submit" class="btn btn-default" name="update" value="update">
						  <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> Update
						</button>
						<button type="submit" class="btn btn-default" name="save" value="confirm">
						  <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Confirm
						</button>
					</div>
				</div><!-- col-lg-4 -->
			</form>
		</div><!-- /row -->
	</div><!-- /container -->
<footer class="bg-dark-gray padding-top40" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

	<div id="" class="container">
		<div class="row">

			<!-- メインのページ一覧 -->
			

			<!-- 会社概要など-->
			<!-- <div class="col-sm-3 col-xs-12">
				<ul class="list-unstyled footer-list">
					<!- <li><a href="http://phil-portal.com/activity/" class="white">アクティビティ</a></li> -->
					<!-- <li><a href="http://phil-portal.com/tour/" class="white">旅行</a></li>
					<li><a href="http://phil-portal.com/gourmet/" class="white">勉強</a></li>
					<li><a href="http://phil-portal.com/philippines-ryugaku-info/" class="white">飲み会</a></li> -->
				<!-- 	<li><a href="http://phil-portal.com/business/" class="white">ビジネス</a></li>
					<li><a href="http://phil-portal.com/study-english/" class="white">英語学習</a></li>
					<li><a href="http://phil-portal.com/local/" class="white">ローカル</a></li>
					<li><a href="http://phil-portal.com/sitemap/" class="white">サイトマップ</a></li> -->
				<!-- </ul>
			</div> --> 

			<!-- SNS-->
			

			<!-- likebox-->
			<div class="col-sm-3 col-xs-12 bg-white no-space">
				<div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/pages/Phil-Portal/475643152593855" data-width="245" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"></blockquote></div></div>
			</div>

		</div>
	</div>

	</br></br></br></br></br></br><p class="foot-text text-center top30 white"> 2015.Face×Fece  All Rights Reserved.</p>
</footer>


	
  </body>
</html>
