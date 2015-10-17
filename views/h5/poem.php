<div data-role="content" data-theme="f">
    <div id="poem-main" style="text-align: center;">
        <div id="poem-title">
            <p style="margin-top:0px;"><?=$curr_poetry['poetry_title']?></p>
        </div>
        <div id="poem-author" style="margin-left:93px;">
            作者：
            <a href="<?=$header_data['site_host']?>h5/author/detail/<?=$curr_poetry['author_id']?>" class="pick-author">
                <?=$curr_poetry['author_name']?>
            </a>
        </div>
        <div id="poem-content">
        <?php foreach ($curr_poetry['poetry_content'] as $key => $item):?>
            <p><?=$item?></p>
        <?php endforeach;?>
        </div>
    </div>
    <h2>全部诗词</h2>
    <ul data-theme="f">
        <?php foreach ($hot_poetry as $key => $item):?>
        <li>
            <div class="poetry-info">
                <a href="<?=$header_data['site_host']?>h5/poem/detail/<?=$item->poetry_id?>" data-ajax="false" class="poetry-content">
                    《<?=$item->poetry_title?>》<?=mb_strimwidth(implode('', json_decode($item->poetry_content, true)), 0, 200, "...")?>
                </a>
            </div>
            <div class="poetry-opera">
                <a class="poetry-like" style="width: 50%;">赞&nbsp;1</a>
                <a class="poetry-comment" style="width: 49.5%;">评论&nbsp;1</a>
            </div>
        </li>
    <?php endforeach;?>
    </ul>
</div>