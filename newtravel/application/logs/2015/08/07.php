<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-08-07 14:44:20 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'paysource' in 'field list' [ select paysource from sline_member_order where paysource is not null group by paysource ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-07 14:44:20 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'paysource' in 'field list' [ select paysource from sline_member_order where paysource is not null group by paysource ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, 'select paysourc...', false, Array)
#1 /alidata/www/default/newtravel/application/classes/model/member/order.php(104): Kohana_Database_Query->execute()
#2 /alidata/www/default/newtravel/application/classes/controller/order.php(142): Model_Member_Order::getPaySources()
#3 [internal function]: Controller_Order->action_index()
#4 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#5 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#7 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#8 {main}
2015-08-07 14:44:24 --- ERROR: Database_Exception [ 1054 ]: Unknown column 'paysource' in 'field list' [ select paysource from sline_member_order where paysource is not null group by paysource ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
2015-08-07 14:44:24 --- STRACE: Database_Exception [ 1054 ]: Unknown column 'paysource' in 'field list' [ select paysource from sline_member_order where paysource is not null group by paysource ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 194 ]
--
#0 /alidata/www/default/newtravel/modules/database/classes/kohana/database/query.php(251): Kohana_Database_MySQL->query(1, 'select paysourc...', false, Array)
#1 /alidata/www/default/newtravel/application/classes/model/member/order.php(104): Kohana_Database_Query->execute()
#2 /alidata/www/default/newtravel/application/classes/controller/order.php(142): Model_Member_Order::getPaySources()
#3 [internal function]: Controller_Order->action_index()
#4 /alidata/www/default/newtravel/system/classes/kohana/request/client/internal.php(116): ReflectionMethod->invoke(Object(Controller_Order))
#5 /alidata/www/default/newtravel/system/classes/kohana/request/client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#6 /alidata/www/default/newtravel/system/classes/kohana/request.php(1160): Kohana_Request_Client->execute(Object(Request))
#7 /alidata/www/default/newtravel/index.php(121): Kohana_Request->execute()
#8 {main}