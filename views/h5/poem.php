<div data-role="content" data-theme="f" class="poetry-body">
    <div id="poem-main">
        <div id="poem-title">
            <p style="margin-top:0px;"><?=$curr_poetry['poetry_title']?></p>
        </div>
        <div id="poem-author">
            <a href="<?=$header_data['site_host']?>h5/author/detail/<?=$curr_poetry['author_id']?>" data-ajax="false" class="pick-author">&nbsp;<?=$curr_poetry['author_name']?></a>&nbsp;|
            <a href="javascript:void(0);"><?=$dynasty_list[$curr_poetry['author_time']]?></a>&nbsp;|
            <a href="javascript:void(0);" style="margin-right: 25px;">浏览(10)</a>
        </div>
        <div id="poem-content">
        <?=$curr_poetry['poetry_content']?>
        </div>
    </div>
    <h3 class="hr-title">
        <span>作者推荐</span>
    </h3>
    <div>
        <ul data-theme="f">
        <?php foreach ($recommend as $key => $item):?>
            <li style="">
                <div class="poetry-info">
                    <a href="<?=$header_data['site_host']?>h5/poem/detail/<?=$item['poetry_id']?>" data-ajax="false" class="poetry-content">
                        《<?=$item['poetry_title']?>》<?=mb_strimwidth(strip_tags($item['poetry_content']), 0, 200, "...")?>
                    </a>
                </div>
                <div class="poetry-opera">
                    <a href="<?=$header_data['site_host']?>h5/author/detail/<?=$item['author_id']?>" data-ajax="false" class="poetry-author"><?=$item['author_name']?></a>
                    <a href="javascript:void(0);" class="poetry-time"><?=$dynasty_list[$item['author_time']]?></a>
                    <a class="poetry-like">赞(0)</a>
                </div>
            </li>
        <?php endforeach;?>
        </ul>
    </div> 
</div>