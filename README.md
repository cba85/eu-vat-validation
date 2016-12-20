# European VAT number validation

A PHP package to verify the validity of a VAT number issued by any European Union Member State. 

This package is basically calling web service provided by VIES for VAT number validation. 

VIES API documentation : http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl

This package allows you to :
- validate a VAT number
- retrieve information like the name or the address of the company

## What is a VAT number?

A value added tax identification number or VAT identification number (VATIN) is an identifier used in many countries, including the countries of the European Union, for value added tax purposes.

## Installation

Install using Composer :

```
$ composer require cba85/eu-vat-validation dev-master
```

You must have PHP with Soap enabled.

## Usage

```php
$vatValidation = new Validation('FR12345678910');

/*
 * Check VAT
 */
$vat = $vatValidation->checkVat();

/*
 * Is VAT ID valid ?
 */
$valid = $vatValidation->isValid();
```

You'll find more examples in the ``example`` folder.

## Returns

### Check VAT

```php
Array (
    [countryCode] => FR
    [vatNumber] => 12345678910
    [requestDate] => 2016-12-19+01:00
    [valid] =>
    [name] => ---
    [address] => ---
)
```

### Check VAT approx.

```php
Array(
	[countryCode] => FR
    [vatNumber] => 12345678910
    [requestDate] => 2016-12-19+01:00
    [valid] =>
    [traderName] => ---
    [traderCompanyType] => ---
    [traderAddress] => ---
    [requestIdentifier] =>
)
```


