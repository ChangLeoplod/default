<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>思途CMS4.0</title>
    {template 'stourtravel/public/public_min_js'}
    {php echo Common::getCss('base.css,attrid_dialog.css'); }

</head>
<body >
<div class="p-main">
   <div class="s-main">

       <div class="s-con">
           {if empty($products)}
              <div class="hint">该字段并没有任何数据，确认删除？</div>
           {else}
              <div class="hint">该字段下有数据，删除将无法恢复，是否继续？<a href="javascript:;" class="view-btn" id="view_btn">查看</a></div>
           {/if}
       </div>
       <div class="save-con">
           <a href="javascript:;" class="cancel-btn">取消</a>
           <a href="javascript:;" class="confirm-btn" id="confirm_btn">确定</a>
       </div>
   </div>
   <div class="s-list" id="product_list" style="display:none">
       <table class="product-list">
           {loop $products $product}
           <tr><td>{$product['title']}</td></tr>
           {/loop}
       </table>
       <div class="save-con">
           <a href="javascript:;" class="cancel-btn">取消</a>
           <a href="javascript:;" class="confirm-btn" id="back_btn">返回</a>
       </div>
   </div>
</div>
<script>
     var id="{$id}";
     $(function(){

         $("#view_btn").click(function(){
             $("#product_list").show();
             $(".s-main").hide();
             ST.Util.resizeDialog('.p-main');
         });
         $("#back_btn").click(function(){
             $(".s-main").show();
             $("#product_list").hide();
             ST.Util.resizeDialog('.p-main');
         });

         $("#confirm_btn").click(function(){
             ST.Util.responseDialog({id:id,del:true},true);
         });

         $(".cancel-btn").click(function(){
             ST.Util.closeDialog();
         });
     })
</script>

</body>
</html>
<script type="text/javascript" src="http://update.souxw.com/service/api_V3.ashx?action=releasefeedback&ProductName=%E6%80%9D%E9%80%94CMS4.1&Version=4.1.201507.2401&DomainName=&ServerIP=unknown&SerialNumber=14049767" ></script>
