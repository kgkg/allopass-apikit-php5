<?php
/**
 * @file AllopassSubscriptionLoginResponse.php
 * File of the class AllopassSubscriptionLoginResponse
 */

namespace AllopassApiKit\Model;

/**
 * Class defining subscription login request's response
 *
 * @author Mathieu Robert <mrobert@hi-media.com>
 *
 * @date 2011 (c) Hi-media
 */
class AllopassSubscriptionLoginResponse extends AllopassApiMappingResponse
{
    /**
     * The login is successful
     */
    const LOGIN_SUCCESS = 0;

    /**
     * The login failed
     */
    const LOGIN_FAILED = 1;


    /**
     * Constructor
     *
     * @param string $signature Expected response signature
     * @param string $headers HTTP headers of the response
     * @param string $body Raw data of the response
     */
    public function __construct($signature, $headers, $body)
    {
        parent::__construct($signature, $headers, $body);
    }

    /**
     * Method retrieving the validation status
     *
     * @return integer The validation status
     */
    public function getStatus()
    {
        return (integer)$this->_xml->status;
    }

    /**
     * Method retrieving the validation status description
     *
     * @return string The validation status description
     */
    public function getStatusDescription()
    {
        return (string)$this->_xml->status_description;
    }
}