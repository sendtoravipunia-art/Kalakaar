#!/usr/bin/env bash
# Shared helpers for Kalakaar shell scripts: loads .env and locates the mysql client.
set -euo pipefail

PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

load_env() {
    local env_file="$PROJECT_ROOT/.env"
    if [[ ! -f "$env_file" ]]; then
        echo "ERROR: .env not found at $env_file" >&2
        exit 1
    fi
    # Export every non-comment KEY=VALUE pair.
    while IFS='=' read -r key value; do
        key="$(echo "$key" | xargs)"
        [[ -z "$key" || "$key" == \#* ]] && continue
        value="${value%$'\r'}"
        export "$key=$value"
    done < "$env_file"
}

find_mysql() {
    if command -v mysql >/dev/null 2>&1; then
        echo "mysql"
    elif [[ -x "/c/Program Files/MySQL/MySQL Server 8.0/bin/mysql.exe" ]]; then
        echo "/c/Program Files/MySQL/MySQL Server 8.0/bin/mysql.exe"
    else
        echo "ERROR: mysql client not found." >&2
        exit 1
    fi
}

# Run a SQL string against the configured database (or server if $1 == --no-db).
mysql_exec() {
    local mysql_bin
    mysql_bin="$(find_mysql)"
    if [[ "${1:-}" == "--no-db" ]]; then
        shift
        "$mysql_bin" -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USERNAME" "-p$DB_PASSWORD" "$@"
    else
        "$mysql_bin" -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USERNAME" "-p$DB_PASSWORD" "$DB_DATABASE" "$@"
    fi
}
