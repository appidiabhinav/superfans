<html lang="en">
<head>
<style type="text/css">
   body { background: navy; }
</style>
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
		testAPI("me/photos?fields=likes.limit(1000){id,name,picture}&limit=5000&type=uploaded");
	} else if (response.status === 'not_authorized') {
		window.location = "./index.php";
	} else {
		window.location = "./index.php";
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
status     :true,
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


function testAPI(url) {


	FB.api(url, function(response) {	
			var i,user_arr={},flag_likes =0 ;
			var pics_array = response.data;
			var num_of_photos = response.data.length;
			for(i=0;i<pics_array.length;i++)
			{
				if("likes" in pics_array[i])
				{
					likes_array = pics_array[i].likes.data;	
					for(j=0;j<likes_array.length;j++)
					{
						curr_user = likes_array[j];
						if(typeof user_arr[curr_user.name] == "undefined")
						{
							user_arr[curr_user.name] = [];
							user_arr[curr_user.name][0] = 1;
							user_arr[curr_user.name][1] = curr_user.picture.data.url;
						}
						else
						{
							user_arr[curr_user.name][0] +=1;
						}

					}
				}
			}
	var html_out = [];
	var temp = [];
	for (var key in user_arr) {
		temp = [];
		if (user_arr.hasOwnProperty(key)) {
			temp.push(key);	
			temp.push(user_arr[key][0]);
			temp.push(user_arr[key][1]);
			html_out.push(temp);
		}
	}
	html_out.sort(function(a,b){
			var x = a[1];
			var y = b[1];
			return y-x;
			});
	var z = 0;
	var data_html = "";
	for(z=0;z<6&&html_out.length!=0;z++)
	{
		if (z < html_out.length)
		{
			  if(z == 0)
			   {
			           flag_likes = 1;
				   data_html += '<table class="table table-condensed" align="center" border=0px>';
				    data_html  += "<tr><td>"+"<img src="+html_out[z][2] +">"+"</td>"+"<td><strong>"+html_out[z][0]+"</strong></td></tr>"+ "<tr><td>Likes <strong>"+html_out[z][1]+"</strong> of your Pictures</td></tr>";
			   }
			  else {
			   data_html  += "<tr><td>"+"<img src="+html_out[z][2] +">"+"</td>"+"<td><strong>"+html_out[z][0]+"</strong></td></tr>"+ "<tr><td>Likes <strong>"+html_out[z][1]+"</strong> of your Pictures</td></tr>";			
			}
		}
		else
		{
			data_html += "</tr></table>";
			break;
		}
	}
	if (flag_likes == 0 && num_of_photos!=0)
{
document.getElementById('output').innerHTML += "<h3>No one Likes Your Pictures :( </h3>";
}

else if  (flag_likes == 0 && num_of_photos==0)
{
document.getElementById('output').innerHTML += "<h3>You have not Uploaded any pictures , does not matter be a Super Fan of yourself 3:)  </h3>";
}
else{
document.getElementById('output').innerHTML += data_html;
}
	document.getElementById('count').innerHTML += "<h3>You have Uploaded</h3> <h1><u>"+ num_of_photos +"</u></h1><h3>Pictures in Total </h3>";	
});
};

</script>
<div class="container-fluid">
                        <h1 align="center"><u><strong>Super Fans</strong></u></h1> 
			<hr>
             

<!--<table> <col width="200"><col width="200"><tr><th>User</th><th>No.of Pics Liked</th></tr>-->
	 <div class="row" >
	                         <div class="col-md-6" id="output" style="border-right : 1px dashed">
				                                 
				</div>
				 <div class="col-md-6" align="center" >
					<h3><u> 6 of your Super Fans </u></h3><br>
					<div id="count"> </div><br></br>

				<strong> For any queries or suggestions or bugs  </strong>:<br></br>
				
				<a href="https://plus.google.com/102569146359306213150/posts" target=_blank><img src="./images/gmail.png" width="50" height="50"></a>
				<a href="https://facebook.com/akhee13" target=_blank><img src="./images/facebook.jpg" width="50" height="50"></a><br></br>
		<!--		<a href="https://www.facebook.com/manikanta.kondeti" target=_blank><strong>INSPIRATION </strong></a><br></br>-->

                                <div class="fb-like" data-href="https://apps.facebook.com/my_superfans/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
		 <div class="fb-share-button" data-href="https://apps.facebook.com/my_superfans/" data-layout="box_count"></div>
                                         <br></br><br></br> 
                        </div>

	</div>
													 
</div>
</body>
</html>
