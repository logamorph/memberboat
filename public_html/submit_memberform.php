<?php
  require_once(dirname(__FILE__) . '/config/stripe_config.php');
 
  $token  = $_POST['stripeToken'];
 
  $customer = Stripe_Customer::create(array(
      'email' => 'customer@example.com',
      'card'  => $token
  ));
 
  $charge = Stripe_Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 5000,
      'currency' => 'usd'
  ));


// var_dump($charge);
/*
 * object(Stripe_Charge)#9 (5) { ["_apiKey":protected]=> string(32) "sk_test_yYJo3QDAOOgjawoFCrKgnwvQ" ["_values":protected]=> array(18) { ["id"]=> string(17) "ch_1T1A6nCIN58BmY" ["object"]=> string(6) "charge" ["created"]=> int(1363381950) ["livemode"]=> bool(false) ["paid"]=> bool(true) ["amount"]=> int(5000) ["currency"]=> string(3) "usd" ["refunded"]=> bool(false) ["fee"]=> int(175) ["fee_details"]=> array(1) { [0]=> object(Stripe_Object)#12 (5) { ["_apiKey":protected]=> string(32) "sk_test_yYJo3QDAOOgjawoFCrKgnwvQ" ["_values":protected]=> array(6) { ["amount"]=> int(175) ["currency"]=> string(3) "usd" ["type"]=> string(10) "stripe_fee" ["description"]=> string(22) "Stripe processing fees" ["application"]=> NULL ["amount_refunded"]=> int(0) } ["_unsavedValues":protected]=> object(Stripe_Util_Set)#13 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_transientValues":protected]=> object(Stripe_Util_Set)#14 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_retrieveOptions":protected]=> array(0) { } } } ["card"]=> object(Stripe_Object)#15 (5) { ["_apiKey":protected]=> string(32) "sk_test_yYJo3QDAOOgjawoFCrKgnwvQ" ["_values":protected]=> array(17) { ["object"]=> string(4) "card" ["last4"]=> string(4) "4242" ["type"]=> string(4) "Visa" ["exp_month"]=> int(5) ["exp_year"]=> int(2014) ["fingerprint"]=> string(16) "DVKCNFipMxjV05Oa" ["country"]=> string(2) "US" ["name"]=> string(8) "JOhn Doe" ["address_line1"]=> NULL ["address_line2"]=> NULL ["address_city"]=> NULL ["address_state"]=> NULL ["address_zip"]=> NULL ["address_country"]=> NULL ["cvc_check"]=> string(4) "pass" ["address_line1_check"]=> NULL ["address_zip_check"]=> NULL } ["_unsavedValues":protected]=> object(Stripe_Util_Set)#16 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_transientValues":protected]=> object(Stripe_Util_Set)#17 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_retrieveOptions":protected]=> array(0) { } } ["captured"]=> bool(true) ["failure_message"]=> NULL ["amount_refunded"]=> int(0) ["customer"]=> string(18) "cus_1T1ApaVEjtYUv9" ["invoice"]=> NULL ["description"]=> NULL ["dispute"]=> NULL } ["_unsavedValues":protected]=> object(Stripe_Util_Set)#10 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_transientValues":protected]=> object(Stripe_Util_Set)#11 (1) { ["_elts":"Stripe_Util_Set":private]=> array(0) { } } ["_retrieveOptions":protected]=> array(0) { } }
 * */

 
  echo '<h1>Successfully charged $5!</h1>';
?>
