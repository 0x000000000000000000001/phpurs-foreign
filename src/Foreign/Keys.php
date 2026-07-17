<?php

$exports['unsafeKeys'] = function($value) {
    if (is_array($value)) {
        $keys = array_keys($value);
        return array_map('strval', $keys);
    }
    if (is_object($value)) {
        return array_keys(get_object_vars($value));
    }
    return [];
};

return $exports;
