# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-06-01

First tagged release.

### Added

- `AddTemplatePaths` hook provider — registers extra field-template directories with Ninja Forms via
  the `ninja_forms_field_template_file_paths` filter (config `ninja_forms.template_paths`).
- `RemoveAppendFormMetabox` hook provider — removes the "append a form" block-editor metabox, globally
  or for a configured list of post types (config `ninja_forms.remove_append_form_metabox`).
- `Plugin::isActive()` guard and `ConfigProvider` wiring.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11 schema, composer-require-checker 4); now depends
  on `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan config; `kaiseki/config` and
  `kaiseki/wp-hook` pinned to `^2.0`. CI now runs via the reusable workflow in `kaisekidev/.github`.
- Fixed the `tests/` autoload-dev namespaces (were the `Foo` scaffolding placeholder).

### Fixed

- Removed inline `@var` overrides in the factories: the config values are narrowed at runtime
  (`is_array` / `is_string` / `array_filter`) instead of asserting their type. No behaviour change.
