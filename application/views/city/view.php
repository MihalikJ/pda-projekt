<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail <a href="<?php echo site_url('city/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($city['idcity'])? $city['idcity']:''; ?></p>
				</div>
				<div class="form-group">
					<label>City:</label>
					<p><?php echo !empty($city['city'])? $city['city']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Country:</label>
					<p><?php echo !empty($city['country'])? $city['country']:''; ?></p>
				</div>

			</div>
		</div>
	</div>
</div>
