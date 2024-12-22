<?php
require_once(__DIR__ . '/../../config.php');

require_login();
$context = context_system::instance();
require_capability('local/superset_integration:view', $context); // Use the correct capability

$PAGE->set_url(new moodle_url('/local/superset_integration/index.php'));
$PAGE->set_context($context);
$PAGE->set_title(get_string('pluginname', 'local_superset_integration'));
$PAGE->set_heading(get_string('pluginname', 'local_superset_integration'));

$renderer = $PAGE->get_renderer('local_superset_integration');

$api_url = get_config('local_superset_integration', 'api_url');
$api_key = get_config('local_superset_integration', 'api_key');

echo $OUTPUT->header();
echo $renderer->render_dashboard($api_url, $api_key);
echo $OUTPUT->footer();