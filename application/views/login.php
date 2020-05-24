<!DOCTYPE html> <!-- otvorenie dokumentu -->
<html lang="sk-SK"> <!-- zadefinovaný jazyk na slovenčinu -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- zadefinovanie responzívneho dizajnu -->
	<title>Football tables - Admin </title> <!-- názov stránky -->
</head>


<style>

	.body{
		position: fixed;
		overflow-y: scroll;
		width: 100%;
		top: -20px;
		left: -20px;
		right: -40px;
		bottom: -40px;
		width: auto;
		height: auto;
		background-image: linear-gradient(to right top, #8e44ad 0%, #3498db 100%);
		background-size: cover;
		-webkit-filter: blur(0px);

	}

	.header{
		position: absolute;
		top: calc(50% - 35px);
		left: calc(40% - 255px);

	}

	.header div{
		float: left;
		color: #fff;
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 45px;
		font-weight: 200;
	}

	.header div span{
		color:#ff0000 !important;
	}

	.login{
		position: absolute;
		top: calc(50% - 75px);
		left: calc(50% - 50px);
		height: 150px;
		width: 350px;
		padding: 10px;

	}

	.login input[type=text]{
		width: 250px;
		height: 30px;
		background: transparent;
		border: 1px solid red;
		border-radius: 2px;
		color: #fff;
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
	}

	.login input[type=password]{
		width: 250px;
		height: 30px;
		background: transparent;
		border: 1px solid red;
		border-radius: 2px;
		color: #fff;
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 10px;
	}

	.login input[type=button]{
		width: 260px;
		height: 35px;
		background: #fff;
		border: 1px solid red;
		cursor: pointer;
		border-radius: 2px;
		color: red;
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 16px;
		font-weight: 400;
		padding: 6px;
		margin-top: 10px;
	}

	.login input[type=button]:hover{
		opacity: 0.8;
	}

	.login input[type=button]:active{
		opacity: 0.6;
	}

	.login input[type=text]:focus{
		outline: none;
		border: 1px solid rgba(24,84,254,0.9);
	}

	.login input[type=password]:focus{
		outline: none;
		border: 1px solid rgba(24,84,254,0.9);
	}

	.login input[type=button]:focus{
		outline: none;
	}

	::-webkit-input-placeholder{
		color: rgba(255,255,255,0.6);
	}


</style>

</head>

<body oncontextmenu="return false">

<div class="body"></div>
<div class="grad"></div>
<div class="header">

	<a href='<?php echo site_url('football/showCountry')?>'><div>Football<span>Tables</span></div></a>
</div>
<br>
<form name="login">
	<div class="login">
		<input type="text" placeholder="Admin name" name="meno"><br>
		<input type="password" placeholder="Password" name="heslo"><br>
		<input type="button" onclick="check(this.form)" value="Sign in"/>
	</div>



</form>
<script language="javascript">
	function check(form)
	{

		if(form.meno.value == "admin" && form.heslo.value == "admin")
		{
			window.close('<?php echo site_url('login/')?>');
			window.open('<?php echo site_url('multigrid/multigrids')?>')
		}
		else
		{
			alert("Hmm, try entering -> admin <- data ☺")
		}
	}
</script>
© 2020 Copyright Jozef Mihálik ☺
</body>
</html>
