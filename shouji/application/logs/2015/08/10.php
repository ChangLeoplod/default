<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-10 16:54:39 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:54:39 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(39): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 16:57:18 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:57:18 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 16:57:25 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:57:25 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 16:57:26 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:57:26 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 16:59:58 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:59:58 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 16:59:59 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 16:59:59 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:00:37 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:00:37 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:02:36 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:02:36 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:02:37 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:02:37 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:02:38 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:02:38 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:02:52 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:02:52 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:02:52 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:02:52 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:01 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:01 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:02 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:02 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:50 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:50 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:51 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:51 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:52 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:52 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:53 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:53 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:03:54 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:03:54 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:04:04 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:04:04 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:04:05 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:04:05 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 17:04:48 --- ERROR: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-10 17:04:48 --- STRACE: Database_Exception [ 1065 ]: Query was empty [  ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/test/default/shouji/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, NULL, false, Array)
#1 /alidata/test/default/shouji/application/classes/taglib/line.php(40): Kohana_Database_Query->execute()
#2 /alidata/test/default/shouji/application/cache/tplcache/mobile/index.php(30): Taglib_Line::getLine(Array)
#3 /alidata/test/default/shouji/application/classes/stourweb/view.php(72): include('/alidata/test/d...')
#4 /alidata/test/default/shouji/application/classes/stourweb/view.php(374): Stourweb_View->capture('/alidata/test/d...', Array)
#5 /alidata/test/default/shouji/application/classes/stourweb/controller.php(117): Stourweb_View->render()
#6 /alidata/test/default/shouji/application/classes/controller/index.php(19): Stourweb_Controller->display('index')
#7 [internal function]: Controller_Index->action_index()
#8 /alidata/test/default/shouji/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Index))
#9 /alidata/test/default/shouji/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#10 /alidata/test/default/shouji/system/classes/kohana/request.php(1158): Kohana_Request_Client->execute(Object(Request))
#11 /alidata/test/default/shouji/index.php(120): Kohana_Request->execute()
#12 {main}
2015-08-10 19:32:31 --- ERROR: ErrorException [ 1 ]: Call to undefined function CodeTimeout() ~ APPPATH/cache/tplcache/mobile/user/register.php [ 122 ]
2015-08-10 19:32:31 --- STRACE: ErrorException [ 1 ]: Call to undefined function CodeTimeout() ~ APPPATH/cache/tplcache/mobile/user/register.php [ 122 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 19:33:31 --- ERROR: ErrorException [ 1 ]: Call to undefined function CodeTimeout() ~ APPPATH/cache/tplcache/mobile/user/register.php [ 122 ]
2015-08-10 19:33:31 --- STRACE: ErrorException [ 1 ]: Call to undefined function CodeTimeout() ~ APPPATH/cache/tplcache/mobile/user/register.php [ 122 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:01:46 --- ERROR: ErrorException [ 1 ]: Call to undefined function GetIP() ~ APPPATH/classes/controller/user.php [ 40 ]
2015-08-10 20:01:46 --- STRACE: ErrorException [ 1 ]: Call to undefined function GetIP() ~ APPPATH/classes/controller/user.php [ 40 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:04:31 --- ERROR: ErrorException [ 1 ]: Call to a member function GetOne() on a non-object ~ APPPATH/classes/controller/user.php [ 51 ]
2015-08-10 20:04:31 --- STRACE: ErrorException [ 1 ]: Call to a member function GetOne() on a non-object ~ APPPATH/classes/controller/user.php [ 51 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:09:13 --- ERROR: ErrorException [ 1 ]: Call to undefined function getRandCode() ~ APPPATH/classes/controller/user.php [ 73 ]
2015-08-10 20:09:13 --- STRACE: ErrorException [ 1 ]: Call to undefined function getRandCode() ~ APPPATH/classes/controller/user.php [ 73 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:10:54 --- ERROR: ErrorException [ 1 ]: Class 'Helper_Archive' not found ~ APPPATH/classes/controller/user.php [ 79 ]
2015-08-10 20:10:54 --- STRACE: ErrorException [ 1 ]: Class 'Helper_Archive' not found ~ APPPATH/classes/controller/user.php [ 79 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:23:26 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:23:26 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:30:05 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:30:05 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:30:34 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:30:34 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:31:55 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:31:55 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:33:41 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:33:41 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:35:56 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:35:56 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:38:18 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:38:18 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 20:39:44 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 20:39:44 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:00:46 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 21:00:46 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:03:22 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 21:03:22 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:06:27 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 21:06:27 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:06:48 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 21:06:48 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:11:53 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 173 ]
2015-08-10 21:11:53 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 173 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:12:05 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 173 ]
2015-08-10 21:12:05 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 173 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:14:56 --- ERROR: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
2015-08-10 21:14:56 --- STRACE: ErrorException [ 1 ]: Class 'Model_sms_msg' not found ~ MODPATH/orm/classes/kohana/orm.php [ 46 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:15:43 --- ERROR: ErrorException [ 1 ]: Cannot use object of type Model_msg as array ~ APPPATH/classes/controller/user.php [ 81 ]
2015-08-10 21:15:43 --- STRACE: ErrorException [ 1 ]: Cannot use object of type Model_msg as array ~ APPPATH/classes/controller/user.php [ 81 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:15:51 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 116 ]
2015-08-10 21:15:51 --- STRACE: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH/cache/tplcache/mobile/user/order_detail.php [ 116 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:22:18 --- ERROR: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
2015-08-10 21:22:18 --- STRACE: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:22:44 --- ERROR: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
2015-08-10 21:22:44 --- STRACE: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:25:23 --- ERROR: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
2015-08-10 21:25:23 --- STRACE: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:26:12 --- ERROR: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
2015-08-10 21:26:12 --- STRACE: ErrorException [ 1 ]: Cannot use object of type Model_Sms as array ~ APPPATH/classes/controller/user.php [ 83 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}
2015-08-10 21:26:46 --- ERROR: ErrorException [ 1 ]: Class 'Msg' not found ~ APPPATH/classes/controller/user.php [ 89 ]
2015-08-10 21:26:46 --- STRACE: ErrorException [ 1 ]: Class 'Msg' not found ~ APPPATH/classes/controller/user.php [ 89 ]
--
#0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main}