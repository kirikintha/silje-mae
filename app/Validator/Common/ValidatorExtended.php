<?php

/**
 * @file Authorization
 *  Handle authorization through Sentry.
 */

namespace Validator\Common;

class ValidatorExtended extends \Illuminate\Validation\Validator {

    private $__messages = array(
        'geo_address' => ':attribute must be a valid address',
        'geo_city' => ':attribute must be a valid address, city',
        'geo_state_province' => ':attribute must be a valid state or province',
        'geo_country' => ':attribute must be a valid country',
        'geo_phone' => ':attribute must be a valid phone number',
        'log_path' => ':attribute must be a valid log path',
        'iam_access_key' => ':attribute must be a valid access key',
        'iam_secret_key' => ':attribute must be a valid secret key',
        'reqester' => ':attribute must be a valid requester',
        'alpha_spaces' => ':attribute cannot contain invalid characters',
        'alpha_name' => ':attribute cannot contain invalid characters',
        'case_diff' => ':attribute must have at least on uppercase character',
        'numbers' => ':attribute must have at least one numeric character',
        'letters' => ':attribute must have at least one letter',
        'symbols' => ':attribute must have at least one symbol',
        'identical_characters' => ':attribute cannot have too identical characters in a row',
    );

    public function __construct(\Symfony\Component\Translation\TranslatorInterface $translator, array $data, array $rules, array $messages = array(), array $customAttributes = array()) {
        parent::__construct($translator, $data, $rules, $messages, $customAttributes);
        $this->setCustomMessages($this->__messages);
    }

    //Vaidate address, allows for most special characters.
    public function validateGeoAddress($attribute, $value) {
        $pattern = '/[A-Za-z0-9\'\.\-\s\,\#]+/';
        return (bool) preg_match($pattern, $value);
    }

    public function validateGeoCity($attribute, $value) {
        $pattern = '/[A-Za-z0-9\'\.\-\s\,]+/';
        return (bool) preg_match($pattern, $value);
    }

    //Validate the Geo state and province. Big list!
    public function validateGeoStateProvince($attribute, $value) {
        $geo = new \Geo\Common\Geo;
        $provinces = $geo->getAllProvinces();
        if (in_array(html_entity_decode($value), $provinces)) {
            return true;
        }
        return false;
    }

    //Validate the Geo Country from an ISO 3 code.
    public function validateGeoCountry($attribute, $value) {
        $geo = new \Geo\Common\Geo;
        return (bool) $geo->getCountry($value);
    }

    //Validate a phone by regex.
    public function validateGeoPhone($attribute, $value) {
        $replaced = preg_replace('/[a-zA-z\(\).\+(ext|x)\s]/', '', $value);
        return is_numeric($replaced);
    }

    //Validate log path
    public function validateLogPath($attribute, $value) {
        return preg_match('/^[a-z0-9\/]+\/$/i', $value);
    }

    //validate AWS access key
    public function validateIamAccessKey($attribute, $value) {
        return preg_match('/^[A-Z0-9]+$/', $value);
    }

    //validate AWS secret key
    public function validateIamSecretKey($attribute, $value) {
        return preg_match('/^[a-z0-9\/\+]+$/i', $value);
    }

    //Log requesters, so they can have an arn as well as alphanumeric
    public function validateRequester($attribute, $value) {
        return preg_match('/^[a-z0-9\/\:\-]+$/i', $value);
    }

    //Vaidate alpha numeric spaces, plus unicode.
    public function validateAlphaSpaces($attribute, $value) {
        return $this->validateGeoAddress($attribute, $value);
    }

    //Validate a name is alpha compatible
    public function validateAlphaName($attribute, $value) {
        $pattern = '/[\pN\pL\'\-\s]+/';
        return (bool) preg_match($pattern, $value);
    }

    //--> Password Validation

    public function validateLetters($attribute, $value, $parameters) {
        return preg_match('/\pL/', $value);
    }

    public function validateNumbers($attribute, $value, $parameters) {
        return preg_match('/\pN/', $value);
    }

    public function validateCaseDiff($attribute, $value, $parameters) {
        return preg_match('/(\p{Ll}+.*\p{Lu})|(\p{Lu}+.*\p{Ll})/', $value);
    }

    public function validateSymbols($attribute, $value, $parameters) {
        return preg_match('/[!@#$%^&*?()\-_=+{};:,<.>]/', $value);
    }

    public function validateIdenticalCharacters($attribute, $value, $parameters) {
        if (preg_match('/(.)\\1{2}/', $value)) {
            return false;
        }
        return true;
    }

    //--> End Password Validation
}
