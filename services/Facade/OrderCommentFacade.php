<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: OrderCommentFacade.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace services\Facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class OrderCommentFacade
 * @package services\Facades
 */
class OrderCommentFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\OrderComment\OrderCommentService';
    }
}
