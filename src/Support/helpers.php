<?php
if (!function_exists('storage_path')) {
    function storage_path(string $path = ''): string
    {
        return __DIR__ . '/../storage' . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('app_path')) {
    function app_path(string $path = ''): string
    {
        return __DIR__ . '/../app' . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('public_path')) {
    function public_path(string $path = ''): string
    {
        return __DIR__ . '/../public' . ($path ? '/' . ltrim($path, '/') : '');
    }
}