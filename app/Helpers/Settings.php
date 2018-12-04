<?php

// Global valuestore settings.
if (! function_exists('settings')) {
    function settings($key = null, $default = null) {
        $settingFile = storage_path('app/settings.json');
        if ($key != null) {
            $valuestore = \Spatie\Valuestore\Valuestore::make($settingFile);
        }
        return $valuestore->get($key, $default);
    }
}
