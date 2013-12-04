<?php

class Conekta_InvalidRequestErrorTest extends UnitTestCase
{
  public function testInvalidObject()
  {
    authorizeFromEnv();
    try {
      Conekta_Customer::retrieve('invalid');
    } catch (Conekta_InvalidRequestError $e) {
      $this->assertEqual(404, $e->getHttpStatus());
    }
  }

  public function testBadData()
  {
    authorizeFromEnv();
    try {
      Conekta_Charge::create();
    } catch (Conekta_InvalidRequestError $e) {
      $this->assertEqual(400, $e->getHttpStatus());
    }
  }
}
