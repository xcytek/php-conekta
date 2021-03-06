<?php

class Conekta_ErrorTest extends UnitTestCase
{
  public function testCreation()
  {
    try {
      throw new Conekta_Error("hello", 500, "{'foo':'bar'}", array('foo' => 'bar'));
      $this->fail("Did not raise error");
    } catch (Conekta_Error $e) {
      $this->assertEqual("hello", $e->getMessage());
      $this->assertEqual(500, $e->getHttpStatus());
      $this->assertEqual("{'foo':'bar'}", $e->getHttpBody());
      $this->assertEqual(array('foo' => 'bar'), $e->getJsonBody());
    }
  }
}