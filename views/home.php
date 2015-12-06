<div id="content">
    <div id="nav" class="left-border post-nav">
        <span>最新收集</span>
    </div>
    <div id="post-feed">
        <div class="post-detail">
            <?php if(false){ ?>
            <div class="entry-summary">
                《月夜忆舍弟》戍鼓断人行，边秋一雁声。 露从今夜白，月是故乡明。 有弟皆分散，无家问死生。 寄书长不达，况乃未休兵。…
            </div>
            <div class="entry-opera">
                <ul>
                    <li class="author-name">
                        <a href="">里白</a>
                    </li>
                    <li class="favorite">
                        <a href="">里白</a>
                    </li>
                    <li class="comment">
                        <a href="">里白</a>
                    </li>
                    <li class="like">
                        <a href="javascript:void(0);">里白</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
        <?php foreach ($content_list as $key => $item):?>
        <div class="post-detail">
            <div class="entry-summary">
                <a href="<?php echo $header_data['site_host']?>poem/detail/<?=$item['poetry_id']?>">
                    《<?=$item['poetry_title']?>》<?=strip_tags($item['poetry_content'])?>
                </a>
            </div>
        </div>
        <?php endforeach;?>
        <div class="page-nav">
            <a href="<?php echo $header_data['site_host']?>home/page/<?=($curr_page-1)?>">上一页</a>
            <a href="<?php echo $header_data['site_host']?>home/page/<?=($curr_page+1)?>">下一页</a>
        </div>
    </div>
</div>