<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Face to Face</title>

    <link href="assets/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/colors/color-74c9be.css" rel="stylesheet">    
    <link href="assets/css/animations.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/top.css" rel="stylesheet">
    
    
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
    
  </head>

  <body>


    <div class="navbar navbar-inverse navbar-static-top hidden-print">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="fa fa-bars fa-lg"></i>
          </button>
          <div class="logo" href="index.top画面" ><img src="assets/img/logo.png" style="height:70px;"><i class="fas fas-logo"></i></div>
        </div>

        <div class="navbar-collapse collapse">
          <div class="header-right btnk">
              <ul class="nav navbar-nav navbar-right" >
                <li><a href="login.php"><strong>Login</strong></a></li>
                <li><a href="mypage.php"><strong>My Page</strong></a></li>
              </ul>
          </div><!-- <div class="header-right btn1"> -->
        </div>
      </div>
    </div>

    <div id="headerwrap">
    	<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2 mt">
					<h1 class="animation slideDown">Face × Face</h1>
    				<!-- <p class="mt"><button type="button" class="btn btn-cta btn-lg">LEARN MORE</button></p> -->
				</div>
				
			</div><!-- /row -->
    	</div><!-- /container -->
    </div> <!-- /headerwrap -->

	<div class="container">	
		<div class="row mt centered ">
			<div class="col-lg-4 col-lg-offset-4">
				<h3>What do you want?</h3>
				<hr>
			</div>
		</div><!-- /row -->

		<div class="row mt">
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="schedule.php?cat_id=1"><img width="323" src="assets/img/portfolio/0007.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Post 1</h4>
					  	<p class="b-from-right b-animate b-delay03">Read More.</p>
					</div>
				</a>
				<div class="learning">Learning</div>
				<p class="lead"></p>
				<hr-d>
				<!-- <p class="time"><i class="fa fa-comment-o"></i> 3 | <i class="fa fa-calendar"></i> 14 Nov.</p> -->
			</div><!-- col-lg-4 -->
			
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="schedule.php?cat_id=2"><img width="323" src="assets/img/portfolio/008.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Post 2</h4>
					  	<p class="b-from-right b-animate b-delay03">Read More.</p>
					</div>
				</a>
				<div class="travel">Travel</div>
				<p class="lead"><!-- Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. --></p>
				<hr-d>
				<!-- <p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.</p> -->
			</div><!-- col-lg-4 -->
			
			<div class="col-lg-4 col-md-4 col-xs-12 desc">
				<a class="b-link-fade b-animate-go" href="schedule.php?cat_id=3"><img width="324" height="242" src="assets/img/portfolio/0006.jpg" alt="" />
					<div class="b-wrapper">
					  	<h4 class="b-from-left b-animate b-delay03">Post 3</h4>
					  	<p class="b-from-right b-animate b-delay03">Read More.</p>
					</div>
				</a>
				<div class="drinking">Drinking</div>
				<p class="lead"><!-- Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. --></p>
				<hr-d>
				<!-- <p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.</p> -->
			</div><!-- col-lg-4 -->
			
		</div><!-- /row -->
	</div><!-- /container -->
	
    <div class="container-fluid bg-gray no-space sp-none padding-top40">

	<div id="carousel-example-generic" class="carousel slide top10" data-ride="carousel">

		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="max-width" src="http://phil-portal.com/wp-content/themes/phil-portal/images/top_bottom_01.jpg" alt="...">
				<div class="carousel-caption">
					Pure experience for you in the Philippines!
				</div>
			</div>
			<div class="item">
				<img class="max-width" src="http://phil-portal.com/wp-content/themes/phil-portal/images/top_bottom_02.jpg" alt="...">
				<div class="carousel-caption">
					Pure experience for you in the Philippines!
				</div>
			</div>
			<div class="item">
				<img class="max-width" src="http://phil-portal.com/wp-content/themes/phil-portal/images/top_bottom_03.jpg" alt="...">
				<div class="carousel-caption">
					Pure experience for you in the Philippines!
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

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

	<p class="foot-text text-center top30 white"> 2015.Face×Fece  All Rights Reserved.</p>
</footer>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- <script src="http://phil-portal.com/wp-content/themes/phil-portal/js/jquery.lazyload.min.js"></script> -->
<script type="text/javascript" src="http://lab.veno.it/venobox/venobox/venobox.min.js" ></script>
<script src="http://phil-portal.com/wp-content/themes/phil-portal/js/pushy.min.js" async></script>
<script src="http://phil-portal.com/wp-content/themes/phil-portal/js/owl.carousel.js"></script>

<script src="http://phil-portal.com/wp-content/themes/phil-portal/js/myscript.js"></script>


<!-- Googleリマーケ -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 994613319;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/994613319/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


<!-- Yahooリマーケ -->
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
var yahoo_retargeting_id = '7UXTL9OMH2';
var yahoo_retargeting_label = '';
/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>

<!-- FBリマーケ -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '807682332636478']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=807682332636478&amp;ev=PixelInitialized" /></noscript>

  </body>
</html>
