<?php

class Conekta_DiscountTest extends ConektaTestCase
{
  public function testDeletion()
  {
    authorizeFromEnv();
    $id = 'test-coupon-' . self::randomString();
    $coupon = Conekta_Coupon::create(array('percent_off' => 25,
                                          'duration' => 'repeating',
                                          'duration_in_months' => 5,
                                          'id' => $id));
    $customer = self::createTestCustomer(array('coupon' => $id));

    $this->assertTrue(isset($customer->discount));
    $this->assertTrue(isset($customer->discount->coupon));
    $this->assertEqual($id, $customer->discount->coupon->id);

    $customer->deleteDiscount();
    $this->assertFalse(isset($customer->discount));

    $customer = Conekta_Customer::retrieve($customer->id);
    $this->assertFalse(isset($customer->discount));
  }
}