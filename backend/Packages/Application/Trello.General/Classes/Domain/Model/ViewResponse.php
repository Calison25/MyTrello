<?php
namespace Trello\Helper\Domain\Model;

/*
 * This file is part of the Trello.Helper package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Mvc\Response;
use Neos\Flow\Mvc\View\ViewInterface;


/**
 *
 */
class ViewResponse
{

    /**
     * @var string
     */
    protected $message;

    /**
     * @var boolean
     */
    protected $success;

    /**
     * @var ViewInterface
     */
    protected $view;

    /**
     * @var \Neos\Flow\Http\Response
     */
    protected $response;


    /**
     * ViewResponse constructor.
     * @param ViewInterface $view
     * @param \Neos\Flow\Http\Response $response
     * @param $message
     * @param $success
     */
    public function __construct(ViewInterface $view, \Neos\Flow\Http\Response $response, $message, $success)
    {
        $this->view = $view;
        $this->response = $response;
        $this->message = $message;
        $this->success = $success;
    }


    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * @return ViewInterface
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param ViewInterface $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return \Neos\Flow\Http\Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \Neos\Flow\Http\Response $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }
}
