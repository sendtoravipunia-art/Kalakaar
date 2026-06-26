#!/usr/bin/env bash
# Applies every database/migrations/*.sql file in sorted order. Migrations are
# written idempotently (CREATE TABLE IF NOT EXISTS) so this is safe to re-run.
set -euo pipefail
source "$(dirname "${BASH_SOURCE[0]}")/lib.sh"
load_env

echo "==> Running migrations on '$DB_DATABASE'…"
shopt -s nullglob
for file in "$PROJECT_ROOT"/database/migrations/*.sql; do
    echo "    - $(basename "$file")"
    mysql_exec < "$file"
done
echo "==> Migrations complete."
