<?php 	
define('ARTIST', 'Mr. Scruff');
define('API_KEY', 'xxxx');
include_once 'Similar.php';
include_once 'Venue.php';

//setup variables
$venue = new Venue();
$similarArtists = new Similar();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes">
	<title><?php echo ARTIST ?> - Dynamic Event Poster</title>
	<link rel="stylesheet" href="reset.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="aestheti.css" type="text/css" />
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body onload="initialise()">
	<img src="bg.jpg" alt="Picture of <?php echo ARTIST ?>">
	<h1><?php echo ARTIST ?></h1>

	<section class="med-detail left">
		<p>On <?php 
		echo substr($venue->getEventTime(), 0, -3);
		?>, <?php echo ARTIST ?> will be playing here:</p>
		
		<div id="map_canvas"></div>
		<p>Location:</p>
		<address id="address"><?php
				echo $venue->getVenueName();
				echo ', ';
				echo $venue->getVenueStreet();
				echo ', ';
				echo $venue->getVenueCity();
				echo ', ';
				echo $venue->getVenueCountry();
			?>
		</address>
		
		<p>Befriend the <?php echo $venue->getAttendees(); ?> others going and join us.</p>
	</section>
	
	<section class="med-detail right">
		<?php if ($venue->getEventInfo() != false) { ?>
			<div>
				<h3>Info:</h3>
				<p>
				<?php 
					echo $venue->getEventInfo();
				?>
				</p>
			</div>
		<?php } ?>
		<h3>Come if you like:</h3>
		<?php 
			$similarArtists->getSimilarArtists();
		?>
	</section>
	
	<section class="bottom med-detail">
		<!-- photo copyright -->
		Photo &copy; <a href="http://www.bigchill.net/news/2010/08/saturday-mr-scruff-on-the-revellers-stage/">The Big Chill</a>, 2010.
	</section>
	<script src="map.js"></script>
</body>
</html>