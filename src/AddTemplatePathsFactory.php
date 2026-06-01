<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

use function array_filter;
use function array_values;
use function is_string;

final class AddTemplatePathsFactory
{
    public function __invoke(ContainerInterface $container): AddTemplatePaths
    {
        $config = Config::fromContainer($container);
        $templatePaths = array_values(array_filter(
            $config->array('ninja_forms.template_paths'),
            static fn(mixed $path): bool => is_string($path),
        ));

        return new AddTemplatePaths($templatePaths);
    }
}
