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
 * A validator for labels.
 *
 * Labels usually allow all kinds of letters, numbers, punctuation marks and
 * the space character. What you don't want in labels though are tabs, new
 * line characters or HTML tags. This validator is for such uses.
 *
 * @api
 * @Flow\Scope("singleton")
 */
class LabelValidator_Original extends AbstractValidator
{
    const PATTERN_VALIDCHARACTERS = '/^[\p{L}\p{Sc} ,.:;?!%§&"\'\/+\-_=\(\)#0-9]*$/u';

    /**
     * The given value is valid if it matches the regular expression specified in PATTERN_VALIDCHARACTERS.
     *
     * @param mixed $value The value that should be validated
     * @return void
     * @api
     */
    protected function isValid($value)
    {
        if (preg_match(self::PATTERN_VALIDCHARACTERS, $value) === 0) {
            $this->addError('Only letters, numbers, spaces and certain punctuation marks are expected.', 1272298003);
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
 * A validator for labels.
 * 
 * Labels usually allow all kinds of letters, numbers, punctuation marks and
 * the space character. What you don't want in labels though are tabs, new
 * line characters or HTML tags. This validator is for such uses.
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class LabelValidator extends LabelValidator_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param array $options Options for the validator
     * @throws InvalidValidationOptionsException if unsupported options are found
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (get_class($this) === 'Neos\Flow\Validation\Validator\LabelValidator') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Validation\Validator\LabelValidator', $this);
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
        if (get_class($this) === 'Neos\Flow\Validation\Validator\LabelValidator') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Validation\Validator\LabelValidator', $this);

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Validation/Validator/LabelValidator.php
#