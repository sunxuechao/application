
                    <div class="aside-right">
                        <div class="right-search">
                            <form id="right-search-form" method="get" action="<?=$header_data['site_host']?>home">
                                <input type="text" id="s-word" name="s" value="<?=$s_word?>" />
                                <input type="submit" id="s-btn" value="搜索" />
                            </form>
                        </div>
                        <div id="post-hot">
                            <h3 class="bookmark-title left-border">站点推荐</h3>
                            <ul>
                                <?php foreach ($recommend as $key => $item):?>
                                <li>
                                    <span class="views"><?=$item['poetry_view']?></span>
                                    <a href="<?=$header_data['site_host']?>poem/detail/<?=$item['poetry_id']?>" title="<?=$item['poetry_title']?>">
                                        <?=$item['poetry_title']?><?=strip_tags($item['poetry_content'])?>
                                    </a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer"></div>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.right-search #s-btn').bind('click', function(){
            var sWord = $(this).parent().find('#s-word').val();
            window.location.href = '<?=$header_data['site_host']?>home/page/0/' + urlencode(sWord);
        });
    });
    </script>
</body>
</html>