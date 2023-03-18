run_docker:
	- docker-compose up -d

clean:
	- sudo rm -rf vendor
	- docker-compose down

start:
	- docker-compose start
	- docker exec projeto3-php8 composer install
	- docker exec projeto3-php8 php artisan config:cache
	- docker exec projeto3-php8 storage:link
	- sudo chown -R 33:33 bootstrap/ storage/
