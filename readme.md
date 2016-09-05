# 7Lab assessment
A project to show what my skills are.

## Postman
I used postman to test my API. A link to the collection I used to test can be found here: https://www.getpostman.com/collections/f3b45a67d1420d470372.

Don't forget to change the authentication token in the header of your requests.

## Installation

### Get the code
```
$ git clone git@github.com:jurgentreep/7lab-assessment.git
$ cd 7lab-assessment
$ composer install
```

### Create the database
```
$ php artisan migrate
$ php artisan db:seed
```

## Usage
Depending on what you prefer you can create a virtual host or run:
```
$ php artisan serve
```
After that you'll be able to open the collection I [linked](https://www.getpostman.com/collections/f3b45a67d1420d470372) in Postman and after changing the hostname you can start sending requests to test the api.
