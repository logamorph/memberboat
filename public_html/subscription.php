<?php namespace ThisAmericanLab\Memberboat;

ini_set('display_errors',1);

// *************************************************************
// REQUIRED FILES FOR CONTROLLER

require_once __DIR__.'/config/mysqli_db_config.php';

require_once __DIR__.'/lib/ThisAmericanLab/Memberboat/PersonService.php';
require_once __DIR__.'/lib/ThisAmericanLab/Memberboat/SubscriptionService.php';

// *****************************************************************
// SERVICE OBJECTS

$subscription_service = new SubscriptionService();
$subscription_service->set_mysqli_db($mysqli_db);

$person_service = new PersonService();
$person_service->set_mysqli_db($mysqli_db);

