<?php
/**
 * Configuration file used by Debugger component to automatically manage set of handlers for
 * Monolog loggers created on demand. Attention, configs might include runtime code which depended
 * on environment values only.
 *
 * @see DebuggerConfig
 */
use Spiral\Debug\SharedLogger as DefaultLogger;
use Spiral\Http\Middlewares\ExceptionWrapper as HttpErrors;

return [
    /*
     * This is default spiral logger, all error messages are passed into it.
     */
    DefaultLogger::class => [
        [
            'handler' => \Monolog\Handler\RotatingFileHandler::class,
            'format'  => "[%datetime%] %level_name%: %message%\n",
            'options' => [
                'level'    => \Psr\Log\LogLevel::ERROR,
                'maxFiles' => 1,
                'filename' => directory('runtime') . 'logs/errors.log',
                'bubble'   => false
            ],
        ],
        [
            'handler' => \Monolog\Handler\RotatingFileHandler::class,
            'format'  => "[%datetime%] %level_name%: %message%\n",
            'options' => [
                'level'    => \Psr\Log\LogLevel::DEBUG,
                'maxFiles' => 1,
                'filename' => directory('runtime') . 'logs/debug.log'
            ],
        ],
        /*{{handlers.debug}}*/
    ],

    /*
     * Such middleware provides ability to isolate ClientExceptions into nice error pages. You can
     * use it's log to collect http errors.
     */
    HttpErrors::class    => [
        [
            'handler' => \Monolog\Handler\RotatingFileHandler::class,
            'format'  => "[%datetime%] %message%\n",
            'options' => [
                'level'    => \Psr\Log\LogLevel::ERROR,
                'maxFiles' => 7,
                'filename' => directory('runtime') . 'logs/http.log'
            ],
        ],
        /*{{handlers.http}}*/
    ],

    /*{{handlers}}*/
];