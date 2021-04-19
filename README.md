

# Movie theater app

This is a simple and essential project with endpoints using the most common and useful features from Laravel.


## How to setup this proyect in your computer 👀
- Clone or download this repo   
    > git clone the_url_of_this_repo
- Copy the .env.example and change the name to only .env
- Run the key command, this will generate a new key for our app
    > php artisan key:generate
- Create a database and set the credentials in the .env file
- In the terminal, inside this directory, install all the composer dependencies
    > composer install 
- Then run the migrations command with the seeders option to fill the DB with some data
    > php artisan migrate:refresh --seed 
- Finally in order to have the OAuth2 server up and running, execute this command
    > php artisan passport:install  
    
And that's it, you should be good to go 🚀

## Postman collection URL 

Here you can download the requests collection to test the endpoints in postman.

[Postman collection](https://documenter.getpostman.com/view/15436449/TzJsfyLR).

## Questions?

Feel free to reach out, https://rodriceron.me/