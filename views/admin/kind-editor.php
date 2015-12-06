<link rel="stylesheet" href="<?php echo $header_data['site_host']?>js/editor/plugins/code/prettify.css" />
<link rel="stylesheet" href="<?php echo $header_data['site_host']?>js/editor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo $header_data['site_host']?>js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo $header_data['site_host']?>js/editor/lang/zh_CN.js"></script>
<script charset="utf-8" src="<?php echo $header_data['site_host']?>js/editor/plugins/code/prettify.js"></script>
<script>
    KindEditor.ready(function(K) {
        var editor1 = K.create('textarea[name="editor-area"]', {
            cssPath : '<?php echo $header_data['site_host']?>js/editor/plugins/code/prettify.css',
            allowFileManager : false,
            items: ['justifycenter', 'quickformat', 'source', 'about'],
            afterBlur: function(){
                this.sync();
            },
            afterCreate : function() {
                var self = this;
                K.ctrl(document, 13, function() {
                    self.sync();
                    K('form')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function() {
                    self.sync();
                    K('form')[0].submit();
                });
            }
        });
        prettyPrint();
    });
</script>
<textarea name="editor-area" id="editor-area" style="width:700px;height:200px;visibility:hidden;">
    <?=$editor_content?>
</textarea>