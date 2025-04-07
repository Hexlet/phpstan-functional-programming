install:
	composer install

test:
	composer exec -v phpunit tests

lint:
	composer exec -v phpcs

analyse:
	composer exec -v phpstan -- analyse -c phpstan.neon

lint-fix:
	composer exec -v phpcbf

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
