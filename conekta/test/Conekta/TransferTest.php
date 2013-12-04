<?php

class Conekta_TransferTest extends ConektaTestCase
{
  public function testCreate()
  {
    $recipient = self::createTestRecipient();

    authorizeFromEnv();
    $transfer = Conekta_Transfer::create(
      array(
        'amount' => 100,
				'currency' => 'usd',
        'recipient' => $recipient->id
      )
    );
    $this->assertEqual('pending', $transfer->status);
  }

  public function testRetrieve()
  {
    $recipient = self::createTestRecipient();

    authorizeFromEnv();
    $transfer = Conekta_Transfer::create(
      array(
        'amount' => 100,
				'currency' => 'usd',
        'recipient' => $recipient->id
      )
    );
    $reloaded = Conekta_Transfer::retrieve($transfer->id);
    $this->assertEqual($reloaded->id, $transfer->id);
  }
}
