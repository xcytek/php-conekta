<?php 

require_once 'MyConekta.php';

$amount = (strstr($amount = $_POST['amount'], '.')) ? str_replace('.', '', $amount) : $amount.'00';
$number = $_POST['number'];
$exp_month = $_POST['exp_month'];
$exp_year = $_POST['exp_year'];
$cvc = $_POST['cvc'];
$name = $_POST['name'];

MyConekta::card($amount, $number, $exp_month, $exp_year, $cvc, $name);