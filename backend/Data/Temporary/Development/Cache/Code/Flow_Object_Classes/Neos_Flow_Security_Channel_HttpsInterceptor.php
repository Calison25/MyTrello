<?php 
namespace Neos\Flow\Security\Channel;

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
use Neos\Flow\Log\SystemLoggerInterface;
use Neos\Flow\Security\Authentication\AuthenticationManagerInterface;
use Neos\Flow\Security\Authorization\InterceptorInterface;
use Neos\Flow\Security\Context;

/**
 * This security interceptor switches the current channel between HTTP and HTTPS protocol.
 *
 * @Flow\Scope("singleton")
 */
class HttpsInterceptor_Original implements InterceptorInterface
{
    /**
     * @var boolean
     * @todo this has to be set by configuration
     */
    protected $useSSL = false;

    /**
     * Constructor.
     *
     * @param Context $securityContext The current security context
     * @param AuthenticationManagerInterface $authenticationManager The authentication Manager
     * @param SystemLoggerInterface $logger A logger to log security relevant actions
     */
    public function __construct(
        Context $securityContext,
        AuthenticationManagerInterface $authenticationManager,
        SystemLoggerInterface $logger
    ) {
    }

    /**
     * Redirects the current request to HTTP or HTTPS depending on $this->useSSL;
     *
     * @return boolean TRUE if the security checks was passed
     */
    public function invoke()
    {
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Security\Channel;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * This security interceptor switches the current channel between HTTP and HTTPS protocol.
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class HttpsInterceptor extends HttpsInterceptor_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param Context $securityContext The current security context
     * @param AuthenticationManagerInterface $authenticationManager The authentication Manager
     * @param SystemLoggerInterface $logger A logger to log security relevant actions
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (get_class($this) === 'Neos\Flow\Security\Channel\HttpsInterceptor') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Security\Channel\HttpsInterceptor', $this);

        if (!array_key_exists(0, $arguments)) $arguments[0] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Security\Context');
        if (!array_key_exists(1, $arguments)) $arguments[1] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Security\Authentication\AuthenticationManagerInterface');
        if (!array_key_exists(2, $arguments)) $arguments[2] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Log\SystemLoggerInterface');
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $securityContext in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $authenticationManager in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
        if (!array_key_exists(2, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $logger in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
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
  'useSSL' => 'boolean',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Neos\Flow\Security\Channel\HttpsInterceptor') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Security\Channel\HttpsInterceptor', $this);

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Security/Channel/HttpsInterceptor.php
#