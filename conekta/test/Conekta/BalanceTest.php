<?php

class Conekta_BalanceTest extends ConektaTestCase
{
  public function testRetrieve()
  {
    authorizeFromEnv();
    $d = Conekta_Balance::retrieve();
    $this->assertEqual($d->object, "balance");
    $this->assertTrue(Conekta_Util::isList($d->available));
    $this->assertTrue(Conekta_Util::isList($d->pending));
  }
}
