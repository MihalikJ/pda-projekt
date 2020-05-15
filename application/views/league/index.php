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
		<h1>List of leagues</h1>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">List of leagues <a href="<?php echo site_url('league/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="35%">Name</th>
						<th width="35%">Country</th>
						<th width="20%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($league)): foreach($league as $league): ?>
						<tr>
							<td><?php echo '#'.$league['idleague']; ?></td>
							<td><?php echo $league['name']; ?></td>
							<td><?php echo $league['country']; ?></td>
							<td>
								<a href="<?php echo site_url('league/view/'.$league['idleague']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('league/edit/'.$league['idleague']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('league/delete/'.$league['idleague']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No leagues, add some ☺</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
