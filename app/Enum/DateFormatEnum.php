<?php

namespace App\Enum;

/**
 * 
 */
final class DateFormatEnum 
{
    /**
     * The format the date comes in from the webhook.
     * 
     * @var string
     */
    const MONO_TIME = 'H:i:s,u';
    
    /**
     * The format the database takes the time in.
     * 
     * @var string
     */
    const MYSQL = 'H:i:s.u';
}