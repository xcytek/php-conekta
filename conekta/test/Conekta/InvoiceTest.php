<?php

class Conekta_InvoiceTest extends ConektaTestCase
{
  public function testUpcoming()
  {
    authorizeFromEnv();
    $customer = self::createTestCustomer();

    Conekta_InvoiceItem::create(
      array(
        'customer'  => $customer->id,
        'amount'    => 0,
        'currency'  => 'usd',
      ));

    $invoice = Conekta_Invoice::upcoming(
      array(
        'customer' => $customer->id,
      ));
    $this->assertEqual($invoice->customer, $customer->id);
    $this->assertEqual($invoice->attempted, false);
  }

}
