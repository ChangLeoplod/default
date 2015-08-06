<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>思途CMS4.0</title>
    <?php echo  Stourweb_View::template('stourtravel/public/public_min_js');  ?>
    <?php echo Common::getCss('base.css,attrid_dialog_setattrid.css'); ?>
</head>
<body >
   <div class="s-main">
       <div class="attr-list">
        <?php $n=1; if(is_array($attridList)) { foreach($attridList as $list) { ?>
           <?php if(!empty($list['children'])) { ?>
            <div class="con-row">
                <div class="con-tit">
                     <?php echo $list['attrname'];?>
                </div>
                <div class="con-list">
                    <ul>
                     <?php $rowNum=6;$nextIndex=0?>
                     <?php $n=1; if(is_array($list['children'])) { foreach($list['children'] as $key => $row) { ?>
                        <?php if($key%$rowNum==0) { ?>
                          <?php $nextIndex=$key+$rowNum-1;?>
                          <li>
                        <?php } ?>
                        <span class="item"><input type="checkbox" name="attrid" pid="<?php echo $list['id'];?>" pname="<?php echo $list['attrname'];?>" class="i-box" <?php if(in_array($row['id'],$attrids)) { ?>checked="checked"<?php } ?>
 value="<?php echo $row['id'];?>"/><label class="i-lb"><?php echo $row['attrname'];?></label></span>
                        <?php if(($key==$nextIndex||$key==count($list['children'])-1) ) { ?>
                         <div class="clear-both"></div></li>
                        <?php } ?>
                     <?php $n++;}unset($n); } ?>
                     </ul>
                </div>
            </div>
           <?php } ?>
        <?php $n++;}unset($n); } ?>
       </div>
       <div class="save-con">
           <a href="javascript:;" class="confirm-btn">确定</a>
       </div>
   </div>
<script>
     var id="<?php echo $id;?>";
     var selector="<?php echo $selector;?>"
     $(function(){
           $(document).on('click','.confirm-btn',function(){
                  var attrs=[];
                  var pids=[];
                  $('.item .i-box:checked').each(function(index,element){
                         var pid=$(element).attr('pid');
                         var pname=$(element).attr('pname');
                         if($.inArray(pid,pids)==-1)
                         {
                             attrs.push({id:pid,attrname:pname});
                             pids.push(pid);
                         }
                         var attrname=$(element).siblings('.i-lb:first').text();
                         var id=$(element).val();
                         attrs.push({id:id,attrname:attrname});
                  });
                  ST.Util.responseDialog({id:id,data:attrs,selector:selector},true);
           })
     })
</script>
</body>
</html>
<script type="text/javascript" src="http://update.souxw.com/service/api_V3.ashx?action=releasefeedback&ProductName=%E6%80%9D%E9%80%94CMS4.1&Version=4.1.201507.1501&DomainName=&ServerIP=unknown&SerialNumber=14049767" ></script>
