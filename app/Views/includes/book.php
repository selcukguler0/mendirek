<div class="Product Product_b Product_885">
    <div class="Product-image-wrapper">
        <div class="Product-image image_b">
            <a title="<?php echo $book->name ?>" class="tooltip-ajax" href="/kitap/<?php echo $book->id ?>">
                <img class="prd_img prd_img_118_0_885 lazy" width="100" height="100" src="/img/books/<?php echo $book->img ?>" alt="<?php echo $book->name ?>" title="<?php echo $book->name ?>" style="">
            </a>
            <div class="actions">
                <button book-id="<?php echo $book->id ?>" book-name="<?php echo $book->name ?>" book-price="<?php echo $book->price ?>" book-img="<?php echo $book->img ?>" onclick="addToCart(this)" class="btn btn-dark">
                    <span class="button-text">Sepete Ekle</span>
                </button>
            </div>
        </div>
    </div>
    <div class="Product-content">
        <div class="name"><a href="/kitap/<?php echo $book->id ?>"><?php echo $book->name ?></a></div>
        <div class="writer"><a href="/kitap/<?php echo $book->id ?>"><?php echo $book->author ?></a></div>

        <div class="price_box">
            <!-- <div class="discount">
                                                                    <span>%45</span>
                                                                    <div class="discount_text">İNDİRİM</div>
                                                                </div> -->
            <div class="price_box_wrapper">
                <!-- <span class="price price_list convert_cur" data-price="1100.00" data-cur-code="TL">1.100<sup>,00</sup><span class="la la-try la_cur_code"></span></span> -->
                <span class="price price_sale convert_cur" data-price="<?php echo $book->price ?>" data-cur-code="TL"><?php echo $book->price ?><sup>,00</sup><span class="la la-try la_cur_code"></span></span>
            </div>
        </div>
    </div>
</div>