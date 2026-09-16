# WP Reset Filters contributor guidance

## Compatibility

- Preserve PHP 7.4 and WordPress 4.3 compatibility unless a dedicated pull
  request explicitly changes the published minimums.
- Preserve the public functions, hook registration, script handles, localized
  object name, localized keys, and asset URLs unless a compatibility plan is
  part of the change.
- Treat changes to filter detection and query-string behavior carefully; the
  reset control must not discard unrelated admin state.

## Tests

- Add or update a regression test before changing observed behavior.
- Characterize enqueued asset arguments, reset-button state, localized data,
  and helper return values when touching the runtime code.
- Run `composer test`, the declared PHP syntax matrix, and metadata/artifact
  validation before requesting review.

## Automation

Follow the organization-level safety boundaries. AI-authored implementation
must remain a draft pull request and cannot modify workflows, release policy,
ownership, security policy, or this file.
