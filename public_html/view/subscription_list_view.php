<?php include_once __DIR__.'/html-head.php'; ?>

<header></header>
	
<div id="main">

<div id="main-row" class="row-fluid">
	
<div class="span2">
<?php include_once __DIR__.'/left-col.php'; ?>
</div><!-- #left-col .span2 -->


<div class="span10">
	<div id="main-col">
	<h2>Subscription List</h2>

	<table class="table table-bordered table-hover">
	
	<thead>
	
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Address Number</th>
		<th>Address Street Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Expires On</th>
		<th>Payment Record</th>
	</tr>
	</thead>

	
	<tbody>
		<?php foreach($this->viewmodel_list as $obj): ?>
	<tr>
		<td><a href="./view/1"><?php echo $obj->first_name; ?></a></td>
		<td><a href="./view/1"><?php echo $obj->last_name; ?></a></td>
		<td><?php echo $obj->address_line1; ?></td>
		<td><?php echo $obj->email; ?></td>
		<td><?php echo $obj->phone; ?></td>
		<td><?php echo $obj->expire_on; ?></td>
		<td>View Receipt</td>
	</tr><?php endforeach; ?>
	</tbody>

<?php /**	
	<tbody>
		<?php for($i=0; $i< 40; $i++): ?>
	<tr>
		<td><a href="./view/1">Frank</a></td>
		<td><a href="./view/1">Yeh</a></td>
		<td>721</td>
		<td>Kindred Ln</td>
		<td>yehfrank@gmail.com</td>
		<td>214-727-3896</td>
		<td>May 21, 2013</td>
		<td>View Receipt</td>
	</tr><?php endfor; ?>
	</tbody>
**/ ?>
	</table>
	
	
	</div>
</div><!-- #main-col" .span10 -->
	

</div><!-- #main-row .-->
</div><!-- #main .container -->

<?php include_once __DIR__.'/html-foot.php'; ?>
