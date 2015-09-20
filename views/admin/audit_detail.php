<div id="right-data">
    <div id="data-position">
        <a href="/?spm=5176.788314842.2.1.Kvp10F" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
        <table style="width: 800px;margin-bottom:10px;" border="0" cellspacing="0">
            <tr>
                <td width="8%">题目：</td>
                <td width="*"><?=$poem_detail->poetry_title?></td>
            </tr>
            <tr>
                <td>作者：</td>
                <td><?=$poem_detail->author_name?></td>
            </tr>
            <tr>
                <td>内容：</td>
                <td><?=$poem_detail->poetry_content?></td>
            </tr>
        </table>
        <?php if($poem_detail->poetry_status == 1){ ?>
        <input type="button" value="通过" id="pass" class="btn" />
        <input type="button" value="驳回" id="reject" class="btn" />
        <?php }elseif($poem_detail->poetry_status == 2){ ?>
        <input type="button" value="审核状态：通过" id="status" class="btn" style="width: 120px;" />
        <?php }elseif($poem_detail->poetry_status == 3){ ?>
        <input type="button" value="审核状态：驳回" id="status" class="btn" style="width: 120px;" />
        <?php } ?>
        <table style="width: 800px;margin-top:10px;" border="0" cellspacing="0">
            <tr>
                <th width="100%" colspan="2" class="tdl">&nbsp;&nbsp;相似的诗词：</th>
            </tr>
            <?php foreach ($similar_list as $key => $item):?>
            <tr>
                <td width="8%" class="tdc" title="<?=$item->poetry_title?>">
                    <?=($key + 1)?>
                </td>
                <td class="tdl">
                    题目：<?=mb_strimwidth($item->poetry_title, 0, 124, '…')?>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<?=$pop_warn?>
<script type="text/javascript">
$(document).ready(function(){
    $('#pass, #reject').bind('click', function(){
        var paramData = {};
        paramData.status = $(this).attr('id');
        paramData.tmp_id = <?=$poem_detail->poetry_id?>;

        var callData = {};
        callData.obj = $(this);

        $('#pass, #reject').attr("disabled", true);
        $('#pass, #reject').css('cursor', 'not-allowed');

        var url = '<?php echo $header_data['site_host']?>admin/aj/audit';
        ajaxPost(paramData, url, afterSubmit, callData);
    });

    /* 关闭弹窗 */
    $('.pop-close').bind('click', function(){$('#pop_warn').hide();});
});

/* 执行完Ajax后的回调函数 */
function afterSubmit(result, callParam){
    popWarn($('#pop_warn'), result.msg, 1500);
    if(result.code == 100000){
        $('#pass, #reject').remove();
    }
}
</script>