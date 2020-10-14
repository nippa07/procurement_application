<?php

/**
 * Author: Spera Labs/(+94)112 144 533
 * Email: hello@speralabs.com
 * File Name: OrderItemFacade.php
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace services\Facade;


use Illuminate\Support\Facades\Facade;

/**
 * Class OrderItemFacade
 * @package services\Facades
 */
class OrderItemFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'services\OrderItem\OrderItemService';
    }
}
