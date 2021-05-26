#!/usr/bin/env bash

set -e

# Build files
composer install --no-dev --prefer-dist --no-suggest --no-progress
# Remove files
rm -rf .git
rm -rf .github
rm -rf .gitignore
rm -rf .phpcs.xml.dist
rm -rf node_modules
rm -rf tests
rm -rf bin
rm -rf phpunit.xml
rm -rf hamepub
