<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>订单查看--思途CMS3.0</title>
    <?php echo  Stourweb_View::template('stourtravel/public/public_js');  ?>
    <?php echo Common::getCss('style.css,base.css'); ?>
</head>
<body style="background-color: #fff">
   <form id="frm" name="frm">
    <div class="out-box-con">
        <dl class="list_dl">
            <dt class="wid_90">产品名称：</dt>
            <dd>
                 <?php echo $info['productname'];?>
            </dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">出发日期：</dt>
            <dd><?php echo $info['usedate'];?></dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">人数<?php if($typeid==1) { ?>(成人)<?php } ?>
：</dt>
            <dd><?php echo $info['dingnum'];?></dd>
        </dl>
        <?php if($info['insurance']) { ?>
        <dl class="list_dl">
            <dt class="wid_90">保险：</dt>
            <dd><?php echo $info['insurance']['payprice'];?></dd>
        </dl>
        <?php } ?>
        <dl class="list_dl">
            <dt class="wid_90">价格<?php if($typeid==1) { ?>(成人)<?php } ?>
：</dt>
            <dd><input type="text" class="set-text-xh text_200 mt-4" name="price" id="price" value="<?php echo $info['price'];?>" ></dd>
        </dl>
        <?php if($typeid==1) { ?>
            <dl class="list_dl">
                <dt class="wid_90">小孩数量：</dt>
                <dd><?php echo $info['childnum'];?></dd>
            </dl>
            <dl class="list_dl">
                <dt class="wid_90">小孩价格：</dt>
                <dd><input type="text" class="set-text-xh text_200 mt-4" name="childprice" id="childprice" value="<?php echo $info['childprice'];?>" ></dd>
            </dl>
            <dl class="list_dl">
                <dt class="wid_90">老人数量：</dt>
                <dd><?php echo $info['oldnum'];?></dd>
            </dl>
            <dl class="list_dl">
                <dt class="wid_90">老人价格：</dt>
                <dd><input type="text" class="set-text-xh text_200 mt-4" name="oldprice" id="oldprice" value="<?php echo $info['oldprice'];?>" ></dd>
            </dl>
            <dl class="list_dl">
                <dt class="wid_90">单房差：</dt>
                <dd><?php echo $info['roombalance'];?></dd>
            </dl>
            <dl class="list_dl">
                <dt class="wid_90">单房差数量：</dt>
                <dd><?php echo $info['roombalancenum'];?></dd>
            </dl>
        <?php } ?>
        <dl class="list_dl">
            <dt class="wid_90">客户姓名：</dt>
            <dd><?php echo $info['linkman'];?></dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">联系电话：</dt>
            <dd><?php echo $info['linktel'];?></dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">联系邮箱：</dt>
            <dd><?php echo $info['linkemail'];?></dd>
        </dl>
        <?php if(isset($tourer)) { ?>
         <?php $n=1; if(is_array($tourer)) { foreach($tourer as $r) { ?>
        <dl class="list_dl">
            <dt class="wid_90">游客<?php echo $n;?>：</dt>
            <dd style="height: auto">
                <ul>
    <input name="tourer_id[]" type="hidden"  value="<?php echo $r['id'];?>" />
                    <li>姓名：<input name="uname[]" type="text" class="" value="<?php echo $r['tourername'];?>" /> </li>
                    <li>性别: <input name="usex[]" type="text" class="" value="<?php echo $r['sex'];?>" /> </li>
                    <li>身份证号码：<input name="idno[]" type="text" class="" value="<?php echo $r['cardnumber'];?>" /> </li>
                    <li>护照号码：<input name="ppno[]" type="text" class="" value="<?php echo $r['passportno'];?>" /> </li>
                </ul>
            </dd>
        </dl>
        <?php $n++;}unset($n); } ?>
        <?php } ?>
        <dl class="list_dl">
            <dt class="wid_90">新增游客：</dt>
            <dd style="height: auto">
                <ul>
    <input name="tourer_id[]" type="hidden"  value="" />
                    <li>姓名：<input name="uname[]" type="text" class="" value="" /> </li>
                    <li>性别: <input name="usex[]" type="text" class="" value="" /> </li>
                    <li>身份证号码：<input name="idno[]" type="text" class="" value="" /> </li>
                    <li>护照号码：<input name="ppno[]" type="text" class="" value="" /> </li>
                </ul>
            </dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">预订说明：</dt>
            <dd style="height: auto"><?php echo $info['remark'];?></dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">订单状态：</dt>
            <dd>
              <input name="status" type="radio" class="checkbox" value="0" <?php if($info['status']==0) { ?>checked="checked"<?php } ?>
  />未处理
              <input name="status" type="radio" class="checkbox" value="1" <?php if($info['status']==1) { ?>checked="checked"<?php } ?>
  />处理中
              <input name="status" type="radio" class="checkbox" value="2" <?php if($info['status']==2) { ?>checked="checked"<?php } ?>
  />交易成功
              <input name="status" type="radio" class="checkbox" value="3" <?php if($info['status']==3) { ?>checked="checked"<?php } ?>
  />取消订单
                <input name="status" type="radio" class="checkbox" value="4" <?php if($info['status']==4) { ?>checked="checked"<?php } ?>
  />已退款
            </dd>
        </dl>
        <dl class="list_dl">
            <dt class="wid_90">&nbsp;</dt>
            <dd>
                <a class="normal-btn" id="btn_save" href="javascript:;">保存</a>
                <input type="hidden" id="id" name="id" value="<?php echo $info['id'];?>">
                <input type="hidden" id="typeid" name="typeid" value="<?php echo $typeid;?>">
            </dd>
        </dl>
    </div>
   </form>
<script language="JavaScript">
    $(function(){
        //保存
        $("#btn_save").click(function(){
            Ext.Ajax.request({
                url   :  SITEURL+"order/ajax_save",
                method  :  "POST",
                isUpload :  true,
                form  : "frm",
                success  :  function(response, opts)
                {
                    try{
                        var data = $.parseJSON(response.responseText);
                    }
                    catch(e){
                        ST.Util.showMsg("<?php echo __('norightmsg');?>",5,1000);
                        return false;
                    }
                    if(data.status)
                    {
                        ST.Util.showMsg('保存成功!','4',2000);
                    }
                }});
        })
    })
</script>
</body>
</html>
