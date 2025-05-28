PHP_CONTAINER=php

.PHONY: build up down migrate seed artisan logs

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

migrate:
	docker-compose exec php php artisan migrate

migrate-refresh:
	docker-compose exec php php artisan migrate:refresh

seed:
	docker-compose exec php php artisan db:seed

logs:
	docker-compose logs -f