# Wittr Sockets

A [Laravel-websockets](https://github.com/beyondcode/laravel-websockets-demo) powered twitter clone.

## Getting Started

This project was born out of the love for twitter and its way of handling real time on the DOM.

### Prerequisites

Make sure you have the following installed on your machine,then follow the steps below to get this project up and running

```
npm 
composer
php 7.*
```


## Installing

I will be giving you a step by step approach on how to get this project up and running on your machine.

Firstly, run the following commands

```
git clone https://github.com/chuks-o/wittr-sockets.git
composer install
npm install
```

Rename the .env.example file to:
```
.env
```
For this project, I made use of postgres database as well as its configuration, you can change it to your preferred database in the .env file


### Starting the Websocket server
In the root of your project, run the following command:

```
php artisan websockets:serve
```

### Starting the Laravel Server
Also in the root of your project, run the following command to serve your laravel app

```
php artisan serve
```

And finally, compile the Vue files with:
```
npm run dev
```

If you wish to make changes to the Vue files and also watch for your changes, then use this below inplace of the command above:
```
npm run watch
```


## Built With

* [Laravel Websockets](https://github.com/beyondcode/laravel-websockets-demo) - The self hosted websocket used.
* [Bootstrap](https://getboostrap.com/docs/4.0/) - UI framework used.


## Contributing

Please read [CONTRIBUTING.md]() for details on our code of conduct, and the process for submitting pull requests to us.



## Author

* **Okpala Chukwualasu** - Follow me on [twitter](https://twitter.com/commandline_)

