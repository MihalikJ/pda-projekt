<!DOCTYPE html>
<html>
<head>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>

	<div>
		<a href='<?php echo site_url('football/showCountry')?>'>Countries</a> |
		<a href='<?php echo site_url('football/showCity')?>'>Cities</a> |
		<a href='<?php echo site_url('football/showLeague')?>'>Leagues</a> |
		<a href='<?php echo site_url('football/showTeam')?>'>Teams</a> |

		<a href='<?php echo site_url('football/multigrids')?>'>All tables together</a>

	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
