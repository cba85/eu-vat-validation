<?php
use PHPUnit\Framework\TestCase;
use VatValidation\Validation;

class ValidationTest extends TestCase
{

    public function testCheckVat() {
        $vatValidation = new Validation('FR12345678910');
        $vat = $vatValidation->checkVat();
        $expected = new stdClass;
        $expected->countryCode = 'FR';
        $expected->vatNumber = '12345678910';
        $expected->requestDate = '2016-12-26+01:00';
        $expected->valid = false;
        $expected->name = '---';
        $expected->address = '---';
        $this->assertEquals($expected, $vat);
    }

    public function testCheckVatApprox() {
        $vatValidation = new Validation('FR12345678910');
        $vat = $vatValidation->checkVatApprox();
        $expected = new stdClass;
        $expected->countryCode = 'FR';
        $expected->vatNumber = '12345678910';
        $date = date('Y-m-d') . '+01:00';
        $expected->requestDate = $date;
        $expected->valid = false;
        $expected->traderName = '---';
        $expected->traderCompanyType = '---';
        $expected->traderAddress = '---';
        $expected->requestIdentifier = null;
        $this->assertEquals($expected, $vat);
    }

    public function testIsValid() {
        $vatValidation = new Validation('FR12345678910');
        $valid = $vatValidation->isValid();
        $this->assertFalse($valid);
    }

    public function testCountryCode() {
        $vatValidation = new Validation('FR12345678910');
        $countryCode = $vatValidation->getCountryCode();
        $this->assertEquals('FR', $countryCode);
    }

    public function testVatNumber() {
        $vatValidation = new Validation('FR12345678910');
        $number = $vatValidation->getVatNumber();
        $this->assertEquals('12345678910', $number);
    }

    public function testVatName() {
        $vatValidation = new Validation('FR12345678910');
        $number = $vatValidation->getName();
        $this->assertEquals('---', $number);
    }

    public function testVatAddress() {
        $vatValidation = new Validation('FR12345678910');
        $address = $vatValidation->getAddress();
        $this->assertEquals('---', $address);
    }

    public function testTraderName() {
        $vatValidation = new Validation('FR12345678910');
        $traderName = $vatValidation->getTraderName();
        $this->assertEquals('---', $traderName);
    }

    public function testTraderCompanyType() {
        $vatValidation = new Validation('FR12345678910');
        $traderCompanyType = $vatValidation->getTraderCompanyType();
        $this->assertEquals('---', $traderCompanyType);
    }

    public function testTraderAddress() {
        $vatValidation = new Validation('FR12345678910');
        $traderAddress = $vatValidation->getTraderAddress();
        $this->assertEquals('---', $traderAddress);
    }

}