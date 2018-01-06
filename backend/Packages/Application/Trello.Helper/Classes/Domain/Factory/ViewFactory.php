<?php

namespace Trello\Helper\Domain\Factory;

/*
 * This file is part of the Trello.Helper package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Http\Response;
use Neos\Flow\Mvc\View\ViewInterface;
use Trello\Helper\Domain\Model\ViewResponse;
use Trello\Helper\Service\ViewHelperService;

/**
 *
 */
class ViewFactory
{

    /**
     * @var ViewHelperService
     * @Flow\Inject
     */
    protected $viewHelperService;

    /**
     * @param ViewInterface $view
     * @param Response $response
     * @param $message
     * @param $success
     * @return ViewResponse
     */
    public function create(ViewInterface $view, Response $response, $message, $success)
    {
        $viewResponse = new ViewResponse($view, $response, $success, $message);

        return $viewResponse;
    }

}
