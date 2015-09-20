<div id="right-data">
    <div id="data-position">
        <a href="/?spm=5176.788314842.2.1.Kvp10F" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
        <span style="color:#00a2ca;">></span>
        <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
    </div>
    <div id="data-info">
        <div>
            <a href="<?php echo $header_data['site_host']?>admin/author/edit" class="btn btn-a" style="float: right;">添加作者</a>
        </div>
        <table style="width: 800px;" border="0" cellspacing="0">
            <tr>
                <th width="30%">作者名称</th>
                <th width="40%">所处朝代</th>
                <th width="30%">操作</th>
            </tr>
            <?php foreach ($author_list as $key => $item):?>
            <tr>
                <td class="tdl"><?=$item->author_name?></td>
                <td class="tdl"><?=$dynasty_list[$item->author_time]?></td>
                <td class="tdc">
                    <a href="<?php echo $header_data['site_host']?>admin/author/edit/<?=$item->author_id?>" class="audit" data_type="pass">查看</a>
                    <a href="<?php echo $header_data['site_host']?>admin/author/del/<?=$item->author_id?>" class="audit" data_type="pass">删除</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>