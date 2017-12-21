<?php 
namespace Neos\FluidAdaptor\Core\Parser\SyntaxTree\Expression;

/*
 * This file is part of the Neos.FluidAdaptor package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\Expression\AbstractExpressionNode;
use TYPO3Fluid\Fluid\Core\Parser\SyntaxTree\Expression\ExpressionNodeInterface;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * A node representing an additional namespace declaration inside the template.
 */
class LegacyNamespaceExpressionNode_Original extends AbstractExpressionNode implements ExpressionNodeInterface
{
    /**
     * Pattern which detects namespace declarations made inline.
     * syntax, e.g. {namespace neos=TYPO3\Neos\ViewHelpers}.
     */
    public static $detectionExpression = '/{namespace\\s*([a-z0-9]+)\\s*=\\s*([a-z0-9_\\\\]+)\\s*}/i';

    /**
     * Evaluates the expression stored in this node, in the context of $renderingcontext.
     *
     * @param RenderingContextInterface $renderingContext
     * @param string $expression
     * @param array $matches
     * @return mixed
     */
    public static function evaluateExpression(RenderingContextInterface $renderingContext, $expression, array $matches)
    {
        $renderingContext->getViewHelperResolver()->addNamespace($matches[1], $matches[2]);
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\FluidAdaptor\Core\Parser\SyntaxTree\Expression;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * A node representing an additional namespace declaration inside the template.
 */
class LegacyNamespaceExpressionNode extends LegacyNamespaceExpressionNode_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param string $expression The original expression that created this node.
     * @param array $matches Matches extracted from expression
     * @throws Parser\Exception
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $expression in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $matches in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
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
  'expression' => 'string',
  'matches' => 'array',
  'childNodes' => 'NodeInterface[]',
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
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.FluidAdaptor/Classes/Core/Parser/SyntaxTree/Expression/LegacyNamespaceExpressionNode.php
#