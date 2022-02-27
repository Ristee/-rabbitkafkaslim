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

init:
	if [ ! -d frontend1 ]; then mkdir frontend1 && git clone ${FRONTEND_REPOSITORY} frontend1; fi
	# TODO доделать init. Добавить развертывание фронта
