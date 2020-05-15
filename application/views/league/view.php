<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail <a href="<?php echo site_url('league/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($league['idleague'])? $league['idleague']:''; ?></p>
				</div>
				<div class="form-group">
					<label>League name:</label>
					<p><?php echo !empty($league['name'])? $league['name']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Country:</label>
					<p><?php echo !empty($league['country'])? $league['country']:''; ?></p>
				</div>

			</div>
		</div>
	</div>
</div>
