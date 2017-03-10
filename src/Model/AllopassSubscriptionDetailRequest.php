<?php
/**
 * @file AllopassSubscriptionDetailRequest.php
 * File of the class AllopassSubscriptionDetailRequest
 */

namespace AllopassApiKit\Model;

/**
 * Class providing a subscription detail API request
 *
 * @author Mathieu Robert <mrobert@hi-media.com>
 *
 * @date 2011 (c) Hi-media
 */
class AllopassSubscriptionDetailRequest extends AllopassApiRequest
{
    /**
     * Route path of the API
     */
    const PATH = 'subscription';

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
     * @return AllopassSubscriptionDetailResponse A new response
     */
    protected function _newResponse($signature, $headers, $body)
    {
        return new AllopassSubscriptionDetailResponse($signature, $headers, $body);
    }
}