<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'cookie' => array(
		'encrypted' => FALSE,
                'lifetime'=>'86400',
	),
        'native' => array(
            'name' => 'test1',
            'encrypted' => FALSE,
            'lifetime' => 604800,
        ),
);
