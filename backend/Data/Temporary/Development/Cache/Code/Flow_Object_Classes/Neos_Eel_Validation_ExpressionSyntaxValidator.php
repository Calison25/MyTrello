<?php 
namespace Neos\Eel\Validation;

use Neos\Eel\EelParser;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Validation\Validator\AbstractValidator;

/**
 * A validator which checks for the correct syntax of an eel expression (without the wrapping ${…}).
 * This is basically done by giving it to the parser and checking if its result is valid.
 *
 * @api
 */
class ExpressionSyntaxValidator_Original extends AbstractValidator
{
    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to Result.
     *
     * @param mixed $value
     * @return void
     * @api
     */
    protected function isValid($value)
    {
        $parser = new EelParser($value);
        $result = $parser->match_Expression();

        if ($result === false) {
            $this->addError('Expression "%s" could not be parsed.', 1421940748, [$value]);
        } elseif ($parser->pos !== strlen($value)) {
            $this->addError('Expression "%s" could not be parsed. Error starting at character %d: "%s".', 1421940760, [$value, $parser->pos, substr($value, $parser->pos)]);
        }
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Eel\Validation;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * A validator which checks for the correct syntax of an eel expression (without the wrapping ${…}).
 * This is basically done by giving it to the parser and checking if its result is valid.
 */
class ExpressionSyntaxValidator extends ExpressionSyntaxValidator_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

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

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Eel/Classes/Validation/ExpressionSyntaxValidator.php
#