#!/usr/bin/env bash
# Runs the PHP seeders to populate sample categories, artists and producers.
set -euo pipefail
source "$(dirname "${BASH_SOURCE[0]}")/lib.sh"
load_env

echo "==> Seeding database…"
php "$PROJECT_ROOT/database/seed.php"
echo "==> Seeding complete."
