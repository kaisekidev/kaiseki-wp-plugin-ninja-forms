<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class AddTemplatePathsFactory
{
    public function __invoke(ContainerInterface $container): AddTemplatePaths
    {
        $config = Config::fromContainer($container);
        /** @var list<string> $templatePaths */
        $templatePaths = $config->array('ninja_forms.template_paths');

        return new AddTemplatePaths($templatePaths);
    }
}
