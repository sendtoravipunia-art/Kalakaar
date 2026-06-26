#!/usr/bin/env bash
# Starts the PHP development server for Kalakaar.
set -euo pipefail
PROJECT_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
HOST="${1:-localhost}"
PORT="${2:-8000}"

echo "==> Kalakaar running at http://$HOST:$PORT"
php -S "$HOST:$PORT" -t "$PROJECT_ROOT/public"
