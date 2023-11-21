<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use function function_exists;

final class Plugin
{
    public const NAME = 'ninja-forms/ninja-forms.php';

    public static function isActive(): bool
    {
        if (!function_exists('is_plugin_active')) {
            return false;
        }
        return is_plugin_active(self::NAME);
    }
}
