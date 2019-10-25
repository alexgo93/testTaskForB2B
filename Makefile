install:
	composer install
lint:
	composer run-script phpcs -- --standard=PSR1,PSR2 src/task2
fix-lint:
	composer run-script phpcbf -- --standard=PSR1,PSR2 src/task2
update:
	composer update
rec:
	asciinema rec