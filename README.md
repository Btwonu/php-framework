# Minimal PHP MVC Framework

---

## File structure

```
php-framework:
│   .gitignore
│   .htaccess
│   .prettierignore
│   .prettierrc.json
│   bootstrap.php
│   composer.json
│   composer.lock
│   index.php
│   package-lock.json
│   README.md
│   routes.php
│
├───controllers
│       PageController.php
│       PostController.php
│
├───core
│       App.php
│       Router.php
│
├───css
│       style.css
│
├───db
│       Connection.php
│       Database.php
│       example-config.php
│
├───fonts
│
├───models
│       Post.php
│
├───partials
│       footer.php
│       header.php
│
└───views
        404.view.php
        about.view.php
        contact.view.php
        index.view.php
        posts.view.php
```

---

## In a nutshell

Bootstrapping of the applications begins in `index.php`, which loads the general config, autoloads the classes and then initializes `Router` and loads the routes.

Routes can be registered in `routes.php` and assigned to a Controller, e.g.:

```
$router->get('posts', 'PostController@index');
$router->post('posts', 'PostController@post');
```

The `Database` class uses PDO to define CRUD methods.
The `App` class acts like a container and initializes a `Database` instance. The controllers can then use this Database to perform CRUD operations like so:

```
$posts = App::get('database')->getAll('posts');
```

The next steps I want to take is to Refactor the Router to use dependency injection to receive the controllers and be able to register routes with dynamic parameters, e.g.:

```
$router->post('posts/:id', 'PostController@update');
```
