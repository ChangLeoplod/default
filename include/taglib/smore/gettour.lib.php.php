<?php   if(!defined('SLINEINC')) exit('Request Error!');

 
require_once(SLINEINC.'/view.class.php');

function lib_gettour(&$ctag,&$refObj)
{
    global $dsql;
    include(SLINEDATA."/webinfo.php");
    $attlist="uid|";
	FillAttsDefault($ctag->CAttribute->Items,$attlist);
    extract($ctag->CAttribute->Items, EXTR_SKIP);
    $innertext = trim($ctag->GetInnerText());
    $artlist = '';
    
   global $orderid;
    $sql = "select * from sline_member_order_tourer where orderid='{$orderid}'";
    
    $dsql->SetQuery($sql);
    $dsql->Execute();
   $ctp = new STTagParse();
    $ctp->SetNameSpace("field","[","]");
    $ctp->LoadSource($innertext);
    $GLOBALS['autoindex'] = 0;
	$num=0;
    while($row = $dsql->GetArray())
    {
        $GLOBALS['autoindex']++;
        
        foreach($ctp->CTags as $tagid=>$ctag)
        {
                if($ctag->GetName()=='array')
                {
                        $ctp->Assign($tagid, $row);
                }
                else
                {
                   $ctp->Assign($tagid,$row[$ctag->GetName()]); 
                }
        }
        $revalue .= $ctp->GetResult();
        
        
    }
  
    
    
    
    return $revalue;
}

 ?>
