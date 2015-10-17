<div data-role="content" data-theme="f">
    <h2><?=$curr_author['author_name']?>简介</h2> 
    <ul id="author-brief" data-theme="f" data-role="listview">
    <?php foreach ($curr_author['author_brief'] as $key => $item):?>
        <li>
            <p><?=$item?></p>
        </li>
    <?php endforeach;?>
    </ul>
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