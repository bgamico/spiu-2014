<div class="container-fluid" id="main">
  <div class="row">
      <h2>Sedes</h2>
  	<div class="col-md-7" id="left">
    
      <?php foreach($datos as $marker_sidebar)
		        {?>
				  <div class="panel panel-default">
			        <div class="panel-heading" onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><a><?=substr($marker_sidebar->nombre,0)?></a></div>
			      </div>
			      <p>
			      	<?=$marker_sidebar->descripcion?>
			      </p>
			      <p>
			      	<?= anchor('home/pdi/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/images.jpg').'>', array('class'=>'view')); ?>
			      	<?= anchor('home/aviso/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/avisoo.jpg').'>', array('class'=>'view')); ?>
					<?= anchor('home/actividad/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/actividad.jpg').'>', array('class'=>'view')); ?>
					<?= anchor('home/examen/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/fechas_examen.png').'>', array('class'=>'view')); ?>  
			      </p>
			      
			      <hr>				  				  
				  			  
				  <?php
		        }
		        ?>

    </div>
    
    <div class="col-md-5 hidden-xs" >
    	<?=$map['js']?>
		<?=$map['html']?>
    </div>
    
  <section class="container">
			<h1 class="titulo">TWEETS</h1>
				
			<article id='tweets' class="tweets"></article>
		</section>
  </div>
</div>
<!-- end template -->

<!-- 		<script src="js/scripts.js"></script> -->
		<script type="text/javascript">
		    function datos_marker(lat, lng, marker)
		    {
			     var mi_marker = new google.maps.LatLng(lat, lng);
			     map.panTo(mi_marker);
			     google.maps.event.trigger(marker, 'click');
		    }
	    </script>
	    
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

				getTwitter("UNRIONEGRO");

			function setTweet() {
			    var tweet = 'BlahBlah';
			    twitter.__call("statuses_update", {
			        "status" : tweet
			    }, function(reply) {
			        if (reply.httpstatus == 200) {
			            alert("Tweet sent!");
			            twitterBtn.setBackgroundImage('twitterShare_blue.png');
			        } else {
			            alert(reply.errors);
			        }
			    });
			}

			function getTwitter(username){
				var params = {
							    screen_name: username,
							    count: '4'
							 };
			
				twitter.__call('statuses_userTimeline',params,
					    function (reply) {
					        console.log(reply);
							var tweetsQ=document.getElementsByClassName('tweet');
							var i=tweetsQ.length;
							while(i--){
								document.getElementById('tweets').removeChild(tweetsQ[i]);
							}
					        for (var i = 0; i < reply.length; i++) {
					        	var spanName= document.createElement('span');
								spanName.className='name';
								spanName.appendChild(document.createTextNode(reply[i].user.name));

								var spanUsername= document.createElement('span');
								spanUsername.className='username';
								spanUsername.appendChild(document.createTextNode(reply[i].user.screen_name));

								var spanDate= document.createElement('span');
								spanDate.className='date';
								spanDate.appendChild(document.createTextNode(reply[i].created_at.substring(0, (reply[1].created_at).length - 5)));

								var pUser= document.createElement('p');
								pUser.className='usuario';
								pUser.appendChild(spanName);
								pUser.appendChild(spanUsername);
								pUser.appendChild(spanDate);

								var pText= document.createElement('p');
								pText.className='texto';
								pText.appendChild(document.createTextNode(reply[i].text));

								var divInfo= document.createElement('div');
								divInfo.className='usr';
								divInfo.appendChild(pUser);
								divInfo.appendChild(pText);

								var imagen= document.createElement('img');
								imagen.setAttribute("src", reply[i].user.profile_image_url);
								imagen.className='img';

								var hr=document.createElement('hr');
								hr.className="separador";

								var tweet= document.createElement('div');
								tweet.className='tweet';
								tweet.appendChild(imagen);
								tweet.appendChild(divInfo);
								tweet.appendChild(hr);

								document.getElementById("tweets").appendChild(tweet);

					        };
					        
					    }
				);
			}
		})
		</script>