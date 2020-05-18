<div class="container">
	<div class="row"><br></div>
	<div class="col-xs-12">
		<?php
		if(!empty($success_msg)){
			echo '<div class="alert alert-success">'.$success_msg.'</div>';
		}elseif(!empty($error_msg)){
			echo '<div class="alert alert-danger">'.$error_msg.'</div>';
		}
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php //echo $action; ?> Teams <a href="<?php echo site_url('team/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">

						<div class="form-group">
							<label for="title">Team name</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter a name" value="<?php echo !empty($post['name'])?$post['name']:''; ?>">
							<?php echo form_error('name','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Team alias</label>
							<input type="text" class="form-control" name="alias" id="alias" placeholder="Enter an alias" value="<?php echo !empty($post['alias'])?$post['alias']:''; ?>">
							<?php echo form_error('alias','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Team establishment</label>
							<input type="text" class="form-control" name="establishment" id="establishment" placeholder="Enter a year" value="<?php echo !empty($post['establishment'])?$post['establishment']:''; ?>">
							<?php echo form_error('establishment','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Stadium</label>
							<input type="text" class="form-control" name="stadium" id="stadium" placeholder="Enter a stadium name" value="<?php echo !empty($post['stadium'])?$post['stadium']:''; ?>">
							<?php echo form_error('stadium','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Select league</label>
							<?php echo form_dropdown('league_idleague', $league, $vybrana_liga, 'class="form-control"'); ?>
							<?php echo form_error('league_idleague','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Select city</label>
							<?php echo form_dropdown('city_idcity', $city, $vybrane_mesto, 'class="form-control"'); ?>
							<?php echo form_error('city_idcity','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<input type="submit" name="postSubmit" class="btn btn-primary" value="Send"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
