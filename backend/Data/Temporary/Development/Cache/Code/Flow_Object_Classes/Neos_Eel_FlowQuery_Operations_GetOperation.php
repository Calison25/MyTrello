<?php 
namespace Neos\Eel\FlowQuery\Operations;

/*
 * This file is part of the Neos.Eel package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Eel\FlowQuery\FlowQuery;
use Neos\Flow\Annotations as Flow;

/**
 * Get a (non-wrapped) element from the context.
 *
 * If FlowQuery is used, the result is always another FlowQuery. In case you
 * need to pass a FlowQuery result (and lazy evaluation does not work out) you
 * can use get() to unwrap the result from the "FlowQuery envelope".
 *
 * If no arguments are given, the full context is returned. Otherwise the
 * value contained in the context at the index given as argument is
 * returned. If no such index exists, NULL is returned.
 */
class GetOperation_Original extends AbstractOperation
{
    /**
     * {@inheritdoc}
     *
     * @var string
     */
    protected static $shortName = 'get';

    /**
     * {@inheritdoc}
     *
     * @var boolean
     */
    protected static $final = true;

    /**
     * {@inheritdoc}
     *
     * @param FlowQuery $flowQuery the FlowQuery object
     * @param array $arguments the context index to fetch from
     * @return mixed
     */
    public function evaluate(FlowQuery $flowQuery, array $arguments)
    {
        $context = $flowQuery->getContext();
        if (isset($arguments[0])) {
            $index = $arguments[0];
            if (isset($context[$index])) {
                return $context[$index];
            } else {
                return null;
            }
        } else {
            return $context;
        }
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Eel\FlowQuery\Operations;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Get a (non-wrapped) element from the context.
 * 
 * If FlowQuery is used, the result is always another FlowQuery. In case you
 * need to pass a FlowQuery result (and lazy evaluation does not work out) you
 * can use get() to unwrap the result from the "FlowQuery envelope".
 * 
 * If no arguments are given, the full context is returned. Otherwise the
 * value contained in the context at the index given as argument is
 * returned. If no such index exists, NULL is returned.
 */
class GetOperation extends GetOperation_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __sleep()
    {
            $result = NULL;
        $this->Flow_Object_PropertiesToSerialize = array();

        $transientProperties = array (
);
        $propertyVarTags = array (
  'shortName' => 'string',
  'final' => 'boolean',
  'priority' => 'integer',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Eel/Classes/FlowQuery/Operations/GetOperation.php
#