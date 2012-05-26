<?php header("HTTP/1.1 404 Not Found"); ?>
<html>
<head>
<title>404 Page Not Found</title>
<style type="text/css">

body {
background-color:	#fff;
margin:				40px;
font-family:		Lucida Grande, Verdana, Sans-serif;
font-size:			12px;
color:				#000;
}

#content  {
border:				#999 1px solid;
background-color:	#EEFFEE;
padding:			20px 20px 12px 20px;
}

h1 {
font-weight:		normal;
font-size:			14px;
color:				#6600CC;
margin: 			0 0 4px 0;
}

#logo h1{
	text-align: center;
	font-size:			22px;
	color:				#6600CC;
}
</style>
</head>
<body>
	<div id="logo"> <h1> CoasterQ </h1> </div>
	
	<div id="content">
		<h1>Page Not Found</h1>
		<?php echo $message; ?>
		<script type="text/javascript">
		  var GOOG_FIXURL_LANG = 'en';
		  var GOOG_FIXURL_SITE = 'http://www.coasterq.com/';
		</script>
		<script type="text/javascript" 
		    src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>
	</div>
	
	<div id='footer' > 
	
	<p align = "center">
		<a href = "/" >Home</a>
		|
		<a href = "/sitemap.html">Site Map</a>
		|
		<a href = "/termsofuse.html">Terms of Use</a>
		|
		<a href = "/help.html"> Help Guide</a>
		|
		<a href = "mailto: support@coasterq.com">Contact Us</a>
	</p>
		<div align='center'><address>&copy; 2009 CoasterQ</address></div>
	</div>
</body>
</html>