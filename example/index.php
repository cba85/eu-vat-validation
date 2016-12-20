<?php
require(dirname(__DIR__) . '/vendor/autoload.php');

use VatValidation\Validation;

$vatId = 'FR12345678910';

$vatValidation = new Validation($vatId);

/*
 * Check VAT
 */
$vat = $vatValidation->checkVat();
print_r($vat);

/*
 * Check VAT Approx
 */
$vat = $vatValidation->checkVatApprox();
print_r($vat);

/*
 * Is VAT ID valid ?
 */
$valid = $vatValidation->isValid();
echo $valid;

/*
 * Get country code of a VAT ID
 */
$countryCode = $vatValidation->getCountryCode();
echo $countryCode;

/*
 * Get VAT number of a VAT ID
 */
$vatNumber = $vatValidation->getVatNumber();
echo $vatNumber;

/*
 * Get name behind a VAT ID
 */
$name = $vatValidation->getName();
echo $name;

/*
 * Get address behind a VAT ID
 */
$address = $vatValidation->getAddress();
echo $address;

/*
 * Get trader name behind a VAT ID
 */
$traderName = $vatValidation->getTraderName();
echo $traderName;

/*
 * Get trader company type behind a VAT ID
 */
$traderCompanyType = $vatValidation->getTraderCompanyType();
echo $traderCompanyType;

/*
 * Get address behind a VAT ID
 */
$traderAddress = $vatValidation->getTraderAddress();
echo $traderAddress;
