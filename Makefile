EXEC=docker exec -it
#EXEC=$(DC) php-fpm /bin/bash
CONSOLE=bin/console
DC=docker-compose
CONTAINER=php-fpm

# Container
build:
	$(DC) build
up:
	$(DC) up -d
down:
	$(DC) down

# Libs
vendor:
	$(EXEC) $(CONTAINER) composer install
.PHONY: vendor

# Terminal
bash:
	$(EXEC) $(CONTAINER) /bin/bash
