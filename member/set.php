<?php
/**
 * @version        $Id: index.php 1 8:24 2014年2月17日 netman $
 * @package        Smore.User
 */

require_once(dirname(__FILE__)."/config.php");
require_once(dirname(__FILE__)."/../data/webinfo.php");
if(!$User->isLogin())
{
	header("Location: " . $cfg_cmsurl . "/member/login.php");
	exit;
}

$uid=empty($uid)? "" : RemoveXSS($uid);

$pv = new View(0);
global $dsql;
 $userinfo = $User->getInfoByMid($uid);
		
		foreach($userinfo as $key=>$value)
		{
		  $pv->Fields[$key] = $value;  
		}
$pv->Fields['litpic'] = empty($pv->Fields['litpic']) ? $GLOBALS['cfg_templets_skin'].'/images/member_default.gif' : $pv->Fields['litpic'];
$pv->Fields['list'] = $arr;
$pv->Fields['ordername'] = $ordername;

$pv->Fields['typeid'] = $typeid; //当前页面,用于左侧导航选中

//$pv->Fields['pagename'] = $pagename;

$pv->SetTemplet(MEMBERTEMPLET."set.htm");

$pv->Display();

exit();







