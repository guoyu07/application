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
    'default'     => 'default',
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

        //Runtime (local) databases, this safe db to check some ideas and drafts
        'dynamic'  => 'runtime',
        'develop'  => 'runtime',
        'sandbox'  => 'primary',

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
        'primary'   => [
            'connection'  => 'mysql',
            'tablePrefix' => 'primary_'
        ],
        'secondary' => [
            'connection'  => 'postgres',
            'tablePrefix' => 'secondary_',
        ],
        /*
         * You can use this database to store application specific settings, obviously data has to be
         * cached and no client data can land here.
         */
        'runtime'   => [
            'connection'  => 'sqlite',
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
            'connection' => 'mysql:host=127.0.0.1;dbname=demo',
            'profiling'  => env('DEBUG'),
            'username'   => 'root',
            'password'   => 'root',
            'options'    => []
        ],
        'postgres'  => [
            'driver'     => Drivers\Postgres\PostgresDriver::class,
            'connection' => 'pgsql:host=127.0.0.1;dbname=spiral',
            'profiling'  => env('DEBUG'),
            'username'   => 'postgres',
            'password'   => '',
            'options'    => []
        ],
        'sqlite'    => [
            'driver'     => Drivers\Sqlite\SqliteDriver::class,
            'connection' => 'sqlite:' . directory('runtime') . 'runtime.db',
            'profiling'  => env('DEBUG'),
            'username'   => 'sqlite',
            'password'   => '',
            'options'    => []
        ],
        'sqlServer' => [
            'driver'     => Drivers\SqlServer\SqlServerDriver::class,
            'connection' => 'sqlsrv:Server=DESKTOP-ETTP923\SQLEXPRESS;Database=spiral',
            'profiling'  => env('DEBUG'),
            'username'   => null,
            'password'   => null,
            'options'    => []
        ],
        /*{{connections}}*/
    ]
];