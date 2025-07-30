<?php

declare(strict_types=1);

namespace PhpMcp\Server\Utils;

/**
 * Polyfills for PHP 8.0+ string functions to maintain PHP 7.1 compatibility
 */
class StringPolyfills
{
    /**
     * Polyfill for str_starts_with() function (PHP 8.0+)
     */
    public static function str_starts_with(string $haystack, string $needle): bool
    {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }

    /**
     * Polyfill for str_ends_with() function (PHP 8.0+)
     */
    public static function str_ends_with(string $haystack, string $needle): bool
    {
        return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
    }

    /**
     * Polyfill for str_contains() function (PHP 8.0+)
     */
    public static function str_contains(string $haystack, string $needle): bool
    {
        return strpos($haystack, $needle) !== false;
    }
}

// Global function polyfills if they don't exist
if (!function_exists('str_starts_with')) {
    function str_starts_with(string $haystack, string $needle): bool
    {
        return \PhpMcp\Server\Utils\StringPolyfills::str_starts_with($haystack, $needle);
    }
}

if (!function_exists('str_ends_with')) {
    function str_ends_with(string $haystack, string $needle): bool
    {
        return \PhpMcp\Server\Utils\StringPolyfills::str_ends_with($haystack, $needle);
    }
}

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return \PhpMcp\Server\Utils\StringPolyfills::str_contains($haystack, $needle);
    }
} 