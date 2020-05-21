<div class="container">
	<?php if(!empty($success_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-success"><?php echo $success_msg; ?></div>
		</div>
	<?php }elseif(!empty($error_msg)){ ?>
		<div class="col-xs-12">
			<div class="alert alert-danger"><?php echo $error_msg; ?></div>
		</div>
	<?php } ?>
	<div class="row">
		<h1>List of teams</h1>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading text-center"> List of teams
					<a href="<?php echo site_url('team/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a>
					<a href="<?php echo site_url('league/'); ?>" class="glyphicon glyphicon-arrow-left pull-left" ></a>
				</div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="35%">Name</th>
						<th width="35%">Alias</th>
						<th width="20%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($team)): foreach($team as $team): ?>
						<tr>
							<td><?php echo '#'.$team['idteam']; ?></td>
							<td><?php echo $team['tname']; ?></td>
							<td><?php echo $team['alias']; ?></td>
							<td>
								<a href="<?php echo site_url('team/view/'.$team['idteam']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('team/edit/'.$team['idteam']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('team/delete/'.$team['idteam']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No teams, add some ☺</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
