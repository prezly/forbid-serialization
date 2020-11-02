.PHONY: tests

tests: vendor
	vendor/bin/phpunit

vendor: composer.json
	php composer install
