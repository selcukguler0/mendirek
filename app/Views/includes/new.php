<a href="/bulten/<?php echo $new->id ?>">
    <div style="height: 100%;
    display: flex;
    justify-content: space-between;
    flex-direction: column;" class="New">
        <div class="New-image-wrapper">
            <div class="New-image image_b">
                <a title="<?php echo $new->title ?>" href="/bulten/<?php echo $new->id ?>">
                    <img class="prd_img lazy" width="100" height="100" src="/img/news/<?php echo $new->img ?>" alt="<?php echo $new->title ?>" title="<?php echo $new->title ?>" style="">
                </a>
            </div>
        </div>
        <div class="New-content">
            <div class="title"><a href="/bulten/<?php echo $new->id ?>"><?php echo substr($new->title, 0, 20);
                                                                        if (strlen($new->title) > 20) echo "..." ?></a></div>
            <div class="price_box">
                <div class="price_box_wrapper">
                    <span class="price price_sale convert_cur"><?php echo substr($new->content, 0, 40) ?>...</span>
                </div>
            </div>
        </div>
    </div>
</a>