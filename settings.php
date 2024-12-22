<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_superset_integration', get_string('pluginname', 'local_superset_integration'));
    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_configtext(
        'local_superset_integration/api_url',
        get_string('apiurl', 'local_superset_integration'),
        get_string('apiurl_desc', 'local_superset_integration'),
        '',
        PARAM_URL,
        50
    ));
    
    $settings->add(new admin_setting_configtext(
        'local_superset_integration/api_key',
        get_string('apikey', 'local_superset_integration'),
        get_string('apikey_desc', 'local_superset_integration'),
        '',
        PARAM_ALPHANUMEXT,
        50
    ));
}