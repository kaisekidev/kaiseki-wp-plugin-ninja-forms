<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

use function array_merge;

final class AddTemplatePaths implements HookCallbackProviderInterface
{
    /**
     * @param list<string> $templatePaths
     */
    public function __construct(private array $templatePaths)
    {
    }

    public function registerHookCallbacks(): void
    {
        if ($this->templatePaths === []) {
            return;
        }
        add_filter('ninja_forms_field_template_file_paths', [$this, 'addTemplatePaths']);
    }

    /**
     * @param list<string> $templatePaths
     * @return list<string>
     */
    public function addTemplatePaths(array $templatePaths): array
    {
        return array_merge($templatePaths, $this->templatePaths);
    }
}
