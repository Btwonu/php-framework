<?php

define( 'BASE_URL', '/personal-projects/php-skeleton/' );

use Core\App as App;
use DB\Database as Database;
use DB\Connection as Connection;

App::set('config', require 'db/config.php');
App::set('database', new Database(
	Connection::create( App::get('config')['database'] )
));
