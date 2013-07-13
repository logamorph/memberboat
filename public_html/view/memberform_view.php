<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 60px;
			padding-bottom: 40px;
			padding-left: 8px;
			padding-right: 8px;
		}
	</style>
	<!--<link rel="stylesheet" href="view/css/datepicker.css">-->
	<!--<link rel="stylesheet" href="view/css/custom-notes_view.css">-->

</head>

<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->
		
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse collapse">
					<a class="brand" href="#">MemberBOAT</a>
					<ul class="nav">
					</ul>
					<span class="pull-right">
					</span>
					
				<?php /**
					<form class="navbar-form">
						<input class="span2" type="text" placeholder="Lead ID">
						<button type="submit" class="btn">Search</button>
					</form>
					<form class="navbar-form pull-right">
						<input class="span2" type="text" placeholder="Email">
						<input class="span2" type="password" placeholder="Password">
						<button type="submit" class="btn">Sign Out</button>
					</form>
				*/ ?>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="span3"></div>
			<div class="span6">
				
				
			</div>
			<div class="span3"></div>
		</div>
	</div>

		<div class="modal">
		  <div class="modal-header">
			<h3>Become a Member!</h3>
		  </div>
		  <div class="modal-body">
			<form action="submit_memberform.php" method="POST">
			  <fieldset>
				<div class="row-fluid"><div class="span8 offset2">
					<label for="address">Address</label>
					<input class="input-block-level" type="text" name="address" id="address" placeholder="i.e. 742 Evergreen Terrace" />
					<label for="phone">Phone</label>
					<input class="input-block-level" type="text" name="phone" id="phone" placeholder="i.e. 972-555-1212" />
					<label for="email">Email</label>
					<input class="input-block-level" type="text" name="email" id="email" placeholder="i.e. janeandjohn@example.com" />
					<script src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
					  data-key="<?php echo $stripe['publishable_key']; ?>"
					  data-amount="2000" data-description="One year's membership"></script>
				</div></div>
				<div style="height: 20px;"></div>
				<!--<div class="pagination-centered">
					<button type="submit" class="btn btn-primary btn-large">Next</button>
				</div>-->
			  </fieldset>
			</form>
		  </div>
		  <div class="modal-footer">
			Dynamic: <?php echo $this->group->name; ?>
		  </div>
		</div>	
		
	<footer>
	</footer>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
});
</script>

</body>
</html>
