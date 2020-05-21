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
		<h1>List of cities</h1>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading text-center">List of cities
					<a href="<?php echo site_url('city/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a>
					<a href="<?php echo site_url('team/'); ?>" class="glyphicon glyphicon-arrow-left pull-left" ></a>
				</div>
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
					<?php if(!empty($city)): foreach($city as $city): ?>
						<tr>
							<td><?php echo '#'.$city['idcity']; ?></td>
							<td><?php echo $city['city']; ?></td>
							<td><?php echo $city['country']; ?></td>
							<td>
								<a href="<?php echo site_url('city/view/'.$city['idcity']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('city/edit/'.$city['idcity']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('city/delete/'.$city['idcity']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No cities, add some ☺</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
