<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/superset_integration:view' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
        ],
    ],
];
