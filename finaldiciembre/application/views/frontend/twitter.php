		<meta charset="UTF-8">
		<link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url('assets/js/sha1.js')?>"></script>
		<script src="<?php echo base_url('assets/js/codebird.js')?>"></script>
		
		<title>Tweets</title>

		<script type="text/javascript">
			$(document).ready(function(){
				var consumer_key = '7hN5NJ0hjpiGB0GHarzpuMhPh';
				var consumer_secret = 'AuSACdSk3RVnGLZJkQ8fYRLuZuwz0dJnE0t5E0Y65BgJXEw2Ik';
				var acces_token = '2900510723-lXdCwRl1wvcepkFOAexZC5Ae18pmUAEqpW9nT8k';
				var acces_token_secret = '2yp7Hmkxt0zOuqfKgsC2JqlWA7q1bRdSfpp7hZ8dxCRQM';

				
				var twitter = new Codebird;
				twitter.setConsumerKey(consumer_key, consumer_secret);
				twitter.setToken(acces_token, acces_token_secret);

				twitter.__call(
					    'statuses_update',
					    {'status': 'Whohoo, I just tweeted!'},
					    function (reply) {
					        // ...
					    }
					);
				
				//getTwitter("UNRIONEGRO");
				
				
				
// 			function getTwitter(username){
// 				var params = {
// 							    screen_name: username,
// 							    count: '4'
// 							 };
			
// 				twitter.__call('statuses_userTimeline',params,
// 					    function (reply) {
// 					        console.log(reply);
// 							var tweetsQ=document.getElementsByClassName('tweet');
// 							var i=tweetsQ.length;
// 							while(i--){
// 								document.getElementById('tweets').removeChild(tweetsQ[i]);
// 							}
// 					        for (var i = 0; i < reply.length; i++) {
// 					        	var spanName= document.createElement('span');
// 								spanName.className='name';
// 								spanName.appendChild(document.createTextNode(reply[i].user.name));

// 								var spanUsername= document.createElement('span');
// 								spanUsername.className='username';
// 								spanUsername.appendChild(document.createTextNode(reply[i].user.screen_name));

// 								var spanDate= document.createElement('span');
// 								spanDate.className='date';
// 								spanDate.appendChild(document.createTextNode(reply[i].created_at.substring(0, (reply[1].created_at).length - 5)));

// 								var pUser= document.createElement('p');
// 								pUser.className='usuario';
// 								pUser.appendChild(spanName);
// 								pUser.appendChild(spanUsername);
// 								pUser.appendChild(spanDate);

// 								var pText= document.createElement('p');
// 								pText.className='texto';
// 								pText.appendChild(document.createTextNode(reply[i].text));

// 								var divInfo= document.createElement('div');
// 								divInfo.className='usr';
// 								divInfo.appendChild(pUser);
// 								divInfo.appendChild(pText);

// 								var imagen= document.createElement('img');
// 								imagen.setAttribute("src", reply[i].user.profile_image_url);
// 								imagen.className='img';

// 								var hr=document.createElement('hr');
// 								hr.className="separador";

// 								var tweet= document.createElement('div');
// 								tweet.className='tweet';
// 								tweet.appendChild(imagen);
// 								tweet.appendChild(divInfo);
// 								tweet.appendChild(hr);

// 								document.getElementById("tweets").appendChild(tweet);

// 					        };
					        
// 					    }
// 				);
// 			}
// 		})
		</script>

		<section class="container">
			<h1 class="titulo">TWEETS</h1>
				
			<article id='tweets' class="tweets"></article>
		</section>
		
		<button class="btn btn-default" id="tweet">Probar publicar</button>
	