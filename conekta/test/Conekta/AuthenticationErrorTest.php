<?php

class Conekta_AuthenticationErrorTest extends UnitTestCase
{
  public function testInvalidCredentials()
  {
    Conekta::setApiKey('invalid');
    try {
      Conekta_Customer::create();
    } catch (Conekta_AuthenticationError $e) {
      $this->assertEqual(401, $e->getHttpStatus());
    }
  }
}
