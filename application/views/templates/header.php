<!DOCTYPE html>
<html lang="en-US">
<head>
	<link rel="stylesheet" href="<?php echo base_url("css/page.css" ) ;?>"/>

	<!-- <script type="text/js" src="<?php echo base_url("js/pagejs.js" ) ;?>"></script> -->

	<h1>Welcome to Football League Overview page. </h1>
	<h1>Feel free to start browsing the datas!</h1>

	<nav>
		<ul>
			<li>
				<a href='<?php echo site_url('football/showCountry')?>'>Countries</a>
			</li>
			<li>
				<a href='<?php echo site_url('football/showCity')?>'>Cities</a>
			</li>
			<li>
				<a href='<?php echo site_url('football/showLeague')?>'>Leagues</a>
			</li>
			<li>
				<a href='<?php echo site_url('football/showTeam')?>'>Teams</a>
			</li>
			<li>
				<a href='<?php echo site_url('football/showMatches')?>'>Matches</a>
			</li>

			<li>
				<a href='<?php echo site_url('login/')?>'>Admin</a>
			</li>
		</ul>
	</nav>


</head>
<body>
