<?php

define( 'BASE_URL', '/personal-projects/php-framework/' );

use Core\App as App;
use DB\QueryBuilder as QueryBuilder;
use DB\Connection as Connection;

App::set('config', require 'db/config.php');
App::set('database', new QueryBuilder(
	Connection::create( App::get('config')['database'] )
));
