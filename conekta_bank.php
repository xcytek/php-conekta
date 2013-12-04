<?php
session_start();
require_once 'MyConekta.php';

$_SESSION['token'] = MyConekta::tokengenerator();
$amount = (strstr($amount = $_POST['amount'], '.')) ? str_replace('.', '', $amount) : $amount.'00';
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$bank = $_POST['bank'];

MyConekta::bank($amount, $name, $email, $phone, $bank);