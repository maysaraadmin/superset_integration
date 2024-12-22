<?php
defined('MOODLE_INTERNAL') || die();

class local_superset_integration_renderer extends plugin_renderer_base {

    /**
     * Render the embedded Superset dashboard.
     *
     * @param string $api_url The base URL for the Superset dashboard.
     * @param string $api_key The API key for authentication.
     * @return string The HTML output.
     */
    public function render_dashboard($api_url, $api_key) {
        if (empty($api_url)) {
            return $this->render_error(get_string('missing_api_url', 'local_superset_integration'));
        }

        if (empty($api_key)) {
            return $this->render_error(get_string('missing_api_key', 'local_superset_integration'));
        }

        $iframe_url = $api_url . '?api_key=' . urlencode($api_key);

        $output = html_writer::tag('iframe', '', [
            'src' => $iframe_url,
            'width' => '100%',
            'height' => '600',
            'style' => 'border: none;',
        ]);

        return $output;
    }

    /**
     * Render an error message.
     *
     * @param string $message The error message to display.
     * @return string The HTML output.
     */
    private function render_error($message) {
        return html_writer::div($message, 'error alert alert-danger');
    }
}