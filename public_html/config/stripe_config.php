<?php
require_once(dirname(__FILE__).'/../lib/Stripe.php');
 
$stripe = array(
  secret_key      => '',
  publishable_key => ''
);
 
Stripe::setApiKey($stripe['secret_key']);
?>
