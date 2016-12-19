<?php
require(dirname(__DIR__) . '/vendor/autoload.php');

use VatValidation\Validation;

$vatId = 'FR12345678910';

$vatValidation = new Validation($vatId);

/*
 * Check VAT
 */
$test = $vatValidation->checkVat();
print_r($test);

/*
 * Check VAT Approx
 */
$test = $vatValidation->checkVatApprox();
print_r($test);

/*
 * Is VAT ID valid ?
 */
$test = $vatValidation->isValid();
echo $test;

/*
 * Get country code of a VAT ID
 */
$test = $vatValidation->getCountryCode();
echo $test;

/*
 * Get VAT number of a VAT ID
 */
$test = $vatValidation->getVatNumber();
echo $test;

/*
 * Get name behind a VAT ID
 */
$test = $vatValidation->getName();
echo $test;

/*
 * Get address behind a VAT ID
 */
$test = $vatValidation->getAddress();
echo $test;

/*
 * Get trader name behind a VAT ID
 */
$test = $vatValidation->getTraderName();
echo $test;

/*
 * Get trader company type behind a VAT ID
 */
$test = $vatValidation->getTraderName();
echo $test;

/*
 * Get address behind a VAT ID
 */
$test = $vatValidation->getTraderAddress();
echo $test;
