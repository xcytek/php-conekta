<?php

class Conekta_RecipientTest extends ConektaTestCase
{
  public function testDeletion()
  {
    $recipient = self::createTestRecipient();
    $recipient->delete();

    $this->assertTrue($recipient->deleted);
  }

  public function testSave()
  {
    $recipient = self::createTestRecipient();

    $recipient->email = 'gdb@conekta.com';
    $recipient->save();
    $this->assertEqual($recipient->email, 'gdb@conekta.com');

    $recipient2 = Conekta_Recipient::retrieve($recipient->id);
    $this->assertEqual($recipient->email, $recipient2->email);
  }

  public function testBogusAttribute()
  {
    $recipient = self::createTestRecipient();
    $recipient->bogus = 'bogus';

    $caught = null;
    try {
      $recipient->save();
    } catch (Conekta_InvalidRequestError $exception) {
      $caught = $exception;
    }

    $this->assertTrue($caught instanceof Conekta_InvalidRequestError);
  }
}
