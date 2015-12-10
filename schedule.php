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
	      <div class="logo"><a  href="face_to_face.php"><img src="assets/img/logo.png" height=80px width=130px><i class="fas fas-logo"></i></a></div>
	    </div>

<!-- 	    <div class="navbar-collapse collapse">
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
 -->	      
	      <div class="header-right btnk">
	          <ul class="nav navbar-nav navbar-right" >
	            <li><a href="mypage.php"><strong>My Page</strong></a></li>
	            <!-- <li><a href="file:///Users/ryotsukasa/Documents/web201510/Marco%20Theme/index-ichiran.html"><strong>Schedule</strong></a></li> -->
	          </ul>
	      </div><!-- <div class="header-right btn1"> -->
	    </div>
	  </div>
	</div>
 
	<div class="container">	

		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h3>Learning English</h3>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<span class="kikaku1" href="#">
					<div class="b-wrapper">
					  	<h4><a href="#"> Schedule１</a></h4>
					  	<p>Date:</p>
					  	<p>When:</p>
					  	<p>Where:</p>
					  	<p>Purpose:</p>
					  	<p>Remark:</p>
					</div>
				</span>
<!-- 				<a href="#" class="btn kikakusya">Entrance for planner</a>
				<a href="#" class="btn sannkasya">Entrance for participant</a>
 -->			<hr-d>
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
				
			</div><!-- col-lg-4 -->
		</div><!-- /row mt-3 -->
	</div><!-- /container -->


		<div class="next">
			 	<a href="">次へ</a>
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
