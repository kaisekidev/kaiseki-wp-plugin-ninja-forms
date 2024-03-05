<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\NinjaForms;

use Kaiseki\WordPress\Hook\HookProviderInterface;
use WP_Screen;

use function add_action;
use function get_current_screen;
use function in_array;
use function is_array;
use function remove_meta_box;

final class RemoveAppendFormMetabox implements HookProviderInterface
{
    /**
     * @param bool|list<string> $setting
     */
    public function __construct(private readonly bool|array $setting)
    {
    }

    public function addHooks(): void
    {
        if ($this->setting === false || !Plugin::isActive()) {
            return;
        }
        add_action('add_meta_boxes', [$this, 'removeMetaBox'], 20);
    }

    public function removeMetaBox(): void
    {
        $screen = get_current_screen();
        if (
            !($screen instanceof WP_Screen)
            || !$screen->is_block_editor()
            || (
                is_array($this->setting)
                && !in_array($screen->post_type, $this->setting, true)
            )
        ) {
            return;
        }
        remove_meta_box('nf_admin_metaboxes_appendaform', $screen->id, 'side');
    }
}
