up:
	@docker-compose up -d
down:
	@docker-compose down
restart:
	@docker-compose restart
clean-start:
	@echo "CJ: 'Ah shit, here we go again...'"
	@docker-compose exec app php artisan migrate:fresh
	@docker-compose exec app php artisan db:seed --class=DatabaseSeeder
	@docker-compose exec app php artisan update:api
	@echo "CJ: 'Let's go, let's go!'"
ssh:
	@docker-compose exec app sh
ssh-database:
	@docker-compose exec database mysql -uroot -p foodchoose
