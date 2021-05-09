# FoodChoose

FoodChoose (https://www.foodchoose.nl/) is build by Robert van Lienden (https://www.robertvanlienden.nl/). \
The application is written in Dutch without translations.

Because I don't maintain this project active, I've decided to publish the code open-source on GitHub for learning purposes.

Do you see improvements and/or do you want to add/improve some features?
Feel free to get in contact with me (mail@robertvanlienden / [Twitter @Robertvlienden](https://www.twitter.com/robertvlienden) )

The code for https://www.foodchoose.nl/ (live env) is stored on a private GitLab repo.

## Used frameworks/tools

- Laravel Framework
- VueJs
- Checkout the `composer.json` and `package.json` for the complete list

## Docker

This project includes a docker-compose with MySQL, Nginx and PHP 7.2 alpine.
Lets run it!

1. `ln -s .env.docker .env`

2. `nvm use`

3. `npm install`

4. `npm run development`

5. `docker-compose up --build`

After this command, the app will be serverd on;
http://localhost:8080

## Database seeds

You can seed some default data with the command;\
`make clean-start`

This will remove the existing database and seeds some default data.

By default there are 2 users in the seed.

1. Username: test@test.nl - Password: test1234
2. Username: test@test.com - Password: test1234

## Unit test

I've made some unit tests, but they are not working in the docker environment.

For now, I just let them be as they are.
