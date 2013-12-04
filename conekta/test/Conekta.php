<?php

echo "Running the Conekta PHP bindings test suite.\n".
     "If you're trying to use the Conekta PHP bindings you'll probably want ".
     "to require('lib/Conekta.php'); instead of this file\n";

function authorizeFromEnv()
{
  $apiKey = getenv('CONEKTA_API_KEY');
  if (!$apiKey)
    $apiKey = "qso7o4nDGnWNMESzLxq4";
  Conekta::setApiKey($apiKey);
}

$ok = @include_once(dirname(__FILE__).'/simpletest/autorun.php');
if (!$ok) {
  $ok = @include_once(dirname(__FILE__).'/../vendor/vierbergenlars/simpletest/autorun.php');
}
if (!$ok) {
  echo "MISSING DEPENDENCY: The Conekta API test cases depend on SimpleTest. ".
       "Download it at <http://www.simpletest.org/>, and either install it ".
       "in your PHP include_path or put it in the test/ directory.\n";
  exit(1);
}

// Throw an exception on any error
function exception_error_handler($errno, $errstr, $errfile, $errline) {
  throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}
//set_error_handler('exception_error_handler');
error_reporting(E_ALL | E_STRICT);

require_once(dirname(__FILE__) . '/../lib/Conekta.php');

require_once(dirname(__FILE__) . '/Conekta/TestCase.php');

require_once(dirname(__FILE__) . '/Conekta/ApiRequestorTest.php');
require_once(dirname(__FILE__) . '/Conekta/AuthenticationErrorTest.php');
require_once(dirname(__FILE__) . '/Conekta/CardErrorTest.php');
require_once(dirname(__FILE__) . '/Conekta/ChargeTest.php');
require_once(dirname(__FILE__) . '/Conekta/Error.php');
require_once(dirname(__FILE__) . '/Conekta/ObjectTest.php');
require_once(dirname(__FILE__) . '/Conekta/Token.php');
require_once(dirname(__FILE__) . '/Conekta/UtilTest.php');
//require_once(dirname(__FILE__) . '/Conekta/AccountTest.php');
//require_once(dirname(__FILE__) . '/Conekta/BalanceTest.php');
//require_once(dirname(__FILE__) . '/Conekta/BalanceTransactionTest.php');
//require_once(dirname(__FILE__) . '/Conekta/CouponTest.php');
//require_once(dirname(__FILE__) . '/Conekta/CustomerTest.php');
//require_once(dirname(__FILE__) . '/Conekta/DiscountTest.php');
//require_once(dirname(__FILE__) . '/Conekta/TransferTest.php');
//require_once(dirname(__FILE__) . '/Conekta/RecipientTest.php');
//require_once(dirname(__FILE__) . '/Conekta/PlanTest.php');
//require_once(dirname(__FILE__) . '/Conekta/InvalidRequestErrorTest.php');
//require_once(dirname(__FILE__) . '/Conekta/InvoiceTest.php');
