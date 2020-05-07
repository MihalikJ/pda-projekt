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
		<h1>List of countries</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Countries <a href="<?php echo site_url('country/add/'); ?>" class="glyphicon glyphicon-plus pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="20%">ID</th>
						<th width="30%">Country</th>
						<th width="20%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($country)): foreach($country as $country): ?>
						<tr>
							<td><?php echo '#'.$country['id']; ?></td>
							<td><?php echo $country['country']; ?></td>
							<td>
								<a href="<?php echo site_url('country/view/'.$country['id']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('country/edit/'.$country['id']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('country/delete/'.$country['id']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">Žiadni študenti ......</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
