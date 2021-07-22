<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## How to setup and install the application.

This installation process is shown in this README file is for the application and how to get it from the repository, please check the official laravel installation guide for its requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](https://www.docker.com/products/docker-desktop). 
(Personally I used a docker/wsl2/ubuntu combo to install the laravel framework.)


Clone the repository

    git clone https://github.com/Akuseru3/UrlShortener.git

Switch to the repo folder (Just an example, folder may be named different)

    cd url-shortener

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Akuseru3/UrlShortener.git
    cd url-shortener
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## How to use the application.

The app is also deployed on heroku, you can check it on this link.
https://lit-reef-51059.herokuapp.com/smallUrl

Here are some of the important urls from the website and apis, and a description on what they do. If you open the toggle you will see how to use that specific url.
<details>
<summary>http://127.0.0.1:8000/smallUrl - Url Shortener main view</summary>


The usage of this view is fairly simple. 
- The top component are just to buttons that can change what you see. This buttons change the view between the shortener and the top.
- To shorten your url, just add the link on the input box. Mark the check as NSFW if needed.
- When you click on the button, the result of your input, will appear on the botton box.

When adding urls, please add complete urls, for example, a format like -> https://www.facebook.com/

</details>

<details>
<summary>http://127.0.0.1:8000/smallUrl - Url shortener, top 100 view</summary>



 On this view you will have the next uses:
- The top component are just to buttons that can change what you see. This buttons change the view between the shortener and the top.
- On each box there is information of the top 100 entered urls, if you click on the short URL you should be redirected to the referenced url. If you want to see the complete top, just scroll down to the bottom.



</details>

<details>
<summary>http://127.0.0.1:8000/{smallCode} - Get unshortened url</summary>



This is a simple api route, if you add to the url, any small code, it will return the linked url if it has one.
For example, if your small generated url is -> https://smallUrl.com/OSPx2. Entering the code OSPx2, you will get the actual value of the linked url on the database.
</details>



<details>


<summary>http://127.0.0.1:8000/api/shortUrl - (GET METHOD) Top information</summary>
This url will return an array with all of the top urls entered on the system.
</details>



<details>



<summary>http://127.0.0.1:8000/api/shortUrl - (POST METHOD) Add new url</summary>
When you post to this url, a new url will be saved on the system if its a new one, or it will return a previous saved small url.
For example, if you want to make request on something like postman, you will need to add a body where you will enter the url to shorten, if the nsfw flag is not entered, this will be set to false by default.
 - Example body:

{
    "bigUrl": "https://www.youtube.com/watchsomething785465",
    "nsfw": 1
}



</details>

## Challenges presented during the development.

- Inexperience: I think one of the biggest challenges for me, was that I had basically zero knowledge on how does the Lavarel framework worked. I have never even had a small taste on how does lavarel manage a lot of the stuff it does, and learning how to do them was challenging. Although, if I must say, it was really enjoyable and fun, the short experience I had learning something new is something I always look for an value a lot.
- Real life, and time management: Well, to start, I wanted to work on the challenge since Saturday 17, but real life situations did not permit that. (Got sick during the weekend lol). But life is not always how you want it to be, so at monday after work, I started working on the challenge, and tried to do my best work in the amount of time I could work, balancing the other things I do in my everyday life.
- Laravel installation: Well, since I knew nothing on the framework, I didn't even knew from where to start, I must thank the wonderful people from youtube and the internet that make guides for this haha

## Desing decisions.
- Frontend: If I must say something, is that I'm a little bit rusty on the frontend department, and I know that improvement comes easily with practice, at least I think that for myself. So, to make something presentable, but not working a huge amount of time, that would make the development of the challenge a lot longer, I implemented some simple bootstrap to help me with this.

- API: Well, for the API part, I do know how to code them, but since I was new on the framework, I had to research a lot on how to manage them correctly, I followed a wonderful guide, that taught me, how to make use of pregenerated methods of a controller, with a PHP Artisan command. And then, I based the methods that I needed using those ones. **[API Management Tutorial](https://www.section.io/engineering-education/how-to-create-an-api-using-laravel/)**

- Bonus objectives: I thought of this bonus objectives as a must, because I really wanted to learn from the framework, and what better way to do it than reasearching more to develop something else! So the implementation of the NSFW Flags was on my brain since the start, and it seemed relatively conviniente to just save this on the dabase and access it and change it on the Apis creation according the the user needs.


## Future improvements
- View management: Something that I would change for a future development would definitively be this, in the moment of coding, something that worked for me was to create two blade views, and manage them from separate files accesed by different urls, but I think because this is a small development challenge, this was not really necesary, and could be done by just hiding what the user can, and cannot see.
- Website look: Since I wanted to solve the issue, but taking into account my little knowledge on the framework, the researching process made things longer, so an easy solution for the look of the website, was to use simple boostrap classes, but If you want to get really fancy, there is a lot to do to make the site look better.
- URL Validation: As of right now, it only checks if the url is in the correct format,maybe it should request to the url to see if its a correct one.
