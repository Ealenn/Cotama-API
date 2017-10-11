.PHONY: install update database test docs

PHP=php
CURRENT_DIR=$(shell pwd)
ifdef VERSION
	PHP=docker run -it --rm --name phpcli -v $(CURRENT_DIR):/usr/src/myapp -w /usr/src/myapp php:$(VERSION)-cli php
endif

help: 
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

composer.lock: composer.json
	composer update

vendor: composer.lock
	composer install

install: vendor ## Install dependence
	php artisan cache:clear

database: install .env ## Install Database with .ENV
	php artisan migrate:refresh 
	php artisan db:seed

test: install database ## Unit Test
	$(PHP) ./vendor/bin/phpunit
