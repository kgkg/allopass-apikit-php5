<?php
/**
 * @file AllopassPartner.php
 * File of the class AllopassPartner
 */

namespace AllopassApiKit\Model;

use SimpleXMLElement;

/**
 * Class providing object mapping of a partner item
 *
 * @author Jérémy Langlais <jlanglais@hi-media.com>
 *
 * @date 2009 (c) Hi-media
 */
class AllopassPartner
{
    /**
     * (SimpleXMLElement) SimpleXML object representation of the item
     */
    private $_xml;


    /**
     * Constructor
     *
     * @param SimpleXMLElement $xml The SimpleXML object representation of the item
     */
    public function __construct(SimpleXMLElement $xml)
    {
        $this->_xml = $xml;
    }

    /**
     * Method retrieving the partner id
     *
     * @return integer The partner id
     */
    public function getId()
    {
        return (integer)$this->_xml->attributes()->id;
    }

    /**
     * Method retrieving the partner share amount
     *
     * @return float The partner share amount
     */
    public function getShare()
    {
        return (float)$this->_xml->attributes()->share;
    }

    /**
     * Method retrieving the partner map id
     *
     * @return integer The partner map id
     */
    public function getMap()
    {
        return (integer)$this->_xml->attributes()->map;
    }
}