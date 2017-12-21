<?php 
namespace Neos\Flow\Security\Aspect;

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
use Neos\Flow\Aop\JoinPointInterface;
use Neos\Flow\Security\Authorization\Interceptor\PolicyEnforcement;
use Neos\Flow\Security\Context;

/**
 * The central security aspect, that invokes the security interceptors.
 *
 * @Flow\Scope("singleton")
 * @Flow\Aspect
 */
class PolicyEnforcementAspect_Original
{
    /**
     * The policy enforcement interceptor
     *
     * @var PolicyEnforcement
     */
    protected $policyEnforcementInterceptor;

    /**
     * @var Context
     */
    protected $securityContext;

    /**
     * @param PolicyEnforcement $policyEnforcementInterceptor The policy enforcement interceptor
     * @param Context $securityContext
     */
    public function __construct(PolicyEnforcement $policyEnforcementInterceptor, Context $securityContext)
    {
        $this->policyEnforcementInterceptor = $policyEnforcementInterceptor;
        $this->securityContext = $securityContext;
    }

    /**
     * The policy enforcement advice. This advices applies the security enforcement interceptor to all methods configured in the policy.
     * Note: If we have some kind of "run as" functionality in the future, we would have to manipulate the security context
     * before calling the policy enforcement interceptor
     *
     * @Flow\Around("filter(Neos\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter)")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return mixed The result of the target method if it has not been intercepted
     */
    public function enforcePolicy(JoinPointInterface $joinPoint)
    {
        if ($this->securityContext->areAuthorizationChecksDisabled() !== true) {
            $this->policyEnforcementInterceptor->setJoinPoint($joinPoint);
            $this->policyEnforcementInterceptor->invoke();
        }

        return $joinPoint->getAdviceChain()->proceed($joinPoint);
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Security\Aspect;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * The central security aspect, that invokes the security interceptors.
 * @\Neos\Flow\Annotations\Scope("singleton")
 * @\Neos\Flow\Annotations\Aspect
 */
class PolicyEnforcementAspect extends PolicyEnforcementAspect_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param PolicyEnforcement $policyEnforcementInterceptor The policy enforcement interceptor
     * @param Context $securityContext
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (get_class($this) === 'Neos\Flow\Security\Aspect\PolicyEnforcementAspect') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Security\Aspect\PolicyEnforcementAspect', $this);

        if (!array_key_exists(0, $arguments)) $arguments[0] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Security\Authorization\Interceptor\PolicyEnforcement');
        if (!array_key_exists(1, $arguments)) $arguments[1] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Security\Context');
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $policyEnforcementInterceptor in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $securityContext in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
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
  'policyEnforcementInterceptor' => 'Neos\\Flow\\Security\\Authorization\\Interceptor\\PolicyEnforcement',
  'securityContext' => 'Neos\\Flow\\Security\\Context',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Neos\Flow\Security\Aspect\PolicyEnforcementAspect') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Security\Aspect\PolicyEnforcementAspect', $this);

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Security/Aspect/PolicyEnforcementAspect.php
#