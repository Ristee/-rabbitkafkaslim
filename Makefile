FRONTEND_REPOSITORY = "git@github.com:Ristee/rabbitkafkafrontend.git"

up:
	docker-compose up -d
	docker-compose ps
down:
	docker-compose down --remove-orphans

restart: down up

ps:
	docker-compose ps

build:
	docker-compose build

frontend-shell:
	docker-compose run --rm frontend-nodejs bash

frontend-install:
	docker-compose run --rm frontend-nodejs yarn install

frontend-watch:
	docker-compose run --rm frontend-nodejs yarn watch

frontend-build:
	docker-compose run --rm frontend-nodejs yarn build

frontend-init:
	@if [ ! -d frontend ]; then mkdir frontend && git clone ${FRONTEND_REPOSITORY} frontend; else echo "frontend folder already exists."; fi
	@# TODO доделать init. Добавить развертывание фронта

api-cli:
	docker-compose run --rm api-php-cli $(COMMAND)

api-shell:
	docker-compose run --rm api-php-cli bash

api-composer-install:
	docker-compose run --rm api-php-cli composer install

api-composer-update:
	docker-compose run --rm api-php-cli composer update

api-test:
	docker-compose run --rm api-php-cli composer test