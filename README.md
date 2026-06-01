# kaiseki/wp-plugin-ninja-forms

WordPress helpers for the Ninja Forms plugin: register field template paths and remove the
append-a-form metabox in the block editor.

Two `kaiseki/wp-hook` `HookProviderInterface`s wired through `ConfigProvider`, both no-ops unless the
Ninja Forms plugin is active:

- **`AddTemplatePaths`** — registers extra field-template directories with Ninja Forms
  (the `ninja_forms_field_template_file_paths` filter).
- **`RemoveAppendFormMetabox`** — removes the "append a form" metabox from the block editor,
  optionally limited to specific post types.

## Installation

```bash
composer require kaiseki/wp-plugin-ninja-forms
```

Requires PHP 8.2 or newer.

## Usage

Register `ConfigProvider` with your laminas-style config aggregator, configure the `ninja_forms` key,
and activate the providers you want via `kaiseki/wp-hook`:

```php
use Kaiseki\WordPress\NinjaForms\AddTemplatePaths;
use Kaiseki\WordPress\NinjaForms\RemoveAppendFormMetabox;

return [
    'ninja_forms' => [
        // Extra directories searched for field templates.
        'template_paths' => [
            get_stylesheet_directory() . '/ninja-forms/templates',
        ],
        // false to keep the metabox, true to remove it everywhere,
        // or a list of post types to remove it from.
        'remove_append_form_metabox' => ['page'],
    ],
    'hook' => [
        'provider' => [
            AddTemplatePaths::class,
            RemoveAppendFormMetabox::class,
        ],
    ],
];
```

`ConfigProvider` registers the factories for both providers; each reads its slice of the `ninja_forms`
config from the container. `Plugin::isActive()` gates the metabox removal so nothing runs when Ninja
Forms is inactive.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
