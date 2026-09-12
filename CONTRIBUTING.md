# Contributing

Thanks for helping maintain WP Reset Filters.

## Before changing behavior

Describe the observable behavior, compatibility expectations, and acceptance
criteria in a GitHub issue. Report suspected vulnerabilities privately through
[GitHub Security Advisories](https://github.com/stuttter/wp-reset-filters/security/advisories/new).

## Pull requests

* Keep each pull request focused and reversible.
* Add regression coverage for behavior changes and bug fixes.
* Preserve the declared PHP and WordPress minimum versions.
* Test every affected administration screen and relevant custom post type.
* Identify selector, URL, capability, privacy, dependency, automation, and
  release-process implications explicitly.
* Do not change the globally enqueued reset-button behavior without documenting
  the compatibility impact for third-party administration screens.
* Do not commit credentials, build caches, development databases, or generated
  release ZIP files.
* Wait for every required check and resolve review conversations before merge.

AI-assisted contributions are welcome, but the contributor remains responsible
for understanding and validating the result.
