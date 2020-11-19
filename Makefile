DC=docker exec -it
EXEC=$(DC) php-fpm /bin/bash
CONSOLE=bin/console

vendor:
	@docker exec -it composer install --no-suggest --no-progress

bash:
	@docker exec -it php-fpm /bin/bash
