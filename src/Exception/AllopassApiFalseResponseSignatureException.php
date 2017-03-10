<?php
/**
 * @file AllopassApiFalseResponseSignatureException.php
 * File of the class AllopassApiFalseResponseSignatureException
 */

namespace AllopassApiKit\Exception;

/**
 * Class of an exception for a false response signature
 *
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2009 (c) Hi-media
 */
class AllopassApiFalseResponseSignatureException extends AllopassApiException
{
    /**
     * Exception code
     */
    const CODE = 2;
    /**
     * Exception definition
     */
    const MESSAGE = 'The signature of the response is false, possible hack attempt';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE);
    }
}