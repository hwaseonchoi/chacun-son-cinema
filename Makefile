EXEC=docker exec -it
CONSOLE=bin/console
DC=docker-compose
CONTAINER=php-fpm

# Docker container
build:
	$(DC) build
up:
	$(DC) up -d
down:
	$(DC) down

# PHP libary
vendor:
	$(EXEC) $(CONTAINER) composer install
.PHONY: vendor

install: vendor
.PHONY: install

# Terminal
bash:
	$(EXEC) $(CONTAINER) /bin/bash
