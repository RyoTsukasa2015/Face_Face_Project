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
	$limit_qty = 8;
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
	$sql = sprintf('SELECT * FROM plans WHERE category_id=%d AND status<>2 ORDER BY created DESC LIMIT %d, %d',
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
		    	<a href="face_to_face.php"><img src="assets/img/logo.png" height=80px width=130px><i class="fas fas-logo"></i></a>
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
			<div class="col-lg-4 col-lg-offset-4">
				<h3><?php echo $category['name']; ?>
				<hr>
			</div>
		</div>

	 	<?php
			// while($plan = mysqli_fetch_assoc($plans)):
		?>
<!-- 		<div class="row mt">
			<div class="col-lg-3 col-md-3 col-xs-12"> -->
				<!-- <span class="kikaku1"><a href="chat.php?plan_id=<?php //echo $plan['id']; ?>"> -->
					<!--<div class="b-wrapper"> 
					  	<h4><?php //echo $plan['title']; ?></h4>
					  	<p>Date:<?php //echo $plan['day']; ?></p>
					  	<p>Time:<?php //echo $plan['time']; ?></p>
					  	<p>Where:<?php //echo $plan['place']; ?></p>
					  	<p>Remark:<?php //echo $plan['remark']; ?></p>
					</div>
				</span></a>
				<hr-d>
			</div><!-- col-lg-4 -->
		<?php
			//endwhile;
		?>
		<!-- </div>/container -->

<!-- <!-- カード案１ -->
<!--     <div class="container" id="tourpackages-carousel">
      <div class="row">
        <div class="col-lg-12"><h1>My Card <a class="btn icon-btn btn-primary pull-right" href="#"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Add New Card</a></h1></div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnail">
              <div class="caption">
                <div class='col-lg-12'>
                    <span class="glyphicon glyphicon-credit-card"></span>
                    <span class="glyphicon glyphicon-trash pull-right text-primary"></span>
                </div>
                <div class='col-lg-12 well well-add-card'>
                    <h4>John Deo Mobilel</h4>
                </div>
                <div class='col-lg-12'>
                    <p>4111xxxxxxxx3265</p>
                    <p class"text-muted">Exp: 12-08</p>
                </div>
                <button type="button" class="btn btn-primary btn-xs btn-update btn-add-card">Update</button>
                <button type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Vrify Now</button>
                <span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
            </div>
          </div>
        </div>
 --><!-- カード案１ -->

<!-- カード案２ -->
<div class="container">
	<div class="row">
	 	<?php
			while($plan = mysqli_fetch_assoc($plans)):
		?>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <a href="mypage.php?user=<?php echo $plan['user_id'] ?>"><img alt="" src="http://lorempixel.com/100/100/people/9/"></a>
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
<!-- カード案２ -->

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
<!-- 			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li> -->
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
