<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

use function array_filter;
use function array_values;
use function is_array;
use function is_string;

final class RemoveAppendFormMetaboxFactory
{
    public function __invoke(ContainerInterface $container): RemoveAppendFormMetabox
    {
        $config = Config::fromContainer($container);
        $setting = $config->get('ninja_forms.remove_append_form_metabox');

        return new RemoveAppendFormMetabox(
            is_array($setting)
                ? array_values(array_filter($setting, static fn(mixed $value): bool => is_string($value)))
                : $setting === true,
        );
    }
}
