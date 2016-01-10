<?php

//仮
$user_id = 1;


session_start();
date_default_timezone_set('Asia/Manila');

require('dbconnect.php');

if (!empty($_POST)){
  //エラー項目の確認している。
  if($_POST['title']==''){
      $error['title'] ='blank';
  }
    if($_POST['day']==''){
        $error['day'] ='blank';
    }else{  
      if(!preg_match('/^[0-9]{4}\/[0-9]{1,2}\/[0-9]{1,2}$/', $_POST['day'])) {
         
        }else{ 
            list($year, $momth, $day) = preg_split("/\-/", $_POST['day']);
            if(!checkdate($momth, $day, $year)){
            }
        
        }
      }
      if($_POST['time']==''){
          $error['time'] ='blank';
      }
      if($_POST['place']==''){
          $error['place'] ='blank';
      }
      if($_POST['remark']==''){
          $error['remark'] ='blank';
      }
    
      //ファイルの拡張子チェック
      // $fileName = $_FILES($_POST['picture']);
      // if(!empty($fileName)){
      //     $ext = substr($fileName, -3);
      //     if ($ext !='jpg' && $ext !='gif'&& $ext !='jpeg'&& $ext !='png'){
      //         $error['picture'] ='type';
      
      if (empty($error)) {
        //画面をアップロードする。date('YmdHis')のファイルをアップロードしているときの日時。例えば、20151104151539など。時間差を利用し誰のファイルかどうか区分したいため。
        //$_FILESスーパーグローバル変数
        $image = date('YmdHis') . $_FILES['image'];
         move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/plan_img'.$image);

         $_SESSION['join'] = $_POST;
         $_SESSION['join']['image'] = $image;
         //画面遷移。画面移動という意味。
         header('Location:mypage.php');
         exit();
      }
    } 


    if(!empty($_POST)) {
      //登録処理をする
      $sql = sprintf('INSERT INTO plans SET category_id=%d, user_id=%d, title="%s", day="%s",time=%d,place="%s", remark="%s",created=NOW()',   
      mysqli_real_escape_string($db,$_POST['category_id']),
      mysqli_real_escape_string($db,$_POST['user_id']),
      mysqli_real_escape_string($db,$_POST['title']),
      mysqli_real_escape_string($db,$_POST['day']),
      mysqli_real_escape_string($db,$_POST['time']),
      mysqli_real_escape_string($db,$_POST['place']),
      mysqli_real_escape_string($db,$_POST['remark']),
      mysqli_real_escape_string($db,$_POST['created']),
      date('Y-m-d H:i:s')
      );

      mysqli_query($db,$sql)or die(mysqli_error($db));
      header('Location: mypage.php');
      exit();
    }

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
  $sql = sprintf('SELECT COUNT(*) AS cnt FROM plans WHERE user_id=%d AND status<>2', $user_id);
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
  $sql = sprintf('SELECT pl.*, u.nickname, u.upicture FROM plans pl LEFT JOIN users u ON u.id=pl.user_id WHERE u.id=%d AND pl.status<>2 ORDER BY pl.created DESC LIMIT %d, %d',
           $user_id, $start, $limit_qty);
  $myplans = mysqli_query($db, $sql) or die(mysqli_error($db));

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

    <title>My page</title>
 
    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/mypage.css" rel="stylesheet">
    
    
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
            <li><a href="schedule.php"><strong>Schedule</strong></a></li>
            <li><a href="profile.php"><strong>Profile</strong></a></li>
          </ul>
        </div>
      </div>
  </div>
 
        <div class="row mt centered ">
            <div class="col-lg-4 col-lg-offset-4">
                <h3>Create plan</h3>
                <hr>
            </div>
        </div><!-- /row -->


 
        <div class="container">
            <form method="post" action="" class="text-center">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">learning</a></li>
                  <li><a href="#">Traveling</a></li>
                  <li><a href="#">Drinking</a></li>
                </ul>
              </div>
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Title:</label>
                  <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                  <?php if (isset($error['title']) && ($error['title'] == 'blank')):?>
                  <p classs="error"> *タイトルを入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Date:</label>
                  <input type="text" name="day" id="date" placeholder="2012/01/12 " class="form-control">
                  <?php if (isset($error['day']) && ($error['day'] == 'blank')):?>
                  <p classs="error"> *日付を入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">When:</label>
                  <input type="text" name="when" id="when" placeholder="example:10:00 " class="form-control">
                  <?php if (isset($error['when']) && ($error['when'] == 'blank')):?>
                  <p classs="error"> *時を入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Place:</label>
                  <input type="text" name="place" id="place" placeholder="place" class="form-control">
                　<?php if (isset($error['place']) && ($error['place'] == 'blank')):?>
                  <p classs="error"> *場所を入力してください</p>
                  <?php endif;?>
                </div>

                <div class="form-group form-inline">
                  <label for="name" class="control-label">Remark:</label>
                  <input type="text" name="remark" placeholder="Purpose" class="form-control">
                　<?php if (isset($error['remark']) && ($error['remark'] == 'blank')):?>
                  <p classs="error"> *目的を入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                    <input type="file" name="image" class="form-control"> 
                </div>


                <div class="pull-center">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span> Commit</button>
                </div>
            </form>
        </div>

  <div class="container">
    <div class="row">
      <?php
        while($myplan = mysqli_fetch_assoc($myplans)):
      ?>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

              <div class="card hovercard">
                  <div class="cardheader" style="background:url(assets/img/plan_img/<?php echo $myplan['picture']; ?>)">

                  </div>
                  <div class="avatar">
                      <a href="mypage.php?user=<?php echo $myplan['user_id'] ?>"><img src="assets/img/user_img/<?php echo $myplan['upicture']; ?> " alt="<?php echo $myplan['nickname']; ?>" ></a>
                  </div>
                  <div class="info">
                      <div class="title">
                          <a href="chat.php?plan_id=<?php echo $myplan['id']; ?>"><?php echo $myplan['title']; ?></a>
                      </div>
                      <div class="desc">Date:<?php echo $myplan['day']; ?></div>
                      <div class="desc">Time:<?php echo $myplan['time']; ?></div>
                      <div class="desc">Where:<?php echo $myplan['place']; ?></div>
                      <div class="desc">Remark:<?php echo $myplan['remark']; ?></div>
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
    </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina.js"></script>


  	<script>
		$(window).scroll(function() {
			$('.si').each(function(){
			var imagePos = $(this).offset().top;
	
			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});
		});
	</script>    

  </body>
</html>