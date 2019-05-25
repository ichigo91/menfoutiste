<?php
class Conf{

	static $debug = 1;

	static $databases = array(

		'default' => array(
			'host'		=> 'localhost',
			'database'	=> 'hots',
			'login'		=> 'root',
			'password'	=> ''
		)
	);
}

Router::connect('','builds');
Router::connect('builds/:id','builds/view/id:([0-9]+)');
Router::connect('heros/:id','heros/view/id:([0-9]+)');
Router::connect('maps/:id','maps/view/id:([0-9]+)');
Router::connect('users','users/login');

Router::connect('api/:action','api/index/action:([a-zA-z_]+)');
Router::connect('api/:action/:id','api/index/action:([a-zA-z_]+)/id:([0-9]+)');