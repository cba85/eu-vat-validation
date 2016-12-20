<?php

namespace VatValidation;

use stdClass;
use SoapClient;

/**
 * Class Validation
 *
 * @package VatValidation
 */
class Validation
{

    /**
     * @const URL
     */
    const URL = 'http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl';

    /**
     * @var SoapClient
     */
    private $client;

    /**
     * @var vatId
     */
    private $vatId;

    /**
     * @var countryCode
     */
    private $countryCode;

    /**
     * @var vatNumber
     */
    private $vatNumber;

    /**
     * Validation constructor.
     *
     * @param $vatId
     */
    public function __construct($vatId)
    {
        $this->vatId = $vatId;
        $this->countryCode = $this->convertVatIdToCountryCode();
        $this->vatNumber = $this->convertVatIdToVatNumber();
        $this->client = new stdClass;
        $url = self::URL;
        $this->client = new SoapClient($url);
    }

    /**
     * Convert VAT Id to Country Code
     *
     * @return mixed
     */
    public function convertVatIdToCountryCode() {
        $countryCode = substr($this->vatId, 0, 2);
        return $countryCode;
    }

    /**
     * Convert VAT Id to VAT Number
     *
     * @return mixed
     */
    public function convertVatIdToVatNumber() {
        $vatNumber = substr($this->vatId, 2, 11);
        return $vatNumber;
    }

    /**
     * Check VAT
     *
     * @return mixed
     */
    public function checkVat()
    {
        try {
            $response = $this->client->checkVat([
                'countryCode' => $this->countryCode,
                'vatNumber' => $this->vatNumber,
            ]);
        } catch(Exception $e){
            print_r($e);
        }
        return $response;
    }

    /**
     * Check VAT Approx
     *
     * @return mixed
     */
    public function checkVatApprox() {
        try {
            $response = $this->client->checkVatApprox([
                'countryCode' => $this->countryCode,
                'vatNumber' => $this->vatNumber,
            ]);
        } catch(Exception $e){
            print_r($e);
        }
        return $response;
    }

    /**
     * Is a VAT Number valid ?
     *
     * @return bool
     */
    public function isValid() {
        $response = $this->checkVat();
        $response->valid ? $valid = true : $valid = false;
        return $valid;
    }

    /**
     * Get country code of a VAT ID
     *
     * @return bool
     */
    public function getCountryCode() {
        $response = $this->checkVat();
        return $response->countryCode;
    }

    /**
     * Get VAT Number of a VAT ID
     *
     * @return mixed
     */
    public function getVatNumber() {
        $response = $this->checkVat();
        return $response->vatNumber;
    }

    /**
     * Get name of a VAT ID
     *
     * @return mixed
     */
    public function getName() {
        $response = $this->checkVat();
        return $response->name;
    }

    /**
     * Get address of a VAT ID
     *
     * @return mixed
     */
    public function getAddress() {
        $response = $this->checkVat();
        return $response->address;
    }

    /**
     * Get trader name of a VAT ID
     *
     * @return mixed
     */
    public function getTraderName() {
        $response = $this->checkVatApprox();
        return $response->traderName;
    }

    /**
     * Get trader company type of a VAT ID
     *
     * @return mixed
     */
    public function getTraderCompanyType() {
        $response = $this->checkVatApprox();
        return $response->traderCompanyType;
    }

    /**
     * Get trader address of a VAT ID
     *
     * @return mixed
     */
    public function getTraderAddress() {
        $response = $this->checkVatApprox();
        return $response->traderAddress;
    }

}