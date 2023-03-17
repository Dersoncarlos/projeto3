run_docker:
	docker-compose up -d

clean:
	- sudo rm -rf vendor
	- docker-compose down

run:
	- docker-compose start
	- docker exec projeto3-php8 composer install
	- docker exec projeto3-php8 php artisan config:cache
	- sudo chown -R 33:33 bootstrap/ storage/
