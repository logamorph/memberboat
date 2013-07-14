<?php include_once __DIR__.'/html-head.php'; ?>

<style type="text/css">
table thead {
	background-color: LightSteelBlue;
}
.dashboard-box {
	height: 150px;
	
}
</style>

<header></header>
	
<div id="main">

<div id="main-row" class="row-fluid">
	
<div class="span2">
<?php include_once __DIR__.'/left-col.php'; ?>
</div><!-- #left-col .span2 -->


<div class="span10">
  <div id="main-col">
	
	<!-- Status Bar -->
    <div id="main-col-top-bar"></div>
	
	<div class="row-fluid">
		
		<div id="member-box" class="span8">
		<h2>John Doe</h2>
		<hr />
		
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<td colspan="3">Member Address</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Street Location</th>
					<th>State</th>
					<th>Zip</th>
				</tr>
				<tr>
					<td>717 Kindred Ln</td>
					<td>TX</td>
					<td>75080</td>
				</tr>
			</tbody>
		</table>

		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<td colspan="3">Member Contact</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				<tr>
					<td>John Doe</td>
					<td>test@example.com</td>
					<td>214-555-1212</td>
				</tr>
			</tbody>
		</table>

		<hr />
		<h3>List of Persons</h3>
	
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<td colspan="3">Contact Info</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
				</tr>
				<tr>
					<td>John Doe</td>
					<td>test@example.com</td>
					<td>214-555-1212</td>
				</tr>
			</tbody>
		</table>

		</div>
		
		<!-- right side column -->
		<div class="span4">
		<div id="right-col">
		<h2>Membership</h2>
		
		<hr />
		
		<button class="btn btn-large btn-success disabled">Active</button>
		
		<hr />
		
		<table class="table table-condensed">
			<tr><td>First Joined</td><td>July 12, 1999</td></tr>
			<tr><td>Current Term</td><td></td></tr>
			<tr><td>Renewal Date</td><td>July 1, 2014</td></tr>
		</table>
		
		</div>
		</div>

		
	</div><!-- .row-fluid -->
	<!-- end of main box -->
		
  </div>
</div><!-- div.span10 -->


</div><!-- #main-row .-->
</div><!-- #main .container -->

<?php include_once __DIR__.'/html-foot.php'; ?>
