<?php
	session_start();
	require('dbconnect.php');

	$_POST['categories']=2;
	$category_id=$_POST['categories'];

	//ページング
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	//1ページに表示する件数を決める。
	$limit_qty = 5;
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

	//投稿を取得する
	$sql = sprintf('SELECT * FROM plans WHERE category_id=%d AND status<>2 ORDER BY created DESC LIMIT %d, %d', $_POST['categories'], $start, $limit_qty);
	$plans = mysqli_query($db, $sql) or die(mysqli_error($db));

	//カテゴリー名を取得する
	$sql = sprintf('SELECT * FROM categories WHERE id=%d', $category_id);
	$categories = mysqli_query($db, $sql) or die(mysqli_error($db));
	$category = mysqli_fetch_assoc($categories);

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
				<h3><?php echo $category['name']; ?></h3>
				<hr>
			</div>
		</div>

	 	<?php
			while($plan = mysqli_fetch_assoc($plans)):
		?>
		<div class="row mt">
			<div class="col-lg-3 col-md-3 col-xs-12">
				<span class="kikaku1"><a href="chat.php?plan_id=<?php echo $plan['id']; ?>">
					<div class="b-wrapper">
					  	<h4><?php echo $plan['title']; ?></h4>
					  	<p>Date:<?php echo $plan['day']; ?></p>
					  	<p>Time:<?php echo $plan['time']; ?></p>
					  	<p>Where:<?php echo $plan['place']; ?></p>
					  	<p>Remark:<?php echo $plan['remark']; ?></p>
					</div>
				</span></a>
				<hr-d>
			</div><!-- col-lg-4 -->
		<?php
			endwhile;
		?>
		</div><!-- /container -->


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
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
		<?php
			if ($page > 1) {
		?>
				<a href="schedule.php?page=<?php print($page + 1); ?>" aria-label="Next">
		        	<span aria-hidden="true">&raquo;</span>
		      	</a>
		<?php
			}else{
		?>
				<a href="#" aria-label="Next">
		        	<span aria-hidden="true">&laquo;</span>
				</a>
		<?php
			}
		?>
    </li>
  </ul>

  </body>
</html>
