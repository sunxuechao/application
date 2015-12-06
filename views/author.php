<div id="content">
    <div id="nav" class="left-border post-nav">
        <a href="">首页</a>
        <span>&nbsp; / &nbsp;</span>
        <span><?=$curr_author['author_name']?>【简介】</span>
    </div>
    <div id="author-main">
        <div id="author-detail">
            <div id="author-brief">
                <?=$curr_author['author_brief']?>
            </div>
            <?php if(false){ ?>
            <div class="entry-opera">
                <ul>
                    <li class="author-name">
                        <a href="">简介</a>
                    </li>
                    <li class="favorite">
                        <a href="">作品</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>