#!/bin/bash

composer install

php artisan key:generate

composer require laravel/octane --with-all-dependencies

php artisan octane:install --server="swoole"

php artisan octane:start --server="swoole" --host="0.0.0.0" --workers=${SWOOLE_WORKERS} --task-workers=${SWOOLE_TASK_WORKERS} --max-requests=${SWOOLE_MAX_REQUESTS} --watch ;
