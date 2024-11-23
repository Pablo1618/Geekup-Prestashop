<?php
/**
 * MontonioAbstractErrorPageHandler - Abstract handler class following the Chain of Responsibility pattern
 *
 * @since 2.0.1
 */
abstract class MontonioAbstractErrorPageHandler
{
    /**
     * The next handler in the chain
     *
     * @since 2.0.1
     * @var MontonioAbstractErrorPageHandler
     */
    protected $nextHandler;

    /**
     * The controller instance
     *
     * @since 2.0.1
     * @var MontonioAbstractFrontController
     */
    protected $controller;

    /**
     * Constructor to inject the controller instance
     *
     * @since 2.0.1
     * @param MontonioAbstractFrontController $controller
     */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * Set the next handler in the chain
     *
     * @since 2.0.1
     * @param MontonioAbstractErrorPageHandler $handler
     * @return MontonioAbstractErrorPageHandler
     */
    public function setNext(MontonioAbstractErrorPageHandler $handler)
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    /**
     * Handle the request or pass it to the next handler
     *
     * @since 2.0.1
     */
    abstract public function handle();
}
