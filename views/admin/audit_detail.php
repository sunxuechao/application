<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf-8" lang="utf-8">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>古言语</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $header_data['site_host']?>css/style.css" />
    <script type="text/javascript" src="<?php echo $header_data['site_host']?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $header_data['site_host']?>js/common.js"></script>
</head>
<body>
    <div class="top-bar">
        <div class="top" style="position: static; opacity: 1;">
            <div id="top-left">
                <a href="JavaScript:viod(0);">与君共勉</a>
                <label></label>
                <a href="<?php echo $header_data['site_host']?>">网站首页</a>
            </div>
            <div id="top-right" style="float: right;">
                <a href="JavaScript:viod(0);">敬请期待</a>
                <label></label>
                <a href="JavaScript:viod(0);">敬请期待</a>
                <label></label>
                <a href="JavaScript:viod(0);">敬请期待</a>
                <label></label>
                <a href="JavaScript:viod(0);">敬请期待</a>
                <label></label>
                <a href="JavaScript:viod(0);">……</a>
            </div>
        </div>
    </div>
    <div style="border-bottom: 1px solid #dfe3e6; display: none;">
        <div class="header" style="height: 50px;"></div>
    </div>
    <div id="content">
        <div id="left-menu">
            <div id="menu-title">管理中心</div>
            <ul id="menu-bar" style="height: 560px;overflow-y: auto;">
                <li>
                    <a href="">诗词审核</a>
                </li>
                <li>
                    <a href="">诗词编辑</a>
                </li>
                <li>
                    <a href="">热点产品</a>
                </li>
                <li>
                    <a href="">热点产品</a>
                </li>
            </ul>
        </div>
        <div id="right-data">
            <div id="data-position">
                <a href="/?spm=5176.788314842.2.1.Kvp10F" data-spm-anchor-id="5176.788314842.2.1">后台管理</a>
                <span style="color:#00a2ca;">></span>
                <span style="font-size: 12px;line-height: 1.5;">诗词审核</span>
            </div>
            <div id="data-info">
                <table style="width: 800px;" border="0" cellspacing="0">
                    <tr>
                        <th width="15%">标题</th>
                        <th width="5%">作者</th>
                        <th width="40%">内容</th>
                        <th width="20%">收录时间</th>
                        <th width="10%">状态</th>
                        <th width="10%">操作</th>
                    </tr>
                    <?php foreach ($poem_list as $key => $item):?>
                    <tr>
                        <td class="tdl" title="<?=$item->poetry_title?>">
                            <?=mb_strimwidth($item->poetry_title, 0, 14, '…')?>
                        </td>
                        <td class="tdl"><?=$item->author_name?></td>
                        <td class="tdl" title="<?=$item->poetry_content?>">
                            <?=mb_strimwidth($item->poetry_content, 0, 45, '…')?>
                        </td>
                        <td class="tdc"><?=date('Y-m-d H:i:s', $item->poetry_create)?></td>
                        <td class="tdc"><?=$poem_status[$item->poetry_status]?></td>
                        <td class="tdc">
                            <a href="<?php echo $header_data['site_host']?>admin/audit/detail/<?=$item->poetry_id?>" class="audit" data_type="pass">查看</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
    <div class="footer"></div>
    <script type="text/javascript">

    </script>
</body>
</html>