<div id="right-data">
    <div id="data-position">
        <a href="" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
        <table style="width: 800px;margin-bottom:10px;" border="0" cellspacing="0">
            <tr>
                <th class="tdc" width="10%">标题：</th>
                <th class="tdl" width="*" style="padding: 2px 10px;">
                    <input type="text" id="poem-title" value="<?=$poem_info['poetry_title']?>" />
                </th>
            </tr>
            <tr>
                <td class="tdc">作者：</td>
                <td class="tdl">
                    <input type="text" id="poem-author" value="<?=$poem_info['author_name']?>" />
                </td>
            </tr>
            <tr>
                <td class="tdc">内容：</td>
                <td class="tdl">
                <?php foreach ($poem_info['poetry_content'] as $key => $item):?>
                    <div class="input-text">
                        <textarea cols="80" rows="5"><?=$item?></textarea>
                        <?php if($key == 0){ ?>
                        <input type="button" value="+" class="btn textarea-add" style="margin-top: 25px;float: right;" />
                        <input type="button" value="-" class="btn textarea-minus" style="display:none;margin-top: 25px;float: right;" />
                        <?php }else{ ?>
                        <input type="button" value="-" class="btn textarea-minus" style="margin-top: 25px;float: right;" />
                        <?php } ?>
                    </div>
                <?php endforeach;?>
                </td>
            </tr>
        </table>
        <a href="javascript:void(0);" class="btn btn-a" id="btn-submit">确定</a>
        <a href="<?=$header_data['site_host']?>admin/poetry" class="btn btn-a">返回</a>
    </div>
</div>
<?=$pop_warn?>
<script type="text/javascript">
$(document).ready(function(){
    $('.textarea-add').bind('click', function(){
        var objParent = $(this).parent().parent();
        var cloneInput = $('.input-text:first').clone(true);
        cloneInput.find('.textarea-minus').show();
        cloneInput.find('.textarea-add').hide();
        objParent.append(cloneInput);
    });

    $('.textarea-minus').bind('click', function(){
        $(this).parent().remove();
    });

    $('#btn-submit').bind('click', function(){
        var paramData = {};
        paramData.poem = <?=$poem_info['poetry_id']?>;
        paramData.title = $('#poem-title').val();
        paramData.author = $('#poem-author').val();
        paramData.content = getPoemText();

        var callData = {};
        callData.obj = $(this);

        callData.obj.attr("disabled", true);
        callData.obj.css('cursor', 'not-allowed');

        var url = '<?php echo $header_data['site_host']?>admin/aj/poetry';
        ajaxPost(paramData, url, afterSubmit, callData);
    });
});

function afterSubmit(result, callParam){
    popWarn($('#pop_warn'), result.msg, 1500);
    if(result.code == 100000){}else{}
}

function getPoemText(){
    var poemText = '';
    $('.input-text textarea').each(function(){
        poemText += '##' + $(this).val();
    });
    return poemText;
}
</script>