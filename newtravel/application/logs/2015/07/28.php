<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-07-28 16:53:15 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:53:15 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:53:18 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:53:18 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:53:40 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:53:40 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:53:41 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:53:41 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:53:41 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:53:41 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:54:37 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:54:37 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('0b2dYUi42uNvbKh...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:54:51 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:54:51 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('0588h8YsMGZLRVL...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 16:54:59 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 16:54:59 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('0b2dYUi42uNvbKh...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 17:00:06 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 17:00:06 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 17:00:06 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 17:00:06 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 17:00:07 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 17:00:07 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 17:00:07 --- ERROR: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
2015-07-28 17:00:07 --- STRACE: Database_Exception [  ]:  ~ MODPATH/database/classes/kohana/database/mysql.php [ 108 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(75): Kohana_Database_MySQL->_select_db('jishadb')
#1 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(171): Kohana_Database_MySQL->connect()
#2 /alidata/www/default/newtravel/modules/database/classes/kohana/database/mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(1800): Kohana_Database_MySQL->list_columns('admin')
#4 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(455): Kohana_ORM->list_columns()
#5 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(400): Kohana_ORM->reload_columns()
#6 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(265): Kohana_ORM->_initialize()
#7 /alidata/www/default/newtravel/modules/orm/classes/kohana/orm.php(46): Kohana_ORM->__construct(NULL)
#8 /alidata/www/default/newtravel/application/classes/common.php(751): Kohana_ORM::factory('admin')
#9 /alidata/www/default/newtravel/application/classes/stourweb/controller.php(45): Common::checkLogin('b072/o45E2PAKda...')
#10 /alidata/www/default/newtravel/application/classes/controller/index.php(6): Stourweb_Controller->before()
#11 [internal function]: Controller_Index->before()
#12 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(103): ReflectionMethod->invoke(Object(Controller_Index))
#13 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#14 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#15 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#16 {main}
2015-07-28 18:07:36 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL public/images/sort_ASC.png was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
2015-07-28 18:07:36 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL public/images/sort_ASC.png was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 87 ]
--
#0 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#2 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#3 {main}
2015-07-28 18:20:53 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''e_jisha_titile')' at line 1 [ ALTER TABLE `sline_line_extend_field` ADD COLUMN `e_jisha_titile` varchar(255) NULL DEFAULT NULL COMMENT '商品图大标题',ADD unique('e_jisha_titile'); ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-07-28 18:20:53 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''e_jisha_titile')' at line 1 [ ALTER TABLE `sline_line_extend_field` ADD COLUMN `e_jisha_titile` varchar(255) NULL DEFAULT NULL COMMENT '商品图大标题',ADD unique('e_jisha_titile'); ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, 'ALTER TABLE `sl...', false, Array)
#1 /alidata/www/default/newtravel/application/classes/common.php(805): Kohana_Database_Query->execute()
#2 /alidata/www/default/newtravel/application/classes/controller/attrid.php(627): Common::addField('sline_line_exte...', 'jisha_titile', 'varchar(255)', '1', '\xE5\x95\x86\xE5\x95\x81\xE5\x95\x81\xE5\x95\x81\xE5\xA0\x81\xE5\xA0.\xE5\xA)
#3 [internal function]: Controller_Attrid->action_ajax_extendfield_save()
#4 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Attrid))
#5 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#7 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#8 {main}
2015-07-28 18:20:57 --- ERROR: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''e_jisha_titile')' at line 1 [ ALTER TABLE `sline_line_extend_field` ADD COLUMN `e_jisha_titile` varchar(255) NULL DEFAULT NULL COMMENT '商品图大标题',ADD unique('e_jisha_titile'); ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-07-28 18:20:57 --- STRACE: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''e_jisha_titile')' at line 1 [ ALTER TABLE `sline_line_extend_field` ADD COLUMN `e_jisha_titile` varchar(255) NULL DEFAULT NULL COMMENT '商品图大标题',ADD unique('e_jisha_titile'); ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, 'ALTER TABLE `sl...', false, Array)
#1 /alidata/www/default/newtravel/application/classes/common.php(805): Kohana_Database_Query->execute()
#2 /alidata/www/default/newtravel/application/classes/controller/attrid.php(627): Common::addField('sline_line_exte...', 'jisha_titile', 'varchar(255)', '1', '\xE5\x95\x86\xE5\x95\x81\xE5\x95\x81\xE5\x95\x81\xE5\xA0\x81\xE5\xA0.\xE5\xA)
#3 [internal function]: Controller_Attrid->action_ajax_extendfield_save()
#4 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Attrid))
#5 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#7 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#8 {main}