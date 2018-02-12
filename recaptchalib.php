<?php

# PHPreCAPTCHA v0.1
# GNU General Public License v3.0
# This is a PHP library for Google's reCAPTCHA 2.0
# Created by Martin Georgiev, geeorgiev[at]gmail.com
# Web: www.viziongames.com

/**
 * recaptchalib class
 */
class recaptchalib
{
    /**
     * @var string
     */
    protected $glSecret;

    /**
     * @var string
     */
    protected $glURL;

    function __construct()
    {
        $this->glSecret = '<yoursecret>';
        $this->glURL = 'https://www.google.com/recaptcha/api/siteverify';
    }

    /**
     * Validating reCAPTCHA response
     * Response is collected from $_POST["g-recaptcha-response"]
     *
     * @param string $response
     * @return booleans
     */
    public function isValid($response)
    {
        $data = array(
            'secret' => $this->glSecret,
            'response' => $response
        );

        $options = array(
            'http' => array (
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);

        return $captcha_success->success;
    }
}