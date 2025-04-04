<?php
	$title = "";
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
				$surname = $_POST['surname'];	
				$contact = $_POST['contact'];
			}
			//$visitor_email = $_POST['email'];
			//$message = $_POST['message'];

			$email_from = 'kgaugelo.molema@firstrand.co.za';

			$email_subject = "RSVP - $name $surname";

			$email_body = "Invitation ";
			if (isset($_POST['btnaccept']))
				$email_body .= "Accepted by:\n";
			if (isset($_POST['btnregret']))
				$email_body .= "Regreted by:\n";
			$email_body .= "$name $surname\n$contact\n";
									
			$to = "kmolema@gmail.com";

			$headers = "From: $email_from \r\n";
		  
			$headers .= "Reply-To: kgaugelo.molema@firstrand.co.za \r\n";
		  
			if (isset($_POST['name']))
				mail($to,$email_subject,$email_body,$headers);
			$title = "**Thank you for your response**";
		}
?>
<head>
	<style>
		html, body {
		height: 100%;
		width: 100%;
		margin: 0;
		padding: 0;
		background-color: #BDC3C7;
		font-family: 'Raleway';
		}
		.top {
		  background-color: #264356;
		  height: 200px;
		  margin:0;
		  padding:0;
		  box-shadow: 2px 2px 4px rgb(0, 0, 0, .25);
		}

		.form {
		  height: 640px;
		  width: 400px;
		  background-color: #fff;
		  margin: -110px auto;
		  border-radius: 10px;
		  color: #666;
		  padding: 0px 0px;
		  box-shadow: 2px 2px 4px rgb(0, 0, 0, .25);
		}

		.info {
		  padding: 10px;
		}

		h1, h2, p {
		  text-align: center;
		  padding: 0px;
		  margin: 5px 5px;
		}

		h2 {
		  font-family: 'Great Vibes', cursive;
		  font-weight: 100;
		}

		p.line {
		  margin: 0px auto 20px auto;
		  color: #999;
		}

		.form input {
		  font-size: 15px;
		  color: #666;
		  padding: 6px;
		  margin: 25px auto 20px;
		  display: block;
		  width: 75%;  
		}

		input:focus {
		  outline: 0;
		}

		.button button {
		  display: inline-block;
		  width: 400px;
		}
		
		button {
		  color: #666;
		  background-color: #ffbdc7;
		  border: none;
		  font-family: 'Raleway';
		  font-size: 18px;
		  font-weight: 600;
		  padding: 15px 32px;
		  width: 200px;
		  margin: 20px auto 0px auto; 
		  float: left;
		}

		button.accept			
		{
		  border-radius: 0px 0px 0px 10px;
		  border-right: solid 1px #cc919a;
		}

		button.regret {
		  border-radius: 0px 0px 10px 0px;
		}

		button:hover {
		  background-color: #cc919a;
		  transition: .5s;
		}

		button:focus {
		  outline: 0;
		}
		
		#title { 
			text-align: center; 
			height: 100%;
			padding-top: 50%;
			font-weight: bolder;
			font-size: larger;
		}
	</style>
	<link rel="shortcut icon" href="../img/lcs_logo_tiny.png">
</head>
<body>
  <div class="top">
  </div>
  <div id="rsvp" class="form">
	<form method="post" action="index.php">
      <div class ="info">
		<?php 
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				echo "<div id='title'>$title</div>"; 
				//echo $_SERVER['REQUEST_METHOD'];
				exit; 
			}
		?>
		<h1>RSVP</h1>
		<h2>Software Development</h2>
		<h1>Workshop</h1>
		<p class= "line">________________________________________</p>
		<h2>Thursday, February 27, 2020</h2>
		<!--<p>Thursday, February 27, 2020</p>-->
		<p>4:00 PM to 6:00 PM</p>
		<br>
		<h2>4 Merchant Place</h2>
		<p>2nd Floor Limpopo</p>
		<p>Please RSVP by Thursday, 20 February</p>
		<p class= "line">________________________________________</p>
			<input required name="name" type="text" placeholder="Name">
			<input required name="surname" type="text" placeholder="Surname">
			<input required name="contact" type="telephone" placeholder="Contact Number">
			<!--<input type="number" placeholder="# of Guests">-->
	  </div>
	  <button name="btnaccept" class="accept">Accept</button>
	  <button name="btnregret" class="regret">Regret</button>
	</form>
  </div>
</body>