<?php
session_start();
require_once 'MyConekta.php';

$_SESSION['token'] = MyConekta::tokengenerator();
$amount = (strstr($amount = $_POST['amount'], '.')) ? str_replace('.', '', $amount) : $amount.'00';
$email = $_POST['email'];

MyConekta::oxxo($amount, $email);