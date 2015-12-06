<div id="right-data">
    <div id="data-position">
        <a href="" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
    <form id="author-form" action="<?=$header_data['site_host']?>admin/author/submit" method="post">
        <table style="width: 800px;margin-bottom:10px;" border="0" cellspacing="0">
            <tr>
                <th class="tdc" width="10%">名称：</th>
                <th class="tdl" width="*" style="padding: 2px 10px;">
                    <input type="text" id="author-name" name="author-name" value="<?=$author_info['author_name']?>" />
                </th>
            </tr>
            <tr>
                <td class="tdc">年代：</td>
                <td class="tdl">
                    <select id="author-time" name="author-time">
                    <?php foreach ($dynasty_list as $key => $item):?>
                        <option value="<?=$key?>"><?=$item?></option>
                    <?php endforeach;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="tdc">简介：</td>
                <td class="tdl">
                    <?=$kindeditor?>
                </td>
            </tr>
        </table>
        <a href="javascript:void(0);" class="btn btn-a" id="btn-submit">确定</a>
        <a href="<?=$header_data['site_host']?>admin/author" class="btn btn-a">返回</a>
        <input type="hidden" id="author-id" name="author-id" value="<?=$author_info['author_id']?>" />
    </form>
    </div>
</div>
<?=$pop_warn?>
<script type="text/javascript">
$(document).ready(function(){
    $('#author-time').find("option[value=<?=$author_info['author_time']?>]").attr('selected', true);

    $('#btn-submit').bind('click', function(){
        $('#author-form').submit();
    });
});
</script>
