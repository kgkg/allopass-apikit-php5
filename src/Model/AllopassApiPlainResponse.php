<?php
/**
 * @file AllopassApiPlainResponse.php
 * File of the class AllopassApiPlainResponse
 */

namespace AllopassApiKit\Model;

/**
 * Class defining a plain API response
 *
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2009 (c) Hi-media
 */
class AllopassApiPlainResponse extends AllopassApiResponse
{
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
}