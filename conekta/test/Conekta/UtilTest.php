<?php

class Conekta_UtilTest extends ConektaTestCase
{
  public function testIsList()
  {
    $list = array(5, 'nstaoush', array());
    $this->assertTrue(Conekta_Util::isList($list));

    $notlist = array(5, 'nstaoush', array(), 'bar' => 'baz');
    $this->assertFalse(Conekta_Util::isList($notlist));
  }

  public function testThatPHPHasValueSemanticsForArrays()
  {
    $original = array('php-arrays' => 'value-semantics');
    $derived = $original;
    $derived['php-arrays'] = 'reference-semantics';

    $this->assertEqual('value-semantics', $original['php-arrays']);
  }

  public function testConvertConektaObjectToArrayIncludesId()
  {
    $customer = self::createTestCustomer();
    $this->assertTrue(array_key_exists("id", $customer->__toArray(true)));
  }
}
