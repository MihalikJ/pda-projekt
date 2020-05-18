<div class="container">
	<div class="row"><br></div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">Detail <a href="<?php echo site_url('team/'); ?>" class="glyphicon glyphicon-arrow-left pull-right"></a></div>
			<div class="panel-body">
				<div class="form-group">
					<label>ID:</label>
					<p><?php echo !empty($team['idteam'])? $team['idteam']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Team name:</label>
					<p><?php echo !empty($team['tname'])? $team['tname']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Alias:</label>
					<p><?php echo !empty($team['alias'])? $team['alias']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Establishment:</label>
					<p><?php echo !empty($team['establishment'])? $team['establishment']:''; ?></p>
				</div>
				<div class="form-group">
					<label>Stadium:</label>
					<p><?php echo !empty($team['stadium'])? $team['stadium']:''; ?></p>
				</div>
				<div class="form-group">
					<label>League:</label>
					<p><?php echo !empty($team['lname'])? $team['lname']:''; ?></p>
				</div>
				<div class="form-group">
					<label>City:</label>
					<p><?php echo !empty($team['city'])? $team['city']:''; ?></p>
				</div>

			</div>
		</div>
	</div>
</div>
