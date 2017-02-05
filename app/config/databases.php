<?php
/**
 * DatabaseManager component configuration file. Attention, configs might include runtime code
 * which depended on environment values only.
 *
 * @see DatabasesConfig
 */
use Spiral\Database\Drivers;

return [
    /*
     * Here you can specify name/alias for database to be treated as default in your application.
     * Such database will be returned from DatabaseManager->database(null) call and also can be
     * available using $this->db shared binding.
     */
    'default'     => 'primary',

    /*
     * Database aliases provide you ability to store your ORM records or tables in multiple logical
     * sources, on practice you can point all your aliases to one database to make application solid
     * and way faster.
     *
     * However aliases can be useful when you trying to split some functionality into module/bundle.
     * ORM models still can talk between databases, however joins will become forbidden.
     */
    'aliases'     => [
        'default'  => 'primary',
        'database' => 'primary',
        'db'       => 'primary',

        /*{{aliases}}*/
    ],

    /*
     * This section defines list of your application databases, every database must have specified
     * connection and optional isolation prefix (table prefix). You can link multiple databases to
     * one connection using prefixes.
     *
     * Attention, use prefixes carefully, some ORM functionality (like joins) are forbidden between
     * different databases (for now).
     */
    'databases'   => [
        'primary' => [
            'connection'  => 'mysql',
            'tablePrefix' => '',
        ],
        /*{{databases}}*/
    ],

    /*
     * Connection provides you lower access level to your database and database schema. You can link
     * as many connections to one database as you want.
     */
    'connections' => [
        'mysql'     => [
            'driver'     => Drivers\MySQL\MySQLDriver::class,
            'connection' => 'mysql:host=127.0.0.1;dbname=' . env('DB_NAME'),
            'profiling'  => env('DEBUG', false),
            'username'   => env('DB_USERNAME'),
            'password'   => env('DB_PASSWORD'),
            'options'    => []
        ],
        'postgres'  => [
            'driver'     => Drivers\Postgres\PostgresDriver::class,
            'connection' => 'pgsql:host=127.0.0.1;dbname=' . env('DB_NAME'),
            'profiling'  => env('DEBUG', false),
            'username'   => env('DB_USERNAME'),
            'password'   => env('DB_PASSWORD'),
            'options'    => []
        ],
        'runtime'   => [
            'driver'     => Drivers\SQLite\SQLiteDriver::class,
            'connection' => 'sqlite:' . directory('runtime') . 'runtime.db',
            'profiling'  => env('DEBUG', false),
            'username'   => 'sqlite',
            'password'   => '',
            'options'    => []
        ],
        'sqlServer' => [
            'driver'     => Drivers\SQLServer\SQLServerDriver::class,
            'connection' => 'sqlsrv:Server=MY-PC;Database=' . env('DB_NAME'),
            'profiling'  => env('DEBUG', false),
            'username'   => env('DB_USERNAME'),
            'password'   => env('DB_PASSWORD'),
            'options'    => []
        ],
        /*{{connections}}*/
    ]
];