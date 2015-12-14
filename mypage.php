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
    //     }
    // }
    // if (empty($error)) {
    //画面をアップロードする。date('YmdHis')のファイルをアップロードしているときの日時。例えば、20151104151539など。時間差を利用し誰のファイルかどうか区分したいため。
    //$_FILESスーパーグローバル変数
    // $image = date('YmdHis') . $_FILES['']['name'];
    //  move_uploaded_file($_FILES['image']['tmp_name'],'../member_picture/'.$image);




       if (empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location:mypage.php');
        exit();
        } 

    


}



    

    if(!empty($_POST)) {
    //登録処理をする
    $sql = sprintf('INSERT INTO plans SET category_id=%d, user_id=%d, title="%s", day=%d,time=%d,place="%s", remark="%s",created=NOW()',
    
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
    
    
    <!-- JavaScripts needed at the beginning
    ================================================== -->
    <script type="text/javascript" src="http://alvarez.is/demo/marco/assets/js/twitterFetcher_v10_min.js"></script>

    <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);
    
        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,
                
                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.6700, -73.9400), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [	{		featureType:'water',		stylers:[{color:'#74c9be'},{visibility:'on'}]	},{		featureType:'landscape',		stylers:[{color:'#f2f2f2'}]	},{		featureType:'road',		stylers:[{saturation:-100},{lightness:45}]	},{		featureType:'road.highway',		stylers:[{visibility:'simplified'}]	},{		featureType:'road.arterial',		elementType:'labels.icon',		stylers:[{visibility:'off'}]	},{		featureType:'administrative',		elementType:'labels.text.fill',		stylers:[{color:'#444444'}]	},{		featureType:'transit',		stylers:[{visibility:'off'}]	},{		featureType:'poi',		stylers:[{visibility:'off'}]	}]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using out element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
        }
    </script>
    
    
    <!-- Main Jquery & Hover Effects. Should load first -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/hover_pack.js"></script>
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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
        <li><a href="face_to_face.php"><img src="assets/img/logo.png" height=80px width=130px><i class="fas fas-logo"></i><a>
      </div>
    </div>

    <div class="navbar-collapse collapse">
      <!-- <ul class="nav navbar-nav"> -->
        <!-- <li class="hidden-sm "><a href="../">Home</a></li>
        <li class="hidden-sm">
          <a href="../whats-new/">What's New</a>
        </li>
        <li class="hidden-xs hidden-md hidden-lg">
          <a href="../whats-new/">New</a>
        </li>
        <li><a href="../get-started/">Get Started</a></li>
        <li class="dropdown-split-left"><a href="../icons/">Icons</a></li>
        <li class="dropdown dropdown-split-right hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-caret-down"></i>
          </a> -->
          <!-- <ul class="dropdown-menu pull-right">
            <li><a href="../icons/"><i class="fa fa-flag fa-fw"></i>&nbsp; All Icons</a></li>
            <li class="divider"></li>
            <li><a href="../icons/#new"><i class="fa fa-fort-awesome fa-fw"></i>&nbsp; New Icons in 4.5</a></li>
            <li><a href="../icons/#web-application"><i class="fa fa-camera-retro fa-fw"></i>&nbsp; Web Application Icons</a></li>
            <li><a href="../icons/#hand"><i class="fa fa-hand-spock-o fa-fw"></i>&nbsp; Hand Icons</a></li>
            <li><a href="../icons/#transportation"><i class="fa fa-ship fa-fw"></i>&nbsp; Transportation Icons</a></li>
            <li><a href="../icons/#gender"><i class="fa fa-venus fa-fw"></i>&nbsp; Gender Icons</a></li>
            <li><a href="../icons/#file-type"><i class="fa fa-file-image-o fa-fw"></i>&nbsp; File Type Icons</a></li>
            <li><a href="../icons/#spinner"><i class="fa fa-spinner fa-fw"></i>&nbsp; Spinner Icons</a></li>
            <li><a href="../icons/#form-control"><i class="fa fa-check-square fa-fw"></i>&nbsp; Form Control Icons</a></li>
            <li><a href="../icons/#payment"><i class="fa fa-credit-card fa-fw"></i>&nbsp; Payment Icons</a></li>
            <li><a href="../icons/#chart"><i class="fa fa-pie-chart fa-fw"></i>&nbsp; Chart Icons</a></li>
            <li><a href="../icons/#currency"><i class="fa fa-won fa-fw"></i>&nbsp; Currency Icons</a></li>
            <li><a href="../icons/#text-editor"><i class="fa fa-file-text-o fa-fw"></i>&nbsp; Text Editor Icons</a></li>
            <li><a href="../icons/#directional"><i class="fa fa-arrow-right fa-fw"></i>&nbsp; Directional Icons</a></li>
            <li><a href="../icons/#video-player"><i class="fa fa-play-circle fa-fw"></i>&nbsp; Video Player Icons</a></li>
            <li><a href="../icons/#brand"><i class="fa fa-github fa-fw"></i>&nbsp; Brand Icons</a></li>
            <li><a href="../icons/#medical"><i class="fa fa-medkit fa-fw"></i>&nbsp; Medical Icons</a></li>
          </ul> -->
        <!-- </li> -->
        <!-- <li class="dropdown-split-left"><a href="../examples/">Examples</a></li>
        <li class="dropdown dropdown-split-right hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-caret-down"></i>
          </a> -->
          <ul class="dropdown-menu pull-right">
            <li><a href="../examples/">Examples</a></li>
            <li class="divider"></li>
            <li><a href="../examples/#basic">Basic Icons</a></li>
            <li><a href="../examples/#larger">Larger Icons</a></li>
            <li><a href="../examples/#fixed-width">Fixed Width Icons</a></li>
            <li><a href="../examples/#list">List Icons</a></li>
            <li><a href="../examples/#bordered-pulled">Bordered & Pulled Icons</a></li>
            <li><a href="../examples/#animated">Animated Icons</a></li>
            <li><a href="../examples/#rotated-flipped">Rotated &amp; Flipped Icons</a></li>
            <li><a href="../examples/#stacked">Stacked Icons</a></li>
            <li><a href="../examples/#bootstrap">Bootstrap 3 Examples</a></li>
            <li><a href="../examples/#custom">Custom CSS</a></li>
          </ul>
      
        <!-- </li>
        <li class="active"><a href="../community/">Community</a></li> -->
        <!-- <li><a href="マイページのurl">マイページ</a></li>
      </ul> -->
      <div class="header-right btnk">
          <ul class="nav navbar-nav navbar-right" >
            <li><a href="schedule.php"><strong>Schedule</strong></a></li>
            <!-- <li><a href="file:///Users/ryotsukasa/Documents/web201510/Marco%20Theme/index-ichiran.html"><strong>Schedule</strong></a></li> -->
            <li><a href="profile.php"><strong>Profile</strong></a></li>
          </ul>
      </div><!-- <div class="header-right btn1"> -->
    </div>
  </div>
</div>



    <div class="col-lg-10 col-sm-10">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
                <!-- http://lorempixel.com/850/280/people/9/ -->
            </div>
            <div class="useravatar">
                <img alt="" src="http://lorempixel.com/100/100/people/9/">
            </div>
            <div class="card-info"> <span class="card-title">Pamela Anderson</span>

            </div>
        </div>
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
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Title:</label>
                  <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8');?>"/>
                  <?php if ($error['title'] == 'blank'):?>
                  <p classs="error"> *タイトルを入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Date:</label>
                  <input type="text" name="day" id="date" placeholder="2012/01/12 " class="form-control" value="<?php echo htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');?>"/>
                  <?php if ($error['day'] == 'blank'):?>
                  



                  <p classs="error"> *日付を入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">When:</label>
                  <input type="text" name="when" id="when" placeholder="example:10:00 " class="form-control" value="<?php echo htmlspecialchars($_POST['when'],ENT_QUOTES,'UTF-8');?>"/>
                  <?php if ($error['when'] == 'blank'):?>
                  <p classs="error"> *時を入力してください</p>
                  <?php endif;?>
                </div>
                
                <div class="form-group form-inline">
                  <label for="name" class="control-label">Where:</label>
                  <input type="text" name="where" id="where" placeholder="Where" class="form-control" value="<?php echo htmlspecialchars($_POST['where'],ENT_QUOTES,'UTF-8');?>"/>
                　<?php if ($error['where'] == 'blank'):?>
                  <p classs="error"> *場所を入力してください</p>
                  <?php endif;?>
                </div>

                <div class="form-group form-inline">
                  <label for="name" class="control-label">Remark:</label>
                  <input type="text" name="remark" placeholder="Purpose" class="form-control" value="<?php echo htmlspecialchars($_POST['remark'],ENT_QUOTES,'UTF-8');?>"/>
                　<?php if ($error['remark'] == 'blank'):?>
                  <p classs="error"> *目的を入力してください</p>
                  <?php endif;?>
                </div>
                
                <!-- <div class="form-group form-inline">
                  <label for="name" class="control-label">Date:</label>
                  <input type="text" name="date" id="date" placeholder="Date" class="form-control" value=
                  
                </div> -->
                <div class="form-group form-inline">
                <input type="file" name="image" size="70" value="<?php echo htmlspecialchars($_POST['photo'],ENT_QUOTES,'UTF-8');?>"/> 
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
                <div class="iine">GOOD</div>
                    
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