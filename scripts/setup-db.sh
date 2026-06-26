#!/usr/bin/env bash
# Creates the Kalakaar database if it does not already exist.
set -euo pipefail
source "$(dirname "${BASH_SOURCE[0]}")/lib.sh"
load_env

echo "==> Creating database '$DB_DATABASE' (if missing)…"
mysql_exec --no-db -e \
    "CREATE DATABASE IF NOT EXISTS \`$DB_DATABASE\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
echo "==> Done."
