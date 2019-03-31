#!/usr/bin/env bash

ssh -i ~/.ssh/samantha.pem ubuntu@ec2-52-38-225-26.us-west-2.compute.amazonaws.com -T <<EOF
	cd /var/www/staging/de-beers-avatar

	printf "Pulling from staging...\n"
	git stash
	git pull
	git stash clear

	printf "Installing dependencies...\n"
	composer install
	composer dump-autoload
	npm install

	printf "Building assets...\n"
	npm run build

	printf "Clearing cache...\n"
	php artisan cache:clear
	php artisan config:clear
	php artisan queue:restart
	exit
EOF
