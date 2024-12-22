<?php
defined('MOODLE_INTERNAL') || die();

/**
 * Plugin-specific initialization code.
 */
function local_superset_integration_extend_navigation(global_navigation $nav) {
    if (is_siteadmin()) {
        $node = $nav->add(
            get_string('pluginname', 'local_superset_integration'),
            new moodle_url('/local/superset_integration/index.php'),
            navigation_node::TYPE_CUSTOM,
            null,
            'local_superset_integration'
        );
        $node->showinflatnavigation = true;
    }
}

/**
 * Handles the plugin configuration updates.
 *
 * @param stdClass $data Updated configuration data.
 * @return bool
 */
function local_superset_integration_save_settings($data) {
    // Additional logic can be added here for processing settings updates.
    return true;
}

/**
 * Validates the plugin settings.
 *
 * @param string $settingname The name of the setting to validate.
 * @param mixed $value The value of the setting to validate.
 * @return bool|string True if valid, otherwise an error message.
 */
function local_superset_integration_validate_setting($settingname, $value) {
    if ($settingname === 'api_url' && !filter_var($value, FILTER_VALIDATE_URL)) {
        return get_string('invalid_api_url', 'local_superset_integration');
    }

    if ($settingname === 'api_key' && empty($value)) {
        return get_string('invalid_api_key', 'local_superset_integration');
    }

    return true;
}