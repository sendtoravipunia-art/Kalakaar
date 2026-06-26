#!/usr/bin/env bash
# Full reset: drops the database, recreates it, runs all migrations and seeders.
# Use this for a clean start. WARNING: deletes all existing data.
set -euo pipefail
source "$(dirname "${BASH_SOURCE[0]}")/lib.sh"
load_env

echo "==> Dropping database '$DB_DATABASE'…"
mysql_exec --no-db -e "DROP DATABASE IF EXISTS \`$DB_DATABASE\`;"

bash "$(dirname "${BASH_SOURCE[0]}")/setup-db.sh"
bash "$(dirname "${BASH_SOURCE[0]}")/migrate.sh"
bash "$(dirname "${BASH_SOURCE[0]}")/seed.sh"

echo "==> Fresh database ready."
