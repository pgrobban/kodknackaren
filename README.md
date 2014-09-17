kodknackaren
============

This was my master thesis project, which involved creating a website that teaches children aged 13-15 programming in Javascript. 

The site is made with PHP and the Laravel framework set up with a MySQL database in the backend (currently not uploaded) and Javascript with jQuery on the frontend.

The most important parts here are the `/public` folder for the frontend and GUI, and `/app/models`, `/app/views` and `/app/controllers` for the backend stuff. In order to have a runnable learning environment, you run the following command to set up the databases:

    php artisan migrate
