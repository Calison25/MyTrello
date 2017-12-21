<?php 
namespace Neos\FluidAdaptor\ViewHelpers\Form;

/*
 * This file is part of the Neos.FluidAdaptor package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */


/**
 * Creates a submit button.
 *
 * = Examples =
 *
 * <code title="Defaults">
 * <f:form.submit value="Send Mail" />
 * </code>
 * <output>
 * <input type="submit" />
 * </output>
 *
 * <code title="Dummy content for template preview">
 * <f:form.submit name="mySubmit" value="Send Mail"><button>dummy button</button></f:form.submit>
 * </code>
 * <output>
 * <input type="submit" name="mySubmit" value="Send Mail" />
 * </output>
 *
 * @api
 */
class SubmitViewHelper_Original extends AbstractFormFieldViewHelper
{
    /**
     * @var string
     */
    protected $tagName = 'input';

    /**
     * Initialize the arguments.
     *
     * @return void
     * @api
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerTagAttribute('disabled', 'string', 'Specifies that the input element should be disabled when the page loads');
        $this->registerUniversalTagAttributes();
    }

    /**
     * Renders the submit button.
     *
     * @return string
     * @api
     */
    public function render()
    {
        $name = $this->getName();
        $this->registerFieldNameForFormTokenGeneration($name);
        $this->addAdditionalIdentityPropertiesIfNeeded();

        $this->tag->addAttribute('type', 'submit');
        $this->tag->addAttribute('name', $name);
        $this->tag->addAttribute('value', $this->getValueAttribute(true));

        return $this->tag->render();
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\FluidAdaptor\ViewHelpers\Form;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Creates a submit button.
 * 
 * = Examples =
 * 
 * <code title="Defaults">
 * <f:form.submit value="Send Mail" />
 * </code>
 * <output>
 * <input type="submit" />
 * </output>
 * 
 * <code title="Dummy content for template preview">
 * <f:form.submit name="mySubmit" value="Send Mail"><button>dummy button</button></f:form.submit>
 * </code>
 * <output>
 * <input type="submit" name="mySubmit" value="Send Mail" />
 * </output>
 */
class SubmitViewHelper extends SubmitViewHelper_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        parent::__construct();
        if ('Neos\FluidAdaptor\ViewHelpers\Form\SubmitViewHelper' === get_class($this)) {
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
  'tagName' => 'string',
  'persistenceManager' => 'Neos\\Flow\\Persistence\\PersistenceManagerInterface',
  'escapeOutput' => 'boolean',
  'tag' => 'TYPO3Fluid\\Fluid\\Core\\ViewHelper\\TagBuilder',
  'controllerContext' => 'Neos\\Flow\\Mvc\\Controller\\ControllerContext',
  'objectManager' => 'Neos\\Flow\\ObjectManagement\\ObjectManagerInterface',
  'systemLogger' => 'Neos\\Flow\\Log\\SystemLoggerInterface',
  'argumentDefinitions' => 'ArgumentDefinition[]',
  'viewHelperNode' => 'TYPO3Fluid\\Fluid\\Core\\Parser\\SyntaxTree\\ViewHelperNode',
  'arguments' => 'array',
  'childNodes' => 'NodeInterface[] array',
  'templateVariableContainer' => 'TYPO3Fluid\\Fluid\\Core\\Variables\\VariableProviderInterface',
  'renderingContext' => 'TYPO3Fluid\\Fluid\\Core\\Rendering\\RenderingContextInterface',
  'renderChildrenClosure' => '\\Closure',
  'viewHelperVariableContainer' => 'TYPO3Fluid\\Fluid\\Core\\ViewHelper\\ViewHelperVariableContainer',
  'escapeChildren' => 'boolean',
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
        $this->injectPersistenceManager(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Persistence\PersistenceManagerInterface'));
        $this->injectTagBuilder(new \TYPO3Fluid\Fluid\Core\ViewHelper\TagBuilder());
        $this->injectObjectManager(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\ObjectManagement\ObjectManagerInterface'));
        $this->injectSystemLogger(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Log\SystemLoggerInterface'));
        $this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
  1 => 'tagBuilder',
  2 => 'objectManager',
  3 => 'systemLogger',
);
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.FluidAdaptor/Classes/ViewHelpers/Form/SubmitViewHelper.php
#