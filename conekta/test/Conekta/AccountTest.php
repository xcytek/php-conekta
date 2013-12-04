<?php

class Conekta_AccountTest extends ConektaTestCase
{
  public function testRetrieve()
  {
    authorizeFromEnv();
    $d = Conekta_Account::retrieve();
    $this->assertEqual($d->email, "test+bindings@conekta.com");
    $this->assertEqual($d->charge_enabled, false);
    $this->assertEqual($d->details_submitted, false);
  }
}
