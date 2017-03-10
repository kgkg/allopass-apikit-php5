<?php
/**
 * @file AllopassAPI.php
 * File of the class AllopassAPI
 */

namespace AllopassApiKit\Api;

use AllopassApiKit\Model\AllopassApiConf;
use AllopassApiKit\Model\AllopassApiResponse;
use AllopassApiKit\Model\AllopassOnetimeButtonRequest;
use AllopassApiKit\Model\AllopassOnetimeDiscreteButtonRequest;
use AllopassApiKit\Model\AllopassOnetimeDiscretePricingRequest;
use AllopassApiKit\Model\AllopassOnetimePricingRequest;
use AllopassApiKit\Model\AllopassOnetimeValidateCodesRequest;
use AllopassApiKit\Model\AllopassProductDetailRequest;
use AllopassApiKit\Model\AllopassSubscriptionDetailRequest;
use AllopassApiKit\Model\AllopassSubscriptionLoginRequest;
use AllopassApiKit\Model\AllopassTransactionDetailRequest;
use AllopassApiKit\Model\AllopassTransactionMerchantRequest;
use AllopassApiKit\Model\AllopassTransactionPrepareRequest;

/**
 * Class providing a convenient way to make Allopass API requests
 *
 * @author Mathieu Robert <mrobert@hi-media.com>
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2011 (c) Hi-media
 */
class AllopassAPI
{
    /**
     * Email of the configurated account
     */
    private $_configurationEmailAccount;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param string $privateKey
     * @internal param string $configurationEmailAccount Email of the configurated account
     * If email is null, the first account is considered
     */
    public function __construct($apiKey, $privateKey)
    {
        $this->_configurationEmailAccount = '';

        AllopassApiConf::getInstance()
            ->setApiKey($apiKey)
            ->setPrivateKey($privateKey);
    }

    /**
     * Method for changing the configuration account email
     *
     * @param string $configurationEmailAccount Email of the configurated account
     * If email is null, the first account is considered
     *
     * @return AllopassAPI The class instance
     */
    public function setConfigurationEmailAccount($configurationEmailAccount)
    {
        $this->_configurationEmailAccount = $configurationEmailAccount;

        return $this;
    }

    /**
     * Method performing a onetime pricing request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassOnetimePricingResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getOnetimePricing(array('site_id' => 127042, 'country' => 'FR'));
     * echo $response->getWebsite()->getName(), "\n-----\n";
     * foreach ($response->getCountries() as $country) {
     *   echo $country->getCode(), "\n-----\n";
     *   echo $country->getName(), "\n-----\n";
     * }
     * @endcode
     */
    public function getOnetimePricing(array $parameters, $mapping = true)
    {
        $request = new AllopassOnetimePricingRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a onetime discrete pricing request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassOnetimePricingResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getOnetimeDiscretePricing(array('site_id' => 127042, 'country' => 'FR', 'amount' => 12));
     * echo $response->getWebsite()->getName(), "\n-----\n";
     * foreach ($response->getCountries() as $country) {
     *   echo $country->getCode(), "\n-----\n";
     *   echo $country->getName(), "\n-----\n";
     * }
     * @endcode
     */
    public function getOnetimeDiscretePricing(array $parameters, $mapping = true)
    {
        $request = new AllopassOnetimeDiscretePricingRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a onetime validate codes request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassOnetimeValidateCodesResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->validateCodes(array('site_id' => 127042, 'product_id' => 354926, 'code' => array('9M7QU457')));
     * echo $response->getStatus(), "\n-----\n";
     * echo $response->getStatusDescription(), "\n-----\n";
     * @endcode
     */
    public function validateCodes(array $parameters, $mapping = true)
    {
        $request = new AllopassOnetimeValidateCodesRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a onetime button request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassOnetimeButtonResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->createButton(array('site_id' => 127042, 'product_name' => 'premium sms access', 'forward_url'=> 'http://product-page.com', 'amount' => 3, 'reference_currency' => 'EUR', 'price_mode' => 'price', 'price_policy' => 'high-only'));
     * echo $response->getButtonId(), "\n-----\n";
     * echo $response->getBuyUrl(), "\n-----\n";
     * @endcode
     */
    public function createButton(array $parameters, $mapping = true)
    {
        $request = new AllopassOnetimeButtonRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a onetime discrete button request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassOnetimeButtonResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->createDiscreteButton(array('site_id' => 127042, 'product_name' => 'discrete premium sms access', 'forward_url'=> 'http://product-page.com', 'amount' => 3, 'reference_currency' => 'EUR', 'price_mode' => 'price', 'price_policy' => 'high-only'));
     * echo $response->getButtonId(), "\n-----\n";
     * echo $response->getBuyUrl(), "\n-----\n";
     * @endcode
     */
    public function createDiscreteButton(array $parameters, $mapping = true)
    {
        $request = new AllopassOnetimeDiscreteButtonRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a product detail request
     *
     * @param integer $id The product id
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassProductDetailResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getProduct(354926);
     * echo $response->getName(), "\n-----\n";
     * @endcode
     */
    public function getProduct($id, array $parameters = [], $mapping = true)
    {
        $request = new AllopassProductDetailRequest(['id' => $id] + $parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a transaction prepare request
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassTransactionPrepareResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->prepareTransaction(array('site_id' => 127042, 'pricepoint_id' => 2, 'product_name' => 'premium calling product', 'forward_url' => 'http://product-page.com'));
     * echo $response->getBuyUrl(), "\n-----\n";
     * echo $response->getCheckoutButton(), "\n-----\n";
     * @endcode
     */
    public function prepareTransaction(array $parameters, $mapping = true)
    {
        $request = new AllopassTransactionPrepareRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a transaction detail request based on the transaction id
     *
     * @param string $id The transaction id
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassTransactionDetailResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getTransaction('3f5506ac-5345-45e4-babb-96570aafdf6a');
     * echo $response->getPaid()->getCurrency(), "\n-----\n";
     * echo $response->getPaid()->getAmount(), "\n-----\n";
     * @endcode
     */
    public function getTransaction($id, array $parameters = [], $mapping = true)
    {
        $request = new AllopassTransactionDetailRequest(['id' => $id] + $parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a transaction detail request based on the merchant transaction id
     *
     * @param string $id The merchant transaction id
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassTransactionDetailResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getTransactionMerchant('TRX20091112134569B8');
     * echo $response->getPaid()->getCurrency(), "\n-----\n";
     * echo $response->getPaid()->getAmount(), "\n-----\n";
     * @endcode
     */
    public function getTransactionMerchant($id, array $parameters = [], $mapping = true)
    {
        $request = new AllopassTransactionMerchantRequest(['id' => $id] + $parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a subscription login request based on the sid
     *
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     *
     * @return AllopassApiResponse The API call response
     * Will be a AllopassSubscriptionLoginResponse instance if mapping is true, an AllopassApiPlainResponse if not
     *
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->loginSubscription(array('site_id' => 127042, 'sid' => 'd5425009734ea2801c0389c7bc2f8be4'));
     * echo $response->getStatus(), "\n-----\n";
     * echo $response->getStatusDescription(), "\n-----\n";
     * @endcode
     */
    public function loginSubscription(array $parameters = [], $mapping = true)
    {
        $request = new AllopassSubscriptionLoginRequest($parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }

    /**
     * Method performing a subscription detail request based on the subscriber_reference
     *
     * @param $subscriberReference
     * @param array $parameters Query string parameters of the API call
     * @param boolean $mapping Should the response be an object mapping or a plain response
     * @return AllopassApiResponse The API call response
     * Will be a AllopassSubscriptionDetailResponse instance if mapping is true, an AllopassApiPlainResponse if not
     * @code
     * require_once 'apikit/php5/api/AllopassAPI.php';
     * $api = new AllopassAPI();
     * $response = $api->getSubscription('Z556W642');
     * echo $response->getStatus(), "\n-----\n";
     * echo $response->getStatusDescription(), "\n-----\n";
     * echo $response->getAccessType(), "\n-----\n";
     * echo $response->getSubscriberReference(), "\n-----\n";
     * @endcode
     */
    public function getSubscription($subscriberReference, array $parameters = [], $mapping = true)
    {
        $request = new AllopassSubscriptionDetailRequest(['subscriber_reference' => $subscriberReference] + $parameters, $mapping, $this->_configurationEmailAccount);

        return $request->call();
    }
}
