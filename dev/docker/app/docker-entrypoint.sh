#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
    set -- php-fpm "$@"
fi

if [ "$1" = 'php-fpm' ]; then
    composer install --prefer-dist --no-progress --no-suggest --no-interaction

    until nc -z -v -w30 $DB_HOST 3306
    do
      echo "Waiting for database connection..."
      sleep 10
    done

    php artisan migrate
#    php artisan db:seed

    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/cache || true
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/sessions || true
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/views || true
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/logs || true

    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/cache  || true
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/sessions || true
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX /var/www/storage/framework/views || true
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX  /var/www/storage/logs || true

    chmod -R 777 /var/www/storage/framework/cache
    chmod -R 777 /var/www/storage/framework/sessions
    chmod -R 777 /var/www/storage/logs
fi

exec docker-php-entrypoint "$@"
