<?php

$exports['typeOf'] = function($value) {
    if ($value === null) {
        return 'object';
    }
    if (is_array($value)) {
        return 'object';
    }
    if (is_bool($value)) {
        return 'boolean';
    }
    if (is_int($value) || is_float($value)) {
        return 'number';
    }
    if (is_string($value)) {
        return 'string';
    }
    if (is_object($value)) {
        if ($value instanceof \Closure) {
            return 'function';
        }
        return 'object';
    }
    return 'undefined';
};

$exports['tagOf'] = function($value) {
    if ($value === null) return 'Null';
    if (is_array($value)) return 'Array';
    if (is_bool($value)) return 'Boolean';
    if (is_int($value) || is_float($value)) return 'Number';
    if (is_string($value)) return 'String';
    if (is_object($value)) {
        if ($value instanceof \Closure) return 'Function';
        return 'Object';
    }
    return 'Undefined';
};

$exports['isNull'] = function($value) {
    return $value === null;
};

$exports['isUndefined'] = function($value) {
    return $value === null;
};

$exports['isArray'] = function($value) {
    return is_array($value);
};

return $exports;
