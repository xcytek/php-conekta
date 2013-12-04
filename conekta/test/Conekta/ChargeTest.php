<?php

class Conekta_ChargeTest extends UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Conekta_Charge::classUrl('Conekta_Charge'), '/charges');
    $charge = new Conekta_Charge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/charges/abcd%2Fefgh');
  }

  public function testCreate()
  {
    authorizeFromEnv();
    $c = Conekta_Charge::create(array('amount' => 2000,
				    'currency' => 'mxn', 'description' => 'Some desc',
				    'card' => array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno')));
    $this->assertTrue($c->status == "paid");
  }

  public function testRetrieve()
  {
    authorizeFromEnv();
    $c = Conekta_Charge::create(array('amount' => 2000,
				    'currency' => 'mxn', 'description' => 'Some desc',
				    'card' => array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno')));
    $d = Conekta_Charge::retrieve($c->id);
    $this->assertEqual($d->id, $c->id);
  }
  
  public function testRefund()
  {
	authorizeFromEnv();  
	$c = Conekta_Charge::create(array('amount' => 2000,
				    'currency' => 'mxn', 'description' => 'Some desc',
				    'card' => array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno')));
    $c->refund();
    $this->assertTrue($c->status == "refunded");
  }
}
