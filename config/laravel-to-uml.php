<?php

return [
    /**
     * Default route to see the UML diagram.
     */
    'route' => '/uml',
    
    /**
     * You can turn on or off the indexing of specific types
     * of classes. By default, LTU processes only controllers 
     * and models.
     */
    'casts'         => true,
    'channels'      => true,
    'commands'      => false,
    'components'    => true,
    'controllers'   => true,
    'events'        => true,
    'exceptions'    => false,
    'jobs'          => false,
    'listeners'     => true,
    'mails'         => true,
    'middlewares'   => true,
    'models'        => true,
    'notifications' => true,
    'observers'     => false,
    'policies'      => false,
    'providers'     => false,
    'requests'      => true,
    'resources'     => false,
    'rules'         => true,

    /**
     * You can define specific nomnoml styling.
     * For more information: https://github.com/skanaar/nomnoml
     */
    'style' => [
        'background' => '#071013',
        'stroke'     => '#EBEBEB',
        'arrowSize'  => 1,
        'bendSize'   => 0.3,
        'direction'  => 'down',
        'gutter'     => 5,
        'edgeMargin' => 0,
        'gravity'    => 1,
        'edges'      => 'rounded',
        'fill'       => '#3A6EA5',
        'fillArrows' => false,
        'font'       => 'Calibri',
        'fontSize'   => 12,
        'leading'    => 1.25,
        'lineWidth'  => 3,
        'padding'    => 8,
        'spacing'    => 40,
        'title'      => 'Filename',
        'zoom'       => 1,
        'acyclicer'  => 'greedy',
        'ranker'     => 'longest-path'
    ],

    /**
     * Specific files can be excluded if need be.
     * By default, all default Laravel classes are ignored.
     */
    'excludeFiles' => [
    ],

    /**
     * In case you changed any of the default directories
     * for different classes, please amend below.
     */
    'directories' => [
        'casts'         => 'Casts/',
        'channels'      => 'Broadcasting/',
        'commands'      => 'Console/Commands/',
        'components'    => 'View/Components/',
        'controllers'   => 'Http/Controllers/',
        'events'        => 'Events/',
        'exceptions'    => 'Exceptions/',
        'jobs'          => 'Jobs/',
        'listeners'     => 'Listeners/',
        'mails'         => 'Mail/',
        'middlewares'   => 'Http/Middleware/',
        'models'        => 'Models/',
        'notifications' => 'Notifications/',
        'observers'     => 'Observers/',
        'policies'      => 'Policies/',
        'providers'     => 'Providers/',
        'requests'      => 'Http/Requests/',
        'resources'     => 'Http/Resources/',
        'rules'         => 'Rules/',
    ],
];