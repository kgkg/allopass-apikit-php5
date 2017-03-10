<?php
/**
 * @file AllopassApiException.php
 * File of the abstract class AllopassApiException
 */

namespace AllopassApiKit\Exception;

use Exception;

/**
 * Class defining the basis of an API Exception
 *
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2009 (c) Hi-media
 */
abstract class AllopassApiException extends Exception
{
    /**
     * Constructor
     *
     * @param string $message Exception description
     * @param integer $code Exception code
     */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}