<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class RemoveAppendFormMetaboxFactory
{
    public function __invoke(ContainerInterface $container): RemoveAppendFormMetabox
    {
        $config = Config::fromContainer($container);
        /** @var bool|list<string> $setting */
        $setting = $config->get('ninja_forms.remove_append_form_metabox');

        return new RemoveAppendFormMetabox($setting);
    }
}
