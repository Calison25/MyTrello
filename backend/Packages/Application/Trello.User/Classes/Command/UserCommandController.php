<?php
namespace Trello\User\Command;

/*
 * This file is part of the Trello.User package.
 */

use GuzzleHttp\Client;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Cli\CommandController;
use Trello\User\Domain\Model\User;

/**
 * @Flow\Scope("singleton")
 */
class UserCommandController extends CommandController
{

}
