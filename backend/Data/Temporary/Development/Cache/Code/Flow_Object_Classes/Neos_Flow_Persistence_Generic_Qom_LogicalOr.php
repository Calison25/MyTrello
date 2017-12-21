<?php 
namespace Neos\Flow\Persistence\Generic\Qom;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */


/**
 * Performs a logical disjunction of two other constraints.
 *
 * To satisfy the Or constraint, the tuple must either:
 *  satisfy constraint1 but not constraint2, or
 *  satisfy constraint2 but not constraint1, or
 *  satisfy both constraint1 and constraint2.
 *
 * @api
 */
class LogicalOr_Original extends Constraint
{
    /**
     * @var Constraint
     */
    protected $constraint1;

    /**
     * @var Constraint
     */
    protected $constraint2;

    /**
     *
     * @param Constraint $constraint1
     * @param Constraint $constraint2
     */
    public function __construct(Constraint $constraint1, Constraint $constraint2)
    {
        $this->constraint1 = $constraint1;
        $this->constraint2 = $constraint2;
    }

    /**
     * Gets the first constraint.
     *
     * @return Constraint the constraint; non-null
     * @api
     */
    public function getConstraint1()
    {
        return $this->constraint1;
    }

    /**
     * Gets the second constraint.
     *
     * @return Constraint the constraint; non-null
     * @api
     */
    public function getConstraint2()
    {
        return $this->constraint2;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Persistence\Generic\Qom;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Performs a logical disjunction of two other constraints.
 * 
 * To satisfy the Or constraint, the tuple must either:
 *  satisfy constraint1 but not constraint2, or
 *  satisfy constraint2 but not constraint1, or
 *  satisfy both constraint1 and constraint2.
 */
class LogicalOr extends LogicalOr_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param Constraint $constraint1
     * @param Constraint $constraint2
     */
    public function __construct()
    {
        $arguments = func_get_args();

        if (!array_key_exists(0, $arguments)) $arguments[0] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Persistence\Generic\Qom\Constraint');
        if (!array_key_exists(1, $arguments)) $arguments[1] = \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Persistence\Generic\Qom\Constraint');
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $constraint1 in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $constraint2 in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
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
  'constraint1' => 'Neos\\Flow\\Persistence\\Generic\\Qom\\Constraint',
  'constraint2' => 'Neos\\Flow\\Persistence\\Generic\\Qom\\Constraint',
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
# PathAndFilename: /var/www/trello/Packages/Framework/Neos.Flow/Classes/Persistence/Generic/Qom/LogicalOr.php
#