<div id="content">
    <div id="nav" class="left-border post-nav">
        <a href="<?=$header_data['site_host']?>">首页</a>
        <span>&nbsp; / &nbsp;</span>
        <a href="<?=$header_data['site_host']?>author/detail/<?=$curr_poetry['author_id']?>">
            <?=$curr_poetry['author_name']?>
        </a>
        <span>&nbsp; / &nbsp;</span>
        <span><?=$curr_poetry['poetry_title']?>【正文】</span>
    </div>
    <div id="text-main">
        <div id="text-detail">
            <h1 id="text-title"><?=$curr_poetry['poetry_title']?></h1>
            <div id="text-author">
                <span id="author-card">
                    <a class="url fn n" href="<?=$header_data['site_host']?>author/detail/<?=$curr_poetry['author_id']?>" title="cyRotel" target="_blank"><?=$curr_poetry['author_name']?></a>
                </span> &nbsp;&nbsp;
                <!-- <span id="author-time">
                    <a href="" rel="tag" target="_blank">唐朝</a>
                </span> &nbsp;&nbsp; -->
            </div>
            <div id="text-summary">
                <?=$curr_poetry['poetry_content']?>
            </div>
            <?php if(false){ ?>
            <div class="entry-opera">
                <ul>
                    <li class="author-name">
                        <a href="">收藏</a>
                    </li>
                    <li class="favorite">
                        <a href="">评论</a>
                    </li>
                    <li class="comment">
                        <a href="">赞</a>
                    </li>
                    <li class="like">
                        <a href="javascript:void(0);">相关</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>