<?php
return [
	'database' => [
		'name' => 'il99590',
		'username' => 'il99590',
		'password' => 'secret',
		'connection' => 'pgsql:host=dbstud2.sis.uta.fi', //'mysql:host=127.0.0.1',
		'options' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
];
