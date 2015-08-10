<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-04 17:32:05 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:32:05 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:32:36 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:32:36 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:32:41 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:32:41 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:33:45 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:33:45 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:33:51 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:33:51 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:33:57 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:33:57 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:41:13 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:41:13 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:42:02 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:42:02 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:42:05 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:42:05 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:42:35 --- ERROR: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-04 17:42:35 --- STRACE: ErrorException [ 1 ]: Class 'Model_order_tourer' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-04 17:46:15 --- ERROR: Kohana_Exception [ 0 ]: The tourname property does not exist in the Model_Tourer class ~ MODPATH/orm/classes/kohana/orm.php [ 771 ]
2015-08-04 17:46:15 --- STRACE: Kohana_Exception [ 0 ]: The tourname property does not exist in the Model_Tourer class ~ MODPATH/orm/classes/kohana/orm.php [ 771 ]
--
#0 /alidata/test/default/newtravel/modules/orm/classes/kohana/orm.php(713): Kohana_ORM->set('tourname', '124')
#1 /alidata/test/default/newtravel/application/classes/controller/order.php(344): Kohana_ORM->__set('tourname', '124')
#2 [internal function]: Controller_Order->action_ajax_save()
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#4 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#6 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#7 {main}
2015-08-04 17:46:25 --- ERROR: Kohana_Exception [ 0 ]: The tourname property does not exist in the Model_Tourer class ~ MODPATH/orm/classes/kohana/orm.php [ 771 ]
2015-08-04 17:46:25 --- STRACE: Kohana_Exception [ 0 ]: The tourname property does not exist in the Model_Tourer class ~ MODPATH/orm/classes/kohana/orm.php [ 771 ]
--
#0 /alidata/test/default/newtravel/modules/orm/classes/kohana/orm.php(713): Kohana_ORM->set('tourname', '124')
#1 /alidata/test/default/newtravel/application/classes/controller/order.php(344): Kohana_ORM->__set('tourname', '124')
#2 [internal function]: Controller_Order->action_ajax_save()
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#4 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#5 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#6 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#7 {main}
2015-08-04 18:12:37 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
2015-08-04 18:12:37 --- STRACE: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
--
#0 /alidata/test/default/newtravel/application/classes/controller/order.php(355): Kohana_ORM->delete()
#1 [internal function]: Controller_Order->action_ajax_save()
#2 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#5 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#6 {main}
2015-08-04 18:13:08 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
2015-08-04 18:13:08 --- STRACE: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
--
#0 /alidata/test/default/newtravel/application/classes/controller/order.php(355): Kohana_ORM->delete()
#1 [internal function]: Controller_Order->action_ajax_save()
#2 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#5 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#6 {main}
2015-08-04 18:14:26 --- ERROR: Kohana_Exception [ 0 ]: Cannot update tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1486 ]
2015-08-04 18:14:26 --- STRACE: Kohana_Exception [ 0 ]: Cannot update tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1486 ]
--
#0 /alidata/test/default/newtravel/application/classes/controller/order.php(365): Kohana_ORM->update()
#1 [internal function]: Controller_Order->action_ajax_save()
#2 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#5 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#6 {main}
2015-08-04 18:14:30 --- ERROR: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
2015-08-04 18:14:30 --- STRACE: Kohana_Exception [ 0 ]: Cannot delete tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1566 ]
--
#0 /alidata/test/default/newtravel/application/classes/controller/order.php(355): Kohana_ORM->delete()
#1 [internal function]: Controller_Order->action_ajax_save()
#2 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#5 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#6 {main}
2015-08-04 18:15:59 --- ERROR: Kohana_Exception [ 0 ]: Cannot update tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1486 ]
2015-08-04 18:15:59 --- STRACE: Kohana_Exception [ 0 ]: Cannot update tourer model because it is not loaded. ~ MODPATH/orm/classes/kohana/orm.php [ 1486 ]
--
#0 /alidata/test/default/newtravel/application/classes/controller/order.php(365): Kohana_ORM->update()
#1 [internal function]: Controller_Order->action_ajax_save()
#2 /alidata/test/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#3 /alidata/test/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#4 /alidata/test/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#5 /alidata/test/default/newtravel/index.php(121): Kohana_Request->execute()
#6 {main}