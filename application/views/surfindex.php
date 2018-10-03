<html>
<head>
	<title>SURF.az</title>
       <link href="<?php echo base_url();?>styles/stylesurfaz.css" type="text/css" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

</head>
<body>

<h1>Surf internet by your interests</h1>


<div id="content" class="container-fluid">
<div class="signup_wrap">
<div class="signin_form">
 <?php echo form_open("site/login"); ?>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email" value="" />
  <label for="password">Password:</label>
  <input type="password" id="pass" name="pass" value="" />
  <input type="submit" class="btn btn-primary" value="Sign in" />
 <?php echo form_close(); ?>
</div><!--<div class="signin_form">-->
</div><!--<div class="signup_wrap">-->

</div><!--<div id="content">-->
<div id="foot">
    <p>developed by SHIKHIYEV </p>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>