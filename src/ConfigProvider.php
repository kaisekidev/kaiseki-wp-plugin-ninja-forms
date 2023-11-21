<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'hook' => [
                'provider' => [
                    AddTemplatePaths::class,
                    RemoveAppendFormMetabox::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    AddTemplatePaths::class => AddTemplatePathsFactory::class,
                    RemoveAppendFormMetabox::class => RemoveAppendFormMetaboxFactory::class,
                ],
            ],
        ];
    }
}
