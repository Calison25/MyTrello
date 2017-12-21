<?php 
namespace Neos\Flow\Validation\Validator;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;

/**
 * Validator for alphanumeric strings.
 *
 * @api
 * @Flow\Scope("singleton")
 */
class AlphanumericValidator_Original extends AbstractValidator
{
    /**
     * The given $value is valid if it is an alphanumeric string, which is defined as [[:alnum:]].
     *
     * @param mixed $value The value that should be validated
     * @return void
     * @api
     */
    protected function isValid($value)
    {
        if (!is_string($value) || preg_match('/^[[:alnum:]]*$/u', $value) !== 1) {
            $this->addError('Only regular characters (a to z, umlauts, ...) and numbers are allowed.', 1221551320);
        }
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Validation\Validator;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Validator for alphanumeric strings.
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class AlphanumericValidator extends AlphanumericValidator_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param array $options Options for the validator
     * @throws InvalidValidationOptionsException if unsupported options are found
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (get_class($this) === 'Neos\Flow\Validation\Validator\AlphanumericValidator') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Validation\Validator\AlphanumericValidator', $this);
        call_user_func_array('parent::__construct', $arguments);
    }

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
  'acceptsEmptyValues' => 'boolean',
  'supportedOptions' => 'array',
  'options' => 'array',
  'result' => 'Neos\\Error\\Messages\\Result',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Neos\Flow\Validation\Validator\AlphanumericValidator') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Validation\Validator\AlphanumericValidator', $this);

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Validation/Validator/AlphanumericValidator.php
#