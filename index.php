
<?php 
	session_start();
	require 'login.php';
	require 'send.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send love with Twitter</title>
	<link href="https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Fresca" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendor/zurb/foundation/dist/css/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
	<header class="row">
		<h1>Send l<span>&#x2764;</span>ve with <img src="https://www.oceancouncil.org/wp-content/themes/maxcanvas_child/img/logo_twitter_withbird_1000_allblue_png_scaled1000_zps565a5709.png" alt="twitter"></img></h1>
	</header>
	<div class="row">
		<?php 
			if(isset($url)) {
			?>
				<p class="text-center"><a href="<?= $url?>" class="button hollow">Login with Twitter</a></p>
			<?php
			} else {
			?>		
				<form action="" method='get'>
					<div class="row">
					    <div class="small-3 columns">
					      <label for="to" class="text-right middle">Send love to:</label>
					    </div>
					    <div class="small-6 columns">
					      <input type="text" id="to" placeholder="@name" name=to>
					    </div>
					    <div class="small-3 columns">
					      <input type="submit" class="button" value="Send">
					    </div>
					</div>
				</form>
				<div class="row">
					<div class="medium-10 medium-centered columns">
					<p>Or select a friend</p>
					<ul class="no-bullet">
			<?php
				
				foreach ($friends->users as $key => $value) {
				?>
					<li class="float-left">
						<a href="?to=@<?=$value->screen_name; ?>">
							<img src="<?= $value->profile_image_url; ?>" alt="profile image">
						</a>
					</li>
				<?php
				}
				?>
						
					</ul>
					</div>
				</div>
			<?php
			}
		?>
	</div>	
</body>
</html>