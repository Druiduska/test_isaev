.PHONY: default dev-setup up down shell reseed reload restart watch test
DCSERVICE=laravel.test
PHP=php8.5

default:
	echo Help.

dev-setup:
	test -f .env || cp .env.example .env
	docker-compose down -v
	docker-compose build #--no-cache
	docker-compose up -d
	docker-compose exec ${DCSERVICE} composer install
	docker-compose exec ${DCSERVICE} docker/local/runtests.sh
	docker-compose down -v
	docker-compose up -d
	docker-compose exec ${DCSERVICE} start-container ${PHP} artisan migrate
	docker-compose exec ${DCSERVICE} start-container ${PHP} artisan db:seed

up:
	docker-compose up -d

down:
	docker-compose down

shell:
	docker-compose exec ${DCSERVICE} start-container bash

optimize:
	docker-compose exec ${DCSERVICE} start-container composer dumpautoload
	docker-compose exec ${DCSERVICE} start-container ${PHP} artisan optimize:clear
reseed:
	docker-compose exec ${DCSERVICE} start-container ${PHP} artisan migrate:fresh --seed

reload:
	docker-compose restart ${DCSERVICE}

restart:
	docker-compose restart ${DCSERVICE}

watch:
	docker-compose exec ${DCSERVICE} start-container npm run watch

test:
	docker-compose exec ${DCSERVICE} docker/local/runtests.sh

docs:
	docker-compose exec ${DCSERVICE} php artisan l5-swagger:generate
