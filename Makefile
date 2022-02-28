FRONTEND_REPOSITORY = "git@github.com:Ristee/rabbitkafkafrontend.git"

up:
	docker-compose up -d
	docker-compose ps
down:
	docker-compose down --remove-orphans

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
