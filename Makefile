up:
	docker-compose up -d
	docker-compose ps
down:
	docker-compose down --remove-orphans

ps:
	docker-compose ps

build:
	docker-compose build