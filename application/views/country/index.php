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
		<h1>Welcome to Football League Overview page. </h1>
		<h1>Select a country and start browsing the leagues!</h1>
		<h2>List of countries :</h2>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default ">
				<div class="panel-heading">Countries <a href="<?php echo site_url('country/add/'); ?>" class="glyphicon glyphicon-plus-sign pull-right" ></a></div>
				<table class="table striped">
					<thead>
					<tr>
						<th width="30%">ID</th>
						<th width="40%">Country</th>
						<th width="30%">Action</th>
					</tr>
					</thead>
					<tbody id="userData">
					<?php if(!empty($country)): foreach($country as $country): ?>
						<tr>
							<td><?php echo '#'.$country['idcountry']; ?></td>
							<td><?php echo $country['country']; ?></td>
							<td>
								<a href="<?php echo site_url('league/'.$country['idcountry']); ?>"class="glyphicon glyphicon-menu-hamburger"></a>
								<a href="<?php echo site_url('country/view/'.$country['idcountry']); ?>"class="glyphicon glyphicon-eye-open"></a>
								<a href="<?php echo site_url('country/edit/'.$country['idcountry']); ?>"class="glyphicon glyphicon-edit"></a>
								<a href="<?php echo site_url('country/delete/'.$country['idcountry']); ?>"class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')"></a>
							</td>
						</tr>
					<?php endforeach; else: ?>
						<tr><td colspan="4">No countries, add some ☺</td></tr>
					<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<h4>This project is still in alpha, so be patient please. ☺</h4>
	<h4>We are fixing minor bugs everyday, but if you still find some, make sure to contact us via jozef.mihalik2@student.ukf.sk</h4>
</div>
