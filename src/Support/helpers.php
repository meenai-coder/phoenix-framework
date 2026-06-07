<?php
if (!function_exists('storage_path')) {
    function storage_path(string $path = ''): string
    {
        return __DIR__ . '/../storage' . ($path ? '/' . ltrim($path, '/') : '');
    }
}