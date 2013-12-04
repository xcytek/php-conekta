<?php

class Conekta_CardErrorTest extends UnitTestCase
{
  public function testDecline()
  {
    authorizeFromEnv();
    try {
		Conekta_Charge::create(array('amount' => 2000,
			'currency' => 'mxn', 'description' => 'Some desc',
			'card' => array('number' => '4000000000000002', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno')));
    } catch (Conekta_CardError $e) {
      $this->assertEqual(402, $e->getHttpStatus());
      $body = $e->getJsonBody();
      $this->assertTrue($body['object'] == 'error');
      $this->assertTrue($body['message'] == 'The card was declined');
    }
  }
}
