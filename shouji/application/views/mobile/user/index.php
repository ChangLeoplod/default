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
<title>{$seotitle}-{$webname}</title>
    {php echo Common::getCss('bootstrap.min.css,sticky-footer.css,css.css'); }
    {php echo Common::getScript('jquery-1.10.1.min.js,bootstrap.min.js,yxMobileSlider.js'); }
</head>

<body>
<div class="container">
    <header class="bg-green p15">
      <ul class="m0 p0 w100">
         <li class="pull-left li1"><div class="baseicon return-left"></div></li>
         <li class="pull-left li2 o-hidden font18 text-center white text-ellipsis white-nowrap">用户中心</li>
         <li class="pull-right li3"><a href="{$cmsurl}user/index" class="baseicon block pull-right member"></a><a href="{$cmsurl}user/orderlist" class="baseicon block pull-right date"></a></li>
      </ul>
    </header>
    
    <div class="main"> 
        <div class="user-center">
            <div class="user-images text-center white p15"> 
                <div class="bg-white"><img src="{if empty($user['litpic'])}../public/images/member_default.gif{else}{$user['litpic']}{/if}"></div>
                <p>{$user['nickname']}</p>
            </div>
              
            <div class="confirmation-order">
                <div class="canshu alipay bg-white pl10 pr10 bte3 bbe3 mt10 o-hidden"> 
                    <table class="table table-striped grey m0">
                        
                        <tr>
                            <th scope="row" width="20%"><div class="icon"><img src="../public/images/icon/clipboard.png"></div></th>
                            <td width="80%">
                                <a href="{$cmsurl}user/orderlist"> <h5 class="m0"> 我的订单 </h5> </a>
                            </td>
                            <td align="right"  width="8%"><i class="more-right"></i></td>
                        </tr>
                        
                        
                        <tr>
                            <th scope="row"><div class="icon icon2"><img src="../public/images/icon/users.png"></div></th>
                            <td>
                                <a href="{$cmsurl}user/commontourers"><h5 class="m0"> 常用旅客 </h5></a>
                            </td>
                            <td align="right"><i class="more-right"></i></td>
                        </tr>
                        
                     </table>   
                </div>
            </div>

            <div class="mt10 ml10 mr10">
                <a href="{$cmsurl}user/loginout"> 
                <button type="button" class="btn bg-green w100 p10 font16 white mt10">
                    退出登录 
                </button> </a>
             </div>   
         </div>
    </div>
</div>

<div class="footer grey font12 text-center">武汉市光游网络有限公司<p>鄂ICP备14009743号 © 积沙旅行  2015</p></div>

</body>
</html>
