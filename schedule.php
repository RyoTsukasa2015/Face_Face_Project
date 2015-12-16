<?php
	session_start();
	require('dbconnect.php');

	//カテゴリー選択されていない場合、TOP画面に戻る
	if (!isset($_GET['cat_id'])) {
		header('Location: face_to_face.php');
		exit();
	}

	$category_id=$_GET['cat_id'];

	//ページング
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	//1ページに表示する件数を決める。
	$limit_qty = 12;
	//もし$pageにマイナスが入っていた場合、1に置き換えたい
	$page = max($page, 1);

	//最終ページを取得する
	$sql = sprintf('SELECT COUNT(*) AS cnt FROM plans WHERE category_id=%d AND status<>2', $category_id);
	$recordSet = mysqli_query($db, $sql);
	$table = mysqli_fetch_assoc($recordSet);
	$maxPage = ceil($table['cnt'] / $limit_qty);
	//最大ページより大きい数を指定されても、最大ページに置き換える
	$page = min($page, $maxPage);

	//開始データの開始番号を割り出す
	//SQL文のLIMIT句の開始番号は0からなので、データの最初を0にしておく
	$start = ($page - 1) * $limit_qty;
	$start = max(0, $start);

	//カテゴリー名を取得する
	$sql = sprintf('SELECT * FROM categories WHERE id=%d', $category_id);
	$categories = mysqli_query($db, $sql) or die(mysqli_error($db));
	$category = mysqli_fetch_assoc($categories);

	//投稿を取得する
	$sql = sprintf('SELECT pl.*, u.nickname, u.upicture FROM plans pl LEFT JOIN users u ON u.id=pl.user_id WHERE pl.category_id=%d AND pl.status<>2 ORDER BY pl.created DESC LIMIT %d, %d',
					 $category_id, $start, $limit_qty);
	$plans = mysqli_query($db, $sql) or die(mysqli_error($db));

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
    <link href="assets/css/card.css" rel="stylesheet">
    <link href="assets/css/card2.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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

      	<div class="header-right btnk">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="mypage.php?user=<?php echo $user_id ?>"><strong>My Page</strong></a></li>
          </ul>
      	</div>
      </div>
	</div>
 
	<div class="container">	
		<div class="row mt centered">
			<ul class="nav nav-tabs nav-justified">
				  <li role="presentation" class="active"><a href="#"><?php echo $category['name']; ?></a></li>
				  <li role="presentation" class=""><a href="#"><?php echo $category['name']; ?></a></li>
				  <li role="presentation" class=""><a href="#">Messages</a></li>
				</ul>
			<div class="col-lg-4 col-lg-offset-4">
				<h3><?php echo $category['name']; ?>
				<hr>
			</div>
		</div>

	<div class="container">
		<div class="row">
		 	<?php
				while($plan = mysqli_fetch_assoc($plans)):
			?>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

	            <div class="card hovercard">
	                <div class="cardheader" style="background:url(assets/img/plan_img/<?php echo $plan['picture']; ?>)">

	                </div>
	                <div class="avatar">
	                    <a href="mypage.php?user=<?php echo $plan['user_id'] ?>"><img src="assets/img/user_img/<?php echo $plan['upicture']; ?> " alt="<?php echo $plan['nickname']; ?>" ></a>
	                </div>
	                <div class="info">
	                    <div class="title">
	                        <a href="chat.php?plan_id=<?php echo $plan['id']; ?>"><?php echo $plan['title']; ?></a>
	                    </div>
	                    <div class="desc">Date:<?php echo $plan['day']; ?></div>
	                    <div class="desc">Time:<?php echo $plan['time']; ?></div>
	                    <div class="desc">Where:<?php echo $plan['place']; ?></div>
	                    <div class="desc">Remark:<?php echo $plan['remark']; ?></div>
	                </div>
	            </div>

	        </div>
			<?php
				endwhile;
			?>
		</div>
	</div>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-sm-offset-4　col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center">
	  		<ul class="pagination">
			    <li>
					<?php
						if ($page > 1) {
					?>
							<a href="schedule.php?page=<?php print($page - 1); ?>" aria-label="Previous">
					        	<span aria-hidden="true">&laquo;</span>
			      			</a>
					<?php
						}else{
					?>
							<a href="#" aria-label="Previous">
					        	<span aria-hidden="true">&laquo;</span>
							</a>
					<?php
						}
					?>
			    </li>
			    <?php
			    	for ($i=0; $i < $maxPage; $i++) {
			    ?> 
			    		<li><a href="schedule.php?page=<?php echo($i + 1); ?>"><?php echo $i + 1 ?></a></li>
			    <?php
			    	}
			    ?>
			    <li>
					<?php
						if ($page < $maxPage) {
					?>
							<a href="schedule.php?page=<?php print($page + 1); ?>" aria-label="Next">
					        	<span aria-hidden="true">&raquo;</span>
					      	</a>
					<?php
						}else{
					?>
							<!-- <a href="#" aria-label="Next"> -->
					        	<span aria-hidden="true">&raquo;</span>
							<!-- </a> -->
					<?php
						}
					?>
			    </li>
			</ul>

  </body>
</html>
