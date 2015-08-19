<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<title>积沙旅行 - 专注出境自由行</title>
 <?php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); ?>
 <?php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); ?>
</head>
<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">积沙旅行</li>
         <li class="pull-right li3"><a href="<?php echo $cmsurl;?>user/index" class="baseicon block pull-right member"></a><a href="#" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main">
        <div class="slider">
              <ul class="m0 p0 white">
                <?php $line_tag = new Taglib_Line();if (method_exists($line_tag, 'getline')) {$data = $line_tag->getline(array('action'=>'getline','row'=>'10','flag'=>'attribute','attrid'=>'162',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $k => $v) { ?>
                    <li><a href="<?php echo $v['url'];?>" ><img src="<?php echo $v['mobilepic'];?>" alt="<?php echo $v['linename'];?>"></a><div class="posa"><p class="font17 m0 bold"> <?php echo $v['linetitle'];?></p><?php echo $v['linesubtitle'];?></div></li>
                    <?php $n++;}unset($n); } ?>
                
              </ul>
        </div>
        <script>
          $(".slider").yxMobileSlider({width:640,height:328,during:5000})
        </script>
        <!--<div class="bg-white p15 recommend o-hidden bbe3">
            <ul class="m0 p0 text-center">
                <a href="<?php echo $cmsurl;?>lines/packages"><li class="w25 pull-left"><img src="public/images/ad/super.png"><span class="block mt5">超级自由行</span></li></a>
              <a href="<?php echo $cmsurl;?>lines/daytrips"><li class="w25 pull-left"><img src="public/images/ad/mudidi.png"><span class="block mt5">目的地</span></li></a>
               <a href="<?php echo $cmsurl;?>lines/daytrips"><li class="w25 pull-left"><img src="public/images/ad/brand.png"><span class="block mt5">品牌优势</span></li></a>
               <a href="<?php echo $cmsurl;?>lines/daytrips"><li class="w25 pull-left"><img src="public/images/ad/help.png"><span class="block mt5">帮助中心</span></li></a>
            </ul>
        </div> -->

        <div class="bg-white p15 recommend o-hidden bbe3">
            <ul class="m0 p0 text-center">
                <a href="<?php echo $cmsurl;?>lines/packages" >
                <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">套餐</span></li>
                </a>
                <a href="<?php echo $cmsurl;?>lines/daytrips" >
                <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">一日游</span></li>
                </a>
                <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
                <li class="w25 posr pull-left"><img src="public/images/ad/ad_05.jpg"><span class="posa white">吉林岛</span></li>
            </ul>
        </div>
        
        <div class="select-one p10 bte3 bbe3 mt10 bg-white o-hidden">
             <div class="panel-title posr p5">
                <a href="<?php echo $cmsurl;?>lines/packages"><h2 class="m0 font16">超级自由行当季热销</h2>
                <p class="font12 grey mt5">经典线路玩法，一口价全包超省心。</p></a>
                <div class="more posa baseicon"></div>
             </div>  
             <ul class="m0 p0">
                <?php $line_tag = new Taglib_Line();if (method_exists($line_tag, 'getline')) {$data = $line_tag->getline(array('action'=>'getline','row'=>'10','flag'=>'attribute','attrid'=>'164',));}?>
                    <?php $n=1; if(is_array($data)) { foreach($data as $k => $v) { ?>
                 <li class="pull-left w50 p5 posr">
                    <a href="<?php echo $v['url'];?>"> <img src="<?php echo $v['packpic'];?>">
                    <div class="text posa white o-hidden">
                        <div class="posa o-hidden">
                          <h3 class=" m0 font14 bold white-nowrap"><?php echo $v['linetitle'];?></h3>
                           <p class=" font12 white-nowrap"><?php echo $v['linesubtitle'];?></p>
                           <span class="font14">&yen;<?php echo $v['lineprice'];?>元/起</span>
                        </div>
                    </div></a>
                 </li>
                <?php $n++;}unset($n); } ?>
                
             </ul> 
               
        </div>
        
        
        
        
         
        <div class="select-we p15 bte3 bbe3 mt10 bg-white o-hidden"> 
             <h4 class="bold text-center"><span class="bg-white">为什么选择我们</span></h4>
             <ul class="m0 p0 we o-hidden">
                <li class="w33 pull-left">
                    <div class="icon">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center">
                        <h5 class="font12">一站式自由行服务</h5>
                        <p class="font10 grey">机票、酒店、签证、攻略、目的地安排，都为您搞定！</p>
                    </div>
                </li>
                <li class="w33 pull-left">
                    <div class="icon icon1">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center ">
                        <h5 class="font12">旅行管家保障服务</h5>
                        <p class="font10 grey">旅行中的所有问题，我们的旅行管家会7*24小时提供服务。</p>
                    </div>
                </li>
                <li class="w33 pull-left">
                    <div class="icon icon2">
                        <span class="block p5"><i class="block baseicon"></i></span>
                    </div>
                    <div class="p5 text-center ">
                        <h5 class="font12">100%用心服务</h5>
                        <p class="font10 grey">超赞酒店、全程接送机、各项增值服务，一口价全包，省心省力！</p>
                    </div>
                </li>
             </ul>
             
             <ul class="m0 p0 hot-link o-hidden text-center font12">
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>user/orderlist"><div><i class="baseicon"></i>我的订单</div></li></a>
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>companyinfo/helpcenter"><div><i class="baseicon i1"></i>帮助中心</div></li></a>
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>companyinfo/selectus"><div><i class="baseicon i2"></i>选择我们</div></li></a>
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>user/index"><div><i class="baseicon i3"></i>会员中心</div></li></a>
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>companyinfo/contactus"><div><i class="baseicon i4"></i>联系我们</div></li></a>
                 <li class="pull-left w33"><a href="<?php echo $cmsurl;?>companyinfo/joinus"><div><i class="baseicon i5"></i>加入我们</div></li></a>
             </ul>
             
        </div>
        
        
        
    </div>
 
    
</div>
<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>
</body>
</html>
