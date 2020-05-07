<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail <a href="<?php echo site_url('country/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($country['id'])?$country['id']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Country:</label>
					<p><?php echo !empty($country['country'])?$country['country']:''; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
