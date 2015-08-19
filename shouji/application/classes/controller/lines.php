<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Lines extends Stourweb_Controller{

    public function before()
    {
        parent::before();
        $this->assign('seoinfo',Common::getChannelSeo(1));
        $this->assign('cmsurl', URL::site());
        $this->assign('website', Common::getWebUrl());
    }
     


    //线路目的地列表
	public function action_index(){
		
		//定位开启了首页显示的目的地
        $sql="select b.id,b.kindname from sline_line_kindlist as a left join sline_destinations b on (a.kindid=b.id) where a.isnav=1 and b.isopen=1 order by a.displayorder asc";

        $data = DB::query(Database::SELECT,$sql)->execute()->as_array();
		
		//开启首页显示目的地的信息，每个目的地显示4条数据
		if(!empty($data)){
            foreach ($data as $key => $value) {
				$temsql = $sql="select a.id,a.linename,a.lineprice,a.linepic,a.ishidden,IFNULL(b.displayorder,9999) as displayorder from sline_line as a left join sline_kindorderlist b on (a.id=b.aid and b.typeid=1 and b.classid=".$value[id].") where find_in_set(".$value['id'].",a.kindlist) and a.ishidden=0 order by displayorder asc limit 0,4";
                $temarr =  DB::query(Database::SELECT,$temsql)->execute()->as_array();
                //去掉html标记
                foreach ($temarr as $key1 => $value1) {
					if(empty($value1['linepic'])){
						$temarr[$key1]['linepic'] = Common::getDefaultImage();

					}
                    $temarr[$key1]['lineprice'] = Model_Line::getMinPrice($value1['id']);
				} 
                $data[$key]['list'] = $temarr;
            }

            foreach ($data as $key => $value) {
                if(empty($value['list'])){
                    unset($data[$key]);
                }
            }
        }
         //print_r($data);
         $this->assign('data',$data);
         $this->display('lines/index');
	}
	 

	 //线路目的地产品列表(如果没有id则报错)
	public function action_list()
	{
		$action=Arr::get($_GET,'action');
		$kindid=Arr::get($_GET,'kindid');
		$days=Arr::get($_GET,'days');
		$attrid=Arr::get($_GET,'attrid');
		$pricetyle=Arr::get($_GET,'pricetyle');
		$page=Arr::get($_GET,'page');
		$order=Arr::get($_GET,'order');

		$keyword=Arr::get($_GET,'key');
		$w="a.id is not null and ishidden=0";
		$w.=empty($kindid)?'':" and find_in_set($kindid,a.kindlist)";
		$w.=empty($attrid)?'':" and find_in_set($attrid,a.attrid)";
		$w.=empty($days)?'':" and a.lineday=$days";

		if(empty($kindid)){
			$w.=empty($keyword)?'':" and a.linename like '%{$keyword}%'";
		}

		//如果有价格选择
 		if($pricetyle>0){
 			$pricearr =ORM::factory('line_pricelist')->where("id=$pricetyle and webid=0")->find()->as_array();
 			$w.= " and a.lineprice>=".intval($pricearr['lowerprice'])." and a.lineprice<=".intval($pricearr['highprice']);
 		}
		//排序
		$orderby = empty($order)?'order by a.modtime desc':"order by a.lineprice $order";

		//当前页数信息
		$page = empty($page)?'1':$page;
		//每页记录数
		$pagesize= 10;

		//开始记录数字
		$starnum = ($page-1)*$pagesize;
		//结速记录数字
		$limit = $starnum.','.$pagesize;
		if($kindid!=0){
			$sql="select a.id,a.aid,a.linename,a.satisfyscore,a.lineprice,a.tprice,a.attrid,a.kindlist,a.ishidden,a.linepic,IFNULL(b.displayorder,9999) as displayorder from sline_line as a left join sline_kindorderlist b on (a.id=b.aid and b.typeid=1 and b.classid=$kindid)  where $w $orderby limit  $limit";
		}else{
			$sql="select a.id,a.aid,a.linename,a.satisfyscore,a.lineprice,a.tprice,a.attrid,a.kindlist,a.ishidden,a.linepic,IFNULL(b.displayorder,9999) as displayorder from sline_line as a left join sline_kindorderlist b on (a.id=b.aid and b.typeid=1)  where $w $orderby limit  $limit";
		}
		$list=DB::query(Database::SELECT,$sql)->execute()->as_array();
		foreach ($list as $key => $value) {
		 	if(empty($value['linepic'])){
		 		$list[$key]['linepic'] = Common::getDefaultImage();

		 	}
            $list[$key]['lineprice'] = Model_Line::getMinPrice($value['id']);
		 	
		 }
		
		if($action=="ajaxline"){
			echo json_encode($list);
			exit;
		}

 		//目的地列表
		$cityname = "目的地";
		if(empty($kindid)){
			$sql_one="select b.id,b.kindname from sline_line_kindlist as a left join sline_destinations b on (a.kindid=b.id and b.isopen=1 ) where b.pid=0 order by a.displayorder asc";
         	$kindlist=DB::query(Database::SELECT,$sql_one)->execute()->as_array();
		}else{
			$pidkind =ORM::factory('destinations')->where("id=$kindid")->find()->as_array();
			$cityname = $pidkind['kindname'];
			$pid = $pidkind['pid'];
			$sqlkind="select b.id,b.kindname from sline_line_kindlist as a left join sline_destinations b on (a.kindid=b.id and b.isopen=1 ) where b.pid=".$kindid." order by a.displayorder asc";
	 		$kindlist=DB::query(Database::SELECT,$sqlkind)->execute()->as_array();
	 		if(empty($kindlist)){
	 			$pid = $pidkind['pid'];
	 			$sqlkind="select b.id,b.kindname from sline_line_kindlist as a left join sline_destinations b on (a.kindid=b.id and b.isopen=1 ) where b.pid=".$pid." order by a.displayorder asc";
	 			$kindlist=DB::query(Database::SELECT,$sqlkind)->execute()->as_array();
	 		}
		}

 		//行程天数列表
 		$daysname = "行程天数";
 		$daylist = ORM::factory('line_day')->where("webid=0")->get_all();
 		foreach ($daylist as $key => $value) {
        	if($value['id']==$days){
        		$daysname = $value['word'].'日游';
        	}
         }
 		//出游方式列表
        $travelname = "出游方式";
        if(empty($attrid)){
			$travellist = ORM::factory('line_attr')->where("webid=0 and pid=0")->order_by("displayorder",'asc')->get_all();
        }else{
        	$temattr = ORM::factory('line_attr')->where("id=".$attrid)->find()->as_array();
		 	$travelname = $temattr['attrname'];
		 	$pid = $temattr['pid'];
		 	$travellist=ORM::factory('line_attr')->where("pid=".$attrid." and webid=0")->order_by("displayorder",'asc')->get_all();
		 	if(empty($travellist)){
		 		$travellist=ORM::factory('line_attr')->where("pid=".$pid." and webid=0")->order_by("displayorder",'asc')->get_all();
		 	}
        }
 		

 		//价格区间列表
        $pricename = "价格区间";
 		$pricelist = ORM::factory('line_pricelist')->where("webid=0")->get_all();
 		foreach ($pricelist as $key => $value) {
        	if($value['id']==$pricetyle){
        		$pricename = intval($value['lowerprice']).'-'.intval($value['highprice']);
        	}
         }

 		//列表传递
 		$this->assign('kindlist',$kindlist);
        $this->assign('dayslist',$daylist);
		$this->assign('attrlist',$travellist);
        $this->assign('pricelist',$pricelist);



		//参数传递
		$this->assign('kindid',$kindid);
		$this->assign('pricename',$pricename);
		$this->assign('travelname',$travelname);
		$this->assign('daysname',$daysname);
		$this->assign('kindname',$cityname);
		$this->assign('pid',$pid);
        $this->assign('days',$days);
		$this->assign('attrid',$attrid);
        $this->assign('pricetyle',$pricetyle);
        $this->assign('order',$order);

        $this->assign('key',$keyword);
		$this->assign('list',$list);
		$this->display('lines/list');
	}


	//产品详情
	public function action_show()
	{
		$tel=Common::getSysPara('cfg_phone');
		$lineid=$this->params['id'];
		if(empty($lineid)){
			echo "产品信息错误！";
			exit;
		}
		//产品信息
		$row =ORM::factory('line')->where("id=$lineid")->find()->as_array();
        $row['lineprice'] = Model_Line::getMinPrice($lineid);
	 	if(empty($row['linepic'])){
	 		$row['linepic'] = Common::getDefaultImage();
	 	}

		$row['lineseries'] = Common::getSeries($row['id'],'01');//线路编号

		//如果行程类型为2
		if($row['isstyle']=='2'){
			$temjeishao = ORM::factory('line_jieshao')->where("lineid=".$row['id'])->order_by("day",'asc')->limit($row['lineday'])->get_all();
			
			/*foreach ($temjeishao as $key => $value) {
				//$value['jieshao'] = strip_tags($value['jieshao']);
				//$value['jieshao'] = Common::clearHtml($value['jieshao']);
				$temjeishao[$key]['jieshao'] = $value['jieshao'];
			}*/
			$row['linejieshao_arr']=$temjeishao;
		}
        else
        {

        }

		//产品图片
		if(!empty($row['piclist'])){
			$temarr = explode(",",$row['piclist']);
			foreach ($temarr as $key => $value) {
				$row['pic_arr'][$key] = explode("||",$value);
			}
		}
                $linedisc = ORM::factory('line_content')->where("webid=0 and isopen=1 and isline=0 and columnname<>'linespot' and columnname<>'tupian' and columnname<>'features'")->order_by("displayorder",'asc')->get_all();
                foreach ($linedisc as $k=>$v) {
                    if (!$row[$v['columnname']]) {
                        unset($linedisc[$k]);
                    }
                }
		$this->assign('linedisc',$linedisc);
                $suit =ORM::factory('line_suit')->where("lineid=$lineid")->get_all();
		$this->assign('row',$row);
		$this->assign('suit',$suit);
		$this->assign('phone',$tel);
		$this->display('lines/show');

	}

	//产品预订
	public function action_create()
	{
		self::checkMid();
		$suitid=$this->params['id'];
		
		$row =ORM::factory('line_suit')->where("id=$suitid")->find()->as_array();
		        
		$this->assign('row',$row);
		$this->assign('suitid',$suitid);
		$this->display('lines/select');
	}
        
        //套餐日历
    public function action_rili() {
        $mdays=date("t");    //当月总天数  
        $datedatenow=date("j");  //当日日期  
        $monthnow=Arr::get($_POST,'m')?Arr::get($_POST,'m'):date("n"); //当月月份  
        $yearnow=Arr::get($_POST,'y')?Arr::get($_POST,'y'):date("Y");  //当年年份 
        $suitid =Arr::get($_POST,'suitid');
        //计算当月第一天是星期几  
        $wk1st=date("w",mktime(0,0,0,$monthnow,1,$yearnow));  
        $trnum=ceil(($mdays+$wk1st)/7); //计算表格行数  
        //以下是表格字串  
        $tabstr="<tr class=\"grey\"><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr>";  

        for($i=0;$i<$trnum;$i++) {  
           $tabstr.="<tr>";  
           for($k=0;$k<7;$k++) { //每行七个单元格  
              $tabidx=$i*7+$k; //取得单元格自身序号  
              //若单元格序号小于当月第一天的星期数($wk1st)或大于(月总数+$wk1st)  
              //只填写空格，反之，写入日期  
              ($tabidx<$wk1st or $tabidx>$mdays+$wk1st-1) ? $dayecho="&nbsp" : $dayecho=$tabidx-$wk1st+1;  
              //突出标明今日日期 
              $now = strtotime($yearnow.'-'.$monthnow.'-'.$dayecho);
              if ($dayecho>=1&&$now>time()) {
                  
                  $price = ORM::factory('line_suit_price')->where("suitid='{$suitid}' and day='{$now}'")->find()->as_array
();
                  if ($price['number']>0 || $price['number']=='-1') {
                    if ($price['number']=='-1') {
                        $number='充足';
                        $price['number']=999;
                    }else {
                        $number=$price['number'];
                    }
                    $tabstr.="<td class=\"have\" data-price=\"{$price['adultprice']}\" data-childprice=\"{$price
['childprice']}\" data-roombalance=\"{$price['roombalance']}\" data-number=\"{$price['number']}\" data-day=\"{$now}
\"><strong>{$dayecho}</strong><div class=\"font10 text-right\"><div>￥{$price['adultprice']}</div>{$number}</div></td>";
                  } elseif($price['number']==0){
                      $tabstr.="<td class=\"active\"><strong>{$dayecho}</strong><div class=\"font10 text-
right\"><div>￥{$price['adultprice']}</div>售馨</div></td>";
                  } else {
                    $tabstr.="<td>{$dayecho}</td>";
                  }
              } else {
                    $tabstr.="<td>{$dayecho}</td>";
              }
           }  
           $tabstr.="</tr>";  
        }
        $nexttime = strtotime($yearnow.'-'.$monthnow.'-'.$mdays);
        $next = ORM::factory('line_suit_price')->where("suitid='{$suitid}' and day>'{$nexttime}'")->find()->as_array();
        if ($next['lineid']) {
            $nextmonth = $monthnow+1;
            $nextyear = $yearnow;
            if ($nextmonth>12) {
                $nextmonth = 1;
                $nextyear++;
            }
            $arr['nextmonth'] = $nextmonth;
            $arr['nextyear'] = $nextyear;
        }
        $pretime = strtotime($yearnow.'-'.$monthnow.'-1');
        $pre = ORM::factory('line_suit_price')->where("suitid='{$suitid}' and day<'{$pretime}'")->find()->as_array();
        if ($pre['lineid']) {
            $premonth = $monthnow-1;
            $preyear = $yearnow;
            if ($premonth<1) {
                $premonth = 12;
                $preyear--;
            }
            $arr['premonth'] = $premonth;
            $arr['preyear'] = $preyear;
        }
        
        $arr['status'] = 1;
        $arr['source'] = $tabstr;
        echo json_encode($arr);
    }
    //by jlzhang
    //for mobile
    //一日游
    public function action_daytrips() {
        $dest_id = $attr_id = $p = 0;
        $dest_id=intval(Arr::get($_GET,'dest_id'));
        $p=intval(Arr::get($_GET,'p'));
        $attr_id=intval(Arr::get($_GET,'attr_id'));
        $action=Arr::get($_GET,'action');
        $page=intval(Arr::get($_GET,'page'));
        
        $price = array (
            '1'=>'lineprice >=100 and lineprice<300',
            '2'=>'lineprice >=300 and lineprice<500',
            '3'=>'lineprice >=500 and lineprice<1000',
            '4'=>'lineprice >=1000 and lineprice<2000',
        );
    
        $sql="select a.* from sline_destinations a where a.pid = '0' and a.isopen=1 order by a.displayorder asc ";
        $dest = DB::query(Database::SELECT,$sql)->execute()->as_array();
        
        $sql="select a.* from sline_line_attr a where a.id<>'161' and a.id<>'162' and a.pid <> '0' and a.isopen=1 order by a.displayorder asc ";
        $attr = DB::query(Database::SELECT, $sql)->execute()->as_array();
    
        if ($attr_id) {
            $find = "FIND_IN_SET('{$attr_id}',a.attrid)";
        } else {
            $find = 'CONCAT(a.attrid,",") not like "%162,%" ';
        }
        if ($dest_id) {
            $w .= " and FIND_IN_SET('{$dest_id}',a.kindlist)";
        }
        if ($p) {
            $w .= " and ".$price[$p];
        }
        $pagesize = 5;
        if ($page<1) {
            $page =1;
        }
        $startnum = ($page-1)*$pagesize;
            if ($startnum<0) {
                $startnum=0;
        }
        
        $sql="select * from sline_line a where {$find} {$w} and  a.ishidden=0  order by a.displayorder asc,a.modtime desc,a.addtime desc limit $startnum,$pagesize";
        $list = DB::query(Database::SELECT,$sql)->execute()->as_array();
        /*if(count($list)==0)
        {
            exit;
        }*/
        
        if($action=="ajaxline"){
            echo json_encode($list);
            exit;
        }
        
        $this->assign('list', $list);
        $this->assign('dest_id', $dest_id);
        $this->assign('dest', $dest);
        $this->assign('attr_id', $attr_id);
        $this->assign('attr',$attr);
        $this->assign('p', $p);

        $this->display('lines/daytrips');
    }
    
    //by jlzhang
    //for mobile
    //套餐
    public function action_packages() {
        $dest_id = $d = $p = 0;
        $dest_id=intval(Arr::get($_GET,'dest_id'));
        $p=intval(Arr::get($_GET,'p'));
        $d=intval(Arr::get($_GET,'d'));
        $action=Arr::get($_GET,'action');
        $page=intval(Arr::get($_GET,'page'));
        
        $price = array (
            '1'=>'lineprice >=1000 and lineprice<3000',
            '2'=>'lineprice >=3000 and lineprice<5000',
            '3'=>'lineprice >=5000 and lineprice<10000',
            '4'=>'lineprice >=10000 and lineprice<20000',
        );
        $day = array(
            '1'=>'lineday=4',
            '2'=>'lineday=5',
            '3'=>'lineday=6',
            '4'=>'lineday=7',
            '5'=>'lineday=8',
        );

        $sql="select a.* from sline_destinations a where a.pid = '0' and a.isopen=1 order by a.displayorder asc ";
        
        $dest = DB::query(Database::SELECT,$sql)->execute()->as_array();
        $w=1;

        if ($dest_id) {
            $w .= " and FIND_IN_SET('{$dest_id}',a.kindlist)";
        }
        if ($p) {
            $w .= " and ".$price[$p];
        }
        if ($d) {
            $w .= " and ".$day[$d];
        }
        $sql="select count(id) as amount from sline_line a where {$w} and FIND_IN_SET('165',a.attrid) and  a.ishidden=0";
        $amount = DB::query(Database::SELECT,$sql)->execute();
        $total = $amount['amount'];

        $pagesize = 5;
        if ($page<1) {
            $page =1;
        }
        $startnum = ($page-1)*$pagesize;
            if ($startnum<0) {
                $startnum=0;
        }
        $sql="select * from sline_line a where {$w} and FIND_IN_SET('165',a.attrid) and  a.ishidden=0  order by a.displayorder asc,a.modtime desc,a.addtime desc limit $startnum,$pagesize";
        $list = DB::query(Database::SELECT,$sql)->execute()->as_array();
        /*if(count($list)==0)
        {
            exit;
        }*/
        if($action=="ajaxline"){
            echo json_encode($list);
            exit;
        }
        
        $this->assign('list', $list);
        $this->assign('p', $p);
        $this->assign('dest', $dest);
        $this->assign('dest_id', $dest_id);
        $this->assign('d', $d);
        $this->assign('total', $total);
       
        //$pv->GetChannelKeywords($typeid);//根据栏目类型获取关键词.介绍,栏目名称

        $this->display('lines/packages');
    }
    
    private function checkMid()
    {
        $this->user = $GLOBALS['userinfo'];
        $this->mid = $this->user['mid'] ? $this->user['mid'] : 0;
        if(empty($this->mid))
         $this->request->redirect('user/login');
    }
}
