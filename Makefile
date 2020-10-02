install:
	composer install

test:
	composer exec -v phpunit tests

lint:
	composer exec -v phpcs src tests
	composer exec -v phpstan -- analyse -c phpstan.neon

lint-fix:
	composer exec phpcbf -- --standard=PSR12 -v src tests

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
