<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to setup and install the application.

This installation process is shown in this README file is for the application and how to get it from the repository, please check the official laravel installation guide for its requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 
(Personally I used a docker/wsl2/ubuntu combo to install the laravel framework.)

You will have to create a folder and clone the repository in that directory, for this installation example the folder is called: url-shortener

Clone the repository

    git clone git@github.com:Akuseru3/UrlShortener.git

Switch to the repo folder

    cd url-shortener

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Challenges presented during the development.

- Inexperience: I think one of the biggest challenges for me, was that I had basically zero knowledge on how does the Lavarel framework well, works. I had never even had a small check on how does lavarel manage a lot of the stuff it does, and learning how to do them was challenging. Although, if i must say, it was really enjoyable and fun, the short experience I had learning something new is something I always look for an value a lot.
- Real life, and time management: Well, to start, I wanted to work on the challenge since Saturday 17, but real life situations did not permit that. (Got sick during the weekend lol). But life is not always how you want it to be, so at monday after work, I started working on the challenge, and tried to do my best work in the amount of time I could work, balancing the other things I do in my everyday life.
- Laravel installation: Well, since I knew nothing on the framework, I didn't even knew from where to start, I must thank the wonderful people from youtube and the internet that make guides for this haha

## Desing decisions.
- Frontend: If I must say something, is that I'm a little bit rusty on the frontend department, and I know that improvement comes easily with practice, at least I think that for myself. So, to make something presentable, but not working a huge amount of time, that would make the development of the challenge a lot longer, I implemented some simple bootstrap to help me with this.

- API: Well, for the API part, I do know how to code them, but since I was new on the framework, I had to research a lot on how to manage them correctly, I followed a wonderful guide, that taught me, how to make use of pregenerated methods of a controller, with a PHP Artisan command. And then, I based the method that I needed using those ones. **[API Management Tutorial](https://www.section.io/engineering-education/how-to-create-an-api-using-laravel/)**

- Bonus objectives: I thought of this bonus objectives as a must, because I really wanted to learn from the framework, and what better way to do it than reasearching more to develop something else! So the implementation of the NSFW Flags was on my brain since the start, and it seemed relatively conviniente to just save this on the dabase and access it and change it on the Apis creation according the the user needs.


## Future improvements
- View management: Something that I would change for a future development would definitively be this, in the moment of coding, something that worked for me was to create two blade views, and manage them from separate files accesed by different urls, but I think because this is a small development challenge, this was not really necesary, and could be done by just hiding what the user can, and cannot see.
- Website look: Since I wanted to solve the issue, but taking into account my little knowledge on the framework, the researching process made things longer, so an easy solution for the look of the website, was to use simple boostrap classes, but If you want to get really fancy, there is a lot to do to make the site look better.

