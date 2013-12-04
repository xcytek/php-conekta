<?php

class Conekta_PlanTest extends ConektaTestCase
{
  public function testDeletion()
  {
    authorizeFromEnv();
    $p = Conekta_Plan::create(array('amount' => 2000,
                                   'interval' => 'month',
                                   'currency' => 'usd',
                                   'name' => 'Plan',
                                   'id' => 'gold-' . self::randomString()));
    $p->delete();
    $this->assertTrue($p->deleted);
  }

  public function testSave()
  {
    authorizeFromEnv();
    $planId = 'gold-' . self::randomString();
    $p = Conekta_Plan::create(array('amount' => 2000,
                                   'interval' => 'month',
                                   'currency' => 'usd',
                                   'name' => 'Plan',
                                   'id' => $planId));
    $p->name = 'A new plan name';
    $p->save();
    $this->assertEqual($p->name, 'A new plan name');

    $p2 = Conekta_Plan::retrieve($planId);
    $this->assertEqual($p->name, $p2->name);
  }
}
