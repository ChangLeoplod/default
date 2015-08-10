<?php
return array
(
    'default' => array
    (
        'type'       => 'mysql',
        'connection' => array(
            'hostname'   => 'rdsbh2o57pn94642bx73.mysql.rds.aliyuncs.com:3306',

            'database'   => 'jishatestdb',
            'username'   => 'testguangyou',
            'password'   => 'testguangyou',
            'persistent' => FALSE,
        ),
        'table_prefix' => 'sline_',
        'charset'      => 'utf8',
        'caching'      => FALSE,
        'profiling'    => TRUE,
    ),

);