test:
	composer exec phpunit -- -v tests

lint:
	composer exec phpcs -- --standard=PSR12 -v src tests
	composer exec --verbose phpstan -- --level=8 analyse src tests

lint-fix:
	composer exec phpcbf -- --standard=PSR12 -v src tests

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
