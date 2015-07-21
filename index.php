<!DOCTYPE html>
<html lang="en">
<head>
<script>
</script>
<title>Super Fans</title>
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
