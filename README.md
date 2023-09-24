# SKELAR Shop with Admin Panel App

A demo application to illustrate working capacity of online shop with admin panel with using **Laravel 8**, **Vue 3** and **Inertia.js**.

![SKELAR Admin Shop App](https://i.ibb.co/0ZpkNkZ/skelar-admin-shop-app.png)

---
**DISCLAIMER.**

The architecture of the project was developed not considering that it is a "test task", but as a really real project that needs to be built from the very beginning.

In this version of the code, minimal use of DDD was involved - sufficient at this stage of development.

The project has some directory structures with a .gitkeep file that have been laid out for future development.

The project has a purely author's opinion about the architecture of the project and everything in it, so if you have a wish for improvement and improvement of knowledge, please let me know about it.

---

## Used Libraries:

- [Laravel](https://laravel.com/)
- [Vue.js](https://vuejs.org/)
- [Inertia.js](https://inertiajs.com/)
- [Tailwind CSS](https://tailwindcss.com/)

## Installation

**Install prerequisites:**
- nginx
- php-fpm 8.0
- composer 2.6.3
- mysql 8.0
- npm 8.19.4
- node 16.20.2
- vue 3.2.31

Clone the repo locally:

```sh
git clone https://github.com/maxbratuta/skelar-admin-shop-app.git
cd skelar-admin-shop-app
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Setup MySQL configuration

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run artisan server or you can set up **Docker**:

```sh
php artisan serve
```



You're ready to go! [SKELAR Admin Shop App](http://127.0.0.1:8000/) in your browser.
You can login as admin with:

- **Username:** admin@skelar-shop.com
- **Password:** admin

Or like a basic user:
- **Username:** user1@gmail.com
- **Password:** password


## Running tests

To run the SKELAR Admin Shop App tests, run:

```
php artisan test
```

