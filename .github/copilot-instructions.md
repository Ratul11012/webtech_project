## Repo snapshot

Small single-file PHP project. Primary file: `test.php` (simple HTML output; currently contains a minor typo `<hade>`).

## Purpose for an AI agent

Help quickly iterate on tiny PHP/HTML changes, suggest minimal fixes, and avoid large architectural changes (this repo has no frameworks, no tests, and runs under XAMPP).

## Quick run & debug (discoverable from repo)

- Start XAMPP Apache and open: http://localhost/test.php
- Or run a PHP built-in server from the project root:

```bash
php -S localhost:8000 -t .
# then open http://localhost:8000/test.php
```

- For quick PHP runtime errors during edits, prefer adding at the top of a PHP file when needed:

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
```

## What to change (agent guidance)

- Prefer minimal, single-file fixes (typos, markup, small PHP snippets). Example: fix `<hade>` to `<head>` in `test.php`.
- Do not introduce frameworks, Composer, or CI config without explicit user request—this repo is intentionally tiny.
- When making edits, keep changes constrained to the file(s) needed and include a one-line commit message describing the intent.

## Conventions & patterns (project-specific)

- No PSR or coding-standard files detected; follow conservative, non-breaking edits.
- No tests/CI discovered—do not add tests unless asked. If adding tests, document how to run them.

## Integration points / external deps

- None found in the repository. Assume the runtime is XAMPP on Windows (developer workspace path shows `c:\xampp\htdocs\...`).

## Examples from the codebase

- `test.php` contains basic HTML; an appropriate patch would be:

Replace `<hade>` with `<head>` and ensure well-formed HTML structure.

## When to ask the user

- Before any multi-file refactor, adding build tools, or modifying server configuration.
- If runtime behavior depends on extensions (e.g., XDebug), ask for environment details.

---

If any part of this is unclear or you want a different level of change (e.g., add Composer, tests, or migrate to a framework), tell me which direction and I will propose an exact plan.
