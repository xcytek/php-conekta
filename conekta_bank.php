<?php
session_start();
require_once 'MyConekta.php';

$_SESSION['token'] = MyConekta::tokengenerator();
$amount = filter_input(INPUT_POST, 'amount');
$amount = (strstr($amount = $amount, '.')) ? str_replace('.', '', $amount) : $amount.'00';
$name 	= filter_input(INPUT_POST, 'name');
$email 	= filter_input(INPUT_POST, 'email');
$phone 	= filter_input(INPUT_POST, 'phone');
$bank 	= filter_input(INPUT_POST, 'bank');

MyConekta::bank($amount, $name, $email, $phone, $bank);