<?php 

require_once 'MyConekta.php';
$amount 	= filter_input(INPUT_POST, 'amount');
$amount 	= (strstr($amount = $amount, '.')) ? str_replace('.', '', $amount) : $amount.'00';
$number 	= filter_input(INPUT_POST, 'number');
$exp_month 	= filter_input(INPUT_POST, 'exp_month');
$exp_year 	= filter_input(INPUT_POST, 'exp_year');
$cvc 		= filter_input(INPUT_POST, 'cvc');
$name 		= filter_input(INPUT_POST, 'name');

MyConekta::card($amount, $number, $exp_month, $exp_year, $cvc, $name);