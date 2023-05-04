up:
	docker-compose up -d
build:
	docker-compose build
stop:
	docker-compose stop
restart:
	docker-compose down
	docker-compose up -d
down:
	docker-compose down
ps:
	docker-compose ps
db:
	docker-compose exec db bash
php:
	docker-compose exec php-fpm bash
fresh:
	php artisan migrate:fresh --force --seed
seed:
	php artisan db:seed
cs:
	./vendor/bin/phpcs -p
fix:
	./vendor/bin/php-cs-fixer fix -v --diff --diff-format udiff
stan:
	./vendor/bin/phpstan analyse -c phpstan.neon --memory-limit=3G
test:
	docker-compose exec php-fpm ./vendor/bin/phpunit
test-no-config:
	./vendor/bin/phpunit -d memory_limit=3072M --no-configuration tests/
clear:
	php artisan view:clear && php artisan cache:clear && php artisan config:clear && php artisan route:clear
	composer dump-autoload
cache:
	php artisan config:cache && php artisan route:cache
work:
	php artisan queue:work
model-helper:
	php artisan ide-helper:models -R

# ユニットテスト用のDBを初期化する。
# 使い方： docker-compose exec php-fpm make test-db-import
test-db-import:
	mysql -uuser -psecret -hdb-testing kpla-test-db < ./docker/mysql/dump.sql
test-db-import-v2:
	mysql --user=user --password=secret --port=33060 --host=127.0.0.1 kpla-test-db < ./docker/mysql/dump.sql
