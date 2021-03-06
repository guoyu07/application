<?php
/**
 * Configuration used by spiral console toolkit to declare set of configuration and update commands.
 * Attention, configs might include runtime code which depended on environment values only.
 *
 * @see ConsoleConfig
 */
return [
    /*
     * When set to true console will try to locate commands automatically using Tokenizer.
     */
    'locateCommands'    => true,

    /*
     * Manually registered set of commands. Use this section when locateCommands is off.
     */
    'commands'          => [],

    /*
     * This set of commands will be executed when command "configure" run. You can declare command
     * options, header and footer.
     */
    'configureSequence' => [
        'views:compile' => ['options' => []],   
        /*{{sequence.configure}}*/
    ],

    /*
     * Set of commands executed inside "update" command.
     */
    'updateSequence'    => [
        //With ODM: 'odm:schema' => ['options' => []],
        'orm:schema'    => ['options' => ['--migrate' => true, '-vv' => true]],
        
        //Make sure your migrations are inited! 'migrate:init'  => ['options' => []]
        'migrate'       => ['options' => ['-vv' => true]],

        'ide-helper'    => ['options' => [], 'header' => "\nGenerating IDE helper classes..."],
        /*{{sequence.update}}*/
    ]
];
