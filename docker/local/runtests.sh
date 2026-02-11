#!/usr/bin/env sh

# этот скрипт должен запускаться через make test из контейнера

export DB_CONNECTION=sqlite
export DB_DATABASE=./database/sqlite-test.sqlite

echo > "$DB_DATABASE"  || exit 1

php artisan migrate:fresh --seed  -v || exit 1
XDEBUG_MODE=coverage php artisan test --coverage-html ./coverage || exit 1
