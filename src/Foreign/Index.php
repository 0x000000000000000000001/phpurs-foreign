<?php

$exports['unsafeReadPropImpl'] = function($f, $s, $key, $value) {
    if ($value === null) {
        return $f;
    }
    if (is_array($value)) {
        if (array_key_exists($key, $value)) {
            return $s($value[$key]);
        }
        return $s(null); // Return null instead of undefined
    }
    if (is_object($value)) {
        if (property_exists($value, $key)) {
            return $s($value->$key);
        }
        // If property is accessed on an object that implements ArrayAccess or similar, we might need special handling.
        // But for normal objects:
        return $s(null); 
    }
    return $s(null);
};

$exports['unsafeHasOwnProperty'] = function($prop, $value) {
    if (is_array($value)) {
        return array_key_exists($prop, $value);
    }
    if (is_object($value)) {
        return property_exists($value, $prop);
    }
    return false;
};

$exports['unsafeHasProperty'] = function($prop, $value) {
    if (is_array($value)) {
        return array_key_exists($prop, $value);
    }
    if (is_object($value)) {
        return property_exists($value, $prop);
    }
    return false;
};

return $exports;
