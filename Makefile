default: help

.PHONY: help
help:
	@echo "help: Show help for each of the Makefile recipes."
	@echo "composer-install: Install composer dependencies for back-end container."
	@echo "rebuild: Rebuild and restart docker containers."
	@echo "start: Start docker containers"
	@echo "stop: Stop docker containers"
	@echo "bash: Execute bash command on webserver container"

.PHONY: composer-install
composer-install:
	@docker exec -it wecine_webserver composer install

# 🐳 Docker Compose
rebuild:
	make stop
	@docker-compose build --pull --force-rm --no-cache
	make start

.PHONY: start
start:
	@docker-compose up -d

.PHONY: stop
stop:
	@docker-compose stop

.PHONY: bash
bash:
	@docker exec -it wecine_webserver bash
