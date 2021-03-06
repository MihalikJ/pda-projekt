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
				<div class="panel-heading"><?php //echo $action; ?> Cities <a href="<?php echo site_url('city/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
				<div class="panel-body">
					<form method="post" action="" class="form">

						<div class="form-group">
							<label for="title">City name</label>
							<input type="text" class="form-control" name="city" id="city" placeholder="Enter a name" value="<?php echo !empty($post['city'])?$post['city']:''; ?>">
							<?php echo form_error('city','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<div class="form-group">
							<label for="title">Select country</label>
							<?php echo form_dropdown('country_idcountry', $country, $vybrana_krajina, 'class="form-control"'); ?>
							<?php echo form_error('country_idcountry','<p class="help-block text-danger">','</p>'); ?>
						</div>

						<input type="submit" name="postSubmit" class="btn btn-primary" value="Send"/>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
