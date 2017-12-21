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
use Neos\Error\Messages\Result as ErrorResult;
use Neos\Utility\TypeHandling;

/**
 * A generic collection validator.
 *
 * @api
 */
class CollectionValidator_Original extends GenericObjectValidator
{
    /**
     * @var array
     */
    protected $supportedOptions = [
        'elementValidator' => [null, 'The validator type to use for the collection elements', 'string'],
        'elementValidatorOptions' => array([], 'The validator options to use for the collection elements', 'array'),
        'elementType' => [null, 'The type of the elements in the collection', 'string'],
        'validationGroups' => [null, 'The validation groups to link to', 'string'],
    ];

    /**
     * @var \Neos\Flow\Validation\ValidatorResolver
     * @Flow\Inject
     */
    protected $validatorResolver;

    /**
     * Checks if the given value is valid according to the validator, and returns
     * the Error Messages object which occurred.
     *
     * @param mixed $value The value that should be validated
     * @return ErrorResult
     * @api
     */
    public function validate($value)
    {
        $this->result = new ErrorResult();

        if ($this->acceptsEmptyValues === false || $this->isEmpty($value) === false) {
            if ($value instanceof \Doctrine\ORM\PersistentCollection && !$value->isInitialized()) {
                return $this->result;
            } elseif ((is_object($value) && !TypeHandling::isCollectionType(get_class($value))) && !is_array($value)) {
                $this->addError('The given subject was not a collection.', 1317204797);
                return $this->result;
            } elseif (is_object($value) && $this->isValidatedAlready($value)) {
                return $this->result;
            } else {
                $this->isValid($value);
            }
        }
        return $this->result;
    }

    /**
     * Checks for a collection and if needed validates the items in the collection.
     * This is done with the specified element validator or a validator based on
     * the given element type and validation group.
     *
     * Either elementValidator or elementType must be given, otherwise validation
     * will be skipped.
     *
     * @param mixed $value A collection to be validated
     * @return void
     */
    protected function isValid($value)
    {
        foreach ($value as $index => $collectionElement) {
            if (isset($this->options['elementValidator'])) {
                $collectionElementValidator = $this->validatorResolver->createValidator($this->options['elementValidator'], $this->options['elementValidatorOptions']);
            } elseif (isset($this->options['elementType'])) {
                if (isset($this->options['validationGroups'])) {
                    $collectionElementValidator = $this->validatorResolver->getBaseValidatorConjunction($this->options['elementType'], $this->options['validationGroups']);
                } else {
                    $collectionElementValidator = $this->validatorResolver->getBaseValidatorConjunction($this->options['elementType']);
                }
            } else {
                return;
            }
            if ($collectionElementValidator instanceof ObjectValidatorInterface) {
                $collectionElementValidator->setValidatedInstancesContainer($this->validatedInstancesContainer);
            }
            $this->result->forProperty($index)->merge($collectionElementValidator->validate($collectionElement));
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
 * A generic collection validator.
 */
class CollectionValidator extends CollectionValidator_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     * @param array $options Options for the validator
     * @throws InvalidValidationOptionsException if unsupported options are found
     */
    public function __construct()
    {
        $arguments = func_get_args();
        call_user_func_array('parent::__construct', $arguments);
        if ('Neos\Flow\Validation\Validator\CollectionValidator' === get_class($this)) {
            $this->Flow_Proxy_injectProperties();
        }
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
  'supportedOptions' => 'array',
  'validatorResolver' => '\\Neos\\Flow\\Validation\\ValidatorResolver',
  'propertyValidators' => 'array',
  'validatedInstancesContainer' => '\\SplObjectStorage',
  'acceptsEmptyValues' => 'boolean',
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

        $this->Flow_setRelatedEntities();
        $this->Flow_Proxy_injectProperties();
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Validation\ValidatorResolver', 'Neos\Flow\Validation\ValidatorResolver', 'validatorResolver', 'e992f50de62d81bfe770d5c5f1242621', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Validation\ValidatorResolver'); });
        $this->Flow_Injected_Properties = array (
  0 => 'validatorResolver',
);
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Validation/Validator/CollectionValidator.php
#