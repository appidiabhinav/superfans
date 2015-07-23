<!DOCTYPE html>
<html lang="en">
<head>
<script>
</script>
<title>SuperFans</title>
<meta property="og:image"content="https://superfans25.herokuapp.com/images/fan1s.png" />
<meta property="og:title" content="SuperFans" />
<meta property="og:description" content="App which shows The People who liked your pictures most" />
<meta property="fb:app_id" content="411454985723973" />
<meta property="og:url" content="https://apps.facebook.com/my_superfans/" />
<meta property="og:site_name" content="SuperFans" />
<meta property="og:locale" content="en_US" />
<!-- <meta property="og:locale:alternate" content="fr_FR" />
  <meta property="og:locale:alternate" content="es_ES" />
-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/normalize.css">
<script src="./js/jquery.min.js"></script>
 <script src="./js/bootstrap.min.js"></script>
</head>
<body >
<div id="fb-root"></div>
<script>

function statusChangeCallback(response) {
		if (response.status === 'connected') {
				window.location = "./result.php";
	} else
	{
		FB.login(function(){ window.location = "./result.php" }, {scope: 'public_profile,user_photos'})
	}	
}
function checkLoginState() {
	FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
			});
}
window.fbAsyncInit = function() {
	FB.init({
appId      : '411454985723973',
cookie     : true,  
status : true,
kidDirectedSite: false,
xfbml      : true, 
version    : 'v2.4' 
});
FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
		});
};
// Load the SDK asynchronously
(function(d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<div  class="container-fluid" id="start">

</div>
</body>
</html>
