<?php
/**
 * @file AllopassTransactionMerchantRequest.php
 * File of the class AllopassTransactionMerchantRequest
 */

namespace AllopassApiKit\Model;

/**
 * Class providing a transaction detail from merchant transaction id API request
 *
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2010 (c) Hi-media
 */
class AllopassTransactionMerchantRequest extends AllopassApiRequest
{
    /**
     * Route path of the API
     */
    const PATH = 'transaction/merchant';

    /**
     * Constructor
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     * @param string $emailAccount Email of the configurated account
     */
    public function __construct(array $parameters, $mapping = TRUE, $emailAccount = NULL)
    {
        parent::__construct($parameters, $mapping, $emailAccount);
    }

    /**
     * Provide a way to get the route of the request
     *
     * @return string The route of the request
     */
    protected function _getPath()
    {
        return self::PATH;
    }

    /**
     * Provide a way to get the wired response of the request
     *
     * @param string $signature Expected response signature
     * @param string $headers HTTP headers of the response
     * @param string $body Raw data of the response
     *
     * @return AllopassTransactionDetailResponse A new response
     */
    protected function _newResponse($signature, $headers, $body)
    {
        return new AllopassTransactionDetailResponse($signature, $headers, $body);
    }
}