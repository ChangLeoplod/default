document.write('<style type="text/css">' +
    '.edui-default .edui-for-vseem .edui-icon{background-position: -380px 0;}' +
    '.edui-default .edui-for-vseem .edui-dialog-content {height: 390px;overflow: hidden;width: 640px;}' +
    '</style>');
UE.commands['vseem'] = {
    execCommand:function (cmd, opt) {
        var me = this;
        ST.Util.showBox('插入图片', SITEURL + 'image/insert_view', 430,340, null, null, document, {loadWindow: window, loadCallback: Insert});
        function Insert(result,bool){
            var imgs=result.data;
            var html='';
            for(var i in imgs){
                html+='<img src="'+imgs[i]+'"/>';
            }
            me.execCommand('insertHtml',html);
        }
    }
};
