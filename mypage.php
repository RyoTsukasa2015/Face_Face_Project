<?php
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

  //投稿を取得する
  $sql = sprintf('SELECT pl.*, u.nickname, u.upicture FROM plans pl LEFT JOIN users u ON u.id=pl.user_id WHERE u.id=%d AND pl.status<>2 ORDER BY pl.created DESC LIMIT %d, %d',
           $category_id, $start, $limit_qty);
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

<!--     <div class="col-lg-10 col-sm-10">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
 -->                <!-- http://lorempixel.com/850/280/people/9/ -->
<!--             </div>
            <div class="useravatar">
                <img alt="" src="http://lorempixel.com/100/100/people/9/">
            </div>
            <div class="card-info"> <span class="card-title">Pamela Anderson</span>

            </div>
        </div> -->
<!--         <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <div class="hidden-xs">Stars</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    <div class="hidden-xs">Favorites</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <div class="hidden-xs">Following</div>
                </button>
            </div>
        </div>  -->   
 
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

        <div class="row mt centered ">
            <div class="col-lg-4 col-lg-offset-4">
                <h3>Your history</h3>
                <hr>
            </div>
        </div><!-- /row -->

        <div class="row mt">
            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku1" href="#">
                <div class="b-wrapper">
                    <h4>Schedule１</h4>
                    <p>Date:</p>
                    <p>When:</p>
                    <p>Where:</p>
                    <p>Purpose:</p>
                    <p>How many: Min〜Max</p>
                </div>
                </span>
                <a href="#" class="btn kikakusya">Entrance for planner</a>
                <a href="#" class="btn sannkasya">Entrance for participant</a>
                <hr-d>
                
                    
            </div><!-- col-lg-4 -->
                
            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku2" >
                    <div class="b-wrapper">
                        <h4>企画案2</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku3" >
                    <div class="b-wrapper">
                        <h4>企画案3</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->
        </div><!-- /row mt -->

        <div class="row mt-2">
            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku4" href="#">
                    <div class="b-wrapper">
                        <h4>企画案4</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku5" href="#">
                    <div class="b-wrapper">
                        <h4>企画案5</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>

                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku6" href="#">
                    <div class="b-wrapper">
                        <h4>企画案6</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->
        </div><!-- /row mt-2 -->

        <div class="row mt-3">
            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku7" href="#">
                    <div class="b-wrapper">
                        <h4>企画案7</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku8" href="#">
                    <div class="b-wrapper">
                        <h4>企画案8</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->

            <div class="col-lg-4 col-md-4 col-xs-12 desc">
                <span class="kikaku9" href="#">
                    <div class="b-wrapper">
                        <h4>企画案9</h4>
                        <p>日付</p>
                        <p>時間</p>
                        <p>場所</p>
                        <p>目的</p>
                        <p>最小〜最大人数</p>
                    </div>
                </span>
                <a href="#" class="btn kikakusya">企画者用入口</a>
                <a href="#" class="btn sannkasya">参加者用入口</a>
                <hr-d>
                <div class="iine">GOOD</div>
            </div><!-- col-lg-4 -->
        </div><!-- /row mt-3 -->
    </div><!-- /container -->
    </div>
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
        <!--  <li><a href="http://phil-portal.com/business/" class="white">ビジネス</a></li>
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