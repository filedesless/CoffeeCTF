<?php

require 'MyDB.php';

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>H4ck Me!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="w3.css">
</head>
<body class='w3-grey'>

<!-- navbar -->
<div class="w3-bar w3-light-grey">
	<a href="#" class="w3-bar-item w3-button w3-blue">Home</a>
	<a href="#" class="w3-bar-item w3-button" id='flag'><i class='fa fa-flag'></i> Get the flag!</a>
	<?php if ($_SESSION['loggedIn']) { ?>
	<a href="#" class="w3-bar-item w3-button w3-right" id='logout'><i class='fa fa-sign-out'></i> Logout</a>
	<a href="#" class="w3-bar-item w3-button w3-right">Welcome, <?= $_SESSION['username'] ?></a>
	<?php } else { ?>
	<a href="#" class="w3-bar-item w3-button w3-right" id='login'><i class='fa fa-sign-in'></i> Login</a>
	<?php } ?>
</div>

<!-- modal -->
<div id="modal" class="w3-modal">
<div class="w3-modal-content w3-card-4">
	<?php if ($_SESSION['loggedIn'] && $_SESSION['username'] === 'admin') { ?>
	<header class="w3-container w3-grey"> 
		<span id='close_modal' class="w3-button w3-display-topright">&times;</span>
		<h2>Here's your flag, mighty admin!</h2>
	</header>
	<div class="w3-container">
		<p>FLAG-c98f9b2a1c617a0a40e94daf6a8037b7</p>
	</div>
	<?php } else { ?>
	<header class="w3-container w3-grey"> 
		<span id='close_modal' class="w3-button w3-display-topright">&times;</span>
		<h2>Really believed it?</h2>
	</header>
	<div class="w3-container">
		<p>Of course only admin can get it...</p>
		<p>And there's no chance anyone can crack our super secure BCrypt passwords</p>
	</div>
	<?php } ?>
</div>
</div>

<!-- modal for login -->
<div id="modal_login" class="w3-modal">
<div class="w3-modal-content w3-card-4">
	<header class="w3-container w3-grey"> 
		<span id='close_modal_login' class="w3-button w3-display-topright">&times;</span>
		<h2>Please enter your credentials</h2>
	</header>
	<form class="w3-container" id='login_form'>
	<div class="w3-section">
		<div class='w3-row w3-section'>
			<div class='w3-col' style='width: 50px;'><i class='w3-xxlarge fa fa-user'></i></div>
			<div class='w3-rest'>
				<input class="w3-input w3-margin-bottom w3-sand" id='username' type="text" placeholder="Username" name="username" required>
			</div>
		</div>
		<div class='w3-row w3-section'>
			<div class='w3-col' style='width: 50px;'><i class='w3-xxlarge fa fa-key'></i></div>
			<div class='w3-rest'>
				<input class="w3-input w3-margin-bottom w3-sand" id='password' type="password" placeholder="Password" name="password" required>
			</div>
		</div>
		<div class='w3-row w3-center'>
			<button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" style='width: 60%; margin: 0 auto 1em auto;'><i class='fa fa-send'></i> Send</button>
		</div>
	</div>
	</form>
</div>
</div>

<!-- start of content -->
<div class='w3-content w3-center'>

<div class='w3-container w3-cyan w3-card-4 w3-margin-top'>
	<h2>H4ck me!</h2>
</div>

<hr />

<div class='w3-container w3-dark-grey w3-card-4 w3-round w3-margin w3-padding'>

<div class='w3-container'>
	<h4>Search for members</h4>
	<input class='w3-input w3-sand' type='text' placeholder='Filter...' id='search' autofocus>
</div>

<br />

<div class='w3-container w3-padding' id='result'>
</div>

</div>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>
<?php include 'script.js'; ?>
</script>
</html>
