<?php 
namespace Neos\Flow\Session\Aspect;

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
use Neos\Flow\Log\SystemLoggerInterface;
use Neos\Flow\Session\SessionInterface;

/**
 * An aspect which centralizes the logging of important session actions.
 *
 * @Flow\Aspect
 * @Flow\Scope("singleton")
 */
class LoggingAspect_Original
{
    /**
     * @var SystemLoggerInterface
     * @Flow\Inject
     */
    protected $systemLogger;

    /**
     * Logs calls of start()
     *
     * @Flow\After("within(Neos\Flow\Session\SessionInterface) && method(.*->start())")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return mixed The result of the target method if it has not been intercepted
     */
    public function logStart(JoinPointInterface $joinPoint)
    {
        $session = $joinPoint->getProxy();
        if ($session->isStarted()) {
            $this->systemLogger->log(sprintf('%s: Started session with id %s.', $this->getClassName($joinPoint), $session->getId()), LOG_INFO);
        }
    }

    /**
     * Logs calls of resume()
     *
     * @Flow\After("within(Neos\Flow\Session\SessionInterface) && method(.*->resume())")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return mixed The result of the target method if it has not been intercepted
     */
    public function logResume(JoinPointInterface $joinPoint)
    {
        $session = $joinPoint->getProxy();
        if ($session->isStarted()) {
            $inactivityInSeconds = $joinPoint->getResult();
            if ($inactivityInSeconds === 1) {
                $inactivityMessage = '1 second';
            } elseif ($inactivityInSeconds < 120) {
                $inactivityMessage = sprintf('%s seconds', $inactivityInSeconds);
            } elseif ($inactivityInSeconds < 3600) {
                $inactivityMessage = sprintf('%s minutes', intval($inactivityInSeconds / 60));
            } elseif ($inactivityInSeconds < 7200) {
                $inactivityMessage = 'more than an hour';
            } else {
                $inactivityMessage = sprintf('more than %s hours', intval($inactivityInSeconds / 3600));
            }
            $this->systemLogger->log(sprintf('%s: Resumed session with id %s which was inactive for %s. (%ss)', $this->getClassName($joinPoint), $joinPoint->getProxy()->getId(), $inactivityMessage, $inactivityInSeconds), LOG_DEBUG);
        }
    }

    /**
     * Logs calls of destroy()
     *
     * @Flow\Before("within(Neos\Flow\Session\SessionInterface) && method(.*->destroy())")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return mixed The result of the target method if it has not been intercepted
     */
    public function logDestroy(JoinPointInterface $joinPoint)
    {
        $session = $joinPoint->getProxy();
        if ($session->isStarted()) {
            $reason = $joinPoint->isMethodArgument('reason') ? $joinPoint->getMethodArgument('reason') : 'no reason given';
            $this->systemLogger->log(sprintf('%s: Destroyed session with id %s: %s', $this->getClassName($joinPoint), $joinPoint->getProxy()->getId(), $reason), LOG_INFO);
        }
    }

    /**
     * Logs calls of renewId()
     *
     * @Flow\Around("within(Neos\Flow\Session\SessionInterface) && method(.*->renewId())")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return mixed The result of the target method if it has not been intercepted
     */
    public function logRenewId(JoinPointInterface $joinPoint)
    {
        $session = $joinPoint->getProxy();
        $oldId = $session->getId();
        $newId = $joinPoint->getAdviceChain()->proceed($joinPoint);
        if ($session->isStarted()) {
            $this->systemLogger->log(sprintf('%s: Changed session id from %s to %s', $this->getClassName($joinPoint), $oldId, $newId), LOG_INFO);
        }
        return $newId;
    }

    /**
     * Logs calls of collectGarbage()
     *
     * @Flow\AfterReturning("within(Neos\Flow\Session\SessionInterface) && method(.*->collectGarbage())")
     * @param JoinPointInterface $joinPoint The current joinpoint
     * @return void
     */
    public function logCollectGarbage(JoinPointInterface $joinPoint)
    {
        $sessionRemovalCount = $joinPoint->getResult();
        if ($sessionRemovalCount > 0) {
            $this->systemLogger->log(sprintf('%s: Triggered garbage collection and removed %s expired sessions.', $this->getClassName($joinPoint), $sessionRemovalCount), LOG_INFO);
        } elseif ($sessionRemovalCount === 0) {
            $this->systemLogger->log(sprintf('%s: Triggered garbage collection but no sessions needed to be removed.', $this->getClassName($joinPoint)), LOG_INFO);
        } elseif ($sessionRemovalCount === false) {
            $this->systemLogger->log(sprintf('%s: Ommitting garbage collection because another process is already running. Consider lowering the GC propability if these messages appear a lot.', $this->getClassName($joinPoint)), LOG_WARNING);
        }
    }

    /**
     * Determines the short or full class name of the session implementation
     *
     * @param JoinPointInterface $joinPoint
     * @return string
     */
    protected function getClassName(JoinPointInterface $joinPoint)
    {
        $className = $joinPoint->getClassName();
        $sessionNamespace = substr(SessionInterface::class, 0, -strrpos(SessionInterface::class, '\\') + 1);
        if (strpos($className, $sessionNamespace) === 0) {
            $className = substr($className, strlen($sessionNamespace));
        }
        return $className;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Session\Aspect;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * An aspect which centralizes the logging of important session actions.
 * @\Neos\Flow\Annotations\Aspect
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class LoggingAspect extends LoggingAspect_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        if (get_class($this) === 'Neos\Flow\Session\Aspect\LoggingAspect') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Session\Aspect\LoggingAspect', $this);
        if ('Neos\Flow\Session\Aspect\LoggingAspect' === get_class($this)) {
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
  'systemLogger' => 'Neos\\Flow\\Log\\SystemLoggerInterface',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Neos\Flow\Session\Aspect\LoggingAspect') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Session\Aspect\LoggingAspect', $this);

        $this->Flow_setRelatedEntities();
        $this->Flow_Proxy_injectProperties();
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Log\SystemLoggerInterface', 'Neos\Flow\Log\Logger', 'systemLogger', '717e9de4d0309f4f47c821b9257eb5c2', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Log\SystemLoggerInterface'); });
        $this->Flow_Injected_Properties = array (
  0 => 'systemLogger',
);
    }
}
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Session/Aspect/LoggingAspect.php
#