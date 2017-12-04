<?php // FLAG-5e10e3f89f64be403c7867960a5db8c5 ?>
<!DOCTYPE html>
<html>
<head>
	<title>H4ck Me!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="w3.css">
</head>
<body class='w3-grey'>

<!-- modal -->
<div id="modal" class="w3-modal">
<div class="w3-modal-content w3-card-4">
	<header class="w3-container w3-grey"> 
		<span id='close_modal' class="w3-button w3-display-topright">&times;</span>
		<h2>Really believed it?</h2>
	</header>
	<div class="w3-container">
		<p>It's waiting for you in the php source code.</p>
		<p>Where you'll never find it.</p>
	</div>
</div>
</div>

<!-- navbar -->
<div class="w3-bar w3-light-grey">
	<a href="#" class="w3-bar-item w3-button w3-blue">Home</a>
	<a href="#" class="w3-bar-item w3-button" id='flag'><i class='fa fa-flag'></i> Get the flag!</a>
	<a href="showsource.php" class="w3-bar-item w3-button w3-right"><i class='fa fa-code'></i> Show source</a>
</div>

<!-- start of content -->
<div class='w3-content w3-center'>

<div class='w3-container w3-cyan w3-card-4 w3-margin-top'>
	<h2>H4ck me!</h2>
</div>

<hr />

<div class='w3-container w3-dark-grey w3-card-4 w3-round w3-margin w3-padding'>

<div class='w3-container'>
	<h4>Free nmap service</h4>
	<input class='w3-input w3-sand' type='text' placeholder='Enter target IP' id='nmap' autofocus>
</div>

<br />

<div class='w3-container w3-padding' id='result'>
</div>

</div>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
<?php include 'script.js'; ?> </script> </html>
