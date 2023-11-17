    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title ?></title>
    <meta name="description" content=" Ülkemizde okuma alışkanlığının gelişimine katkı sağlamak adına birçok alanda özgün ve kaliteli basımları okurlarla buluşturmak için yeni bir yola çıkıyoruz.">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta property="og:image" content="/img/logo.png" />
    <link rel="shortcut icon" href="/u/Mendirekdukkan/favicon.ico?v=992" type="image/x-icon">
    <link type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    <link type="text/css" href="/css/fancybox.css" rel="stylesheet">
    <link type="text/css" href="/css/main.css" rel="stylesheet">
    <link type="text/css" href="/css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <style>
        .banner_cookie {
            background: #333;
        }

        .prd_preorder {
            color: #ff0000;
            font-weight: bold;
        }

        .box_prd_detail .prd_custom_fields {
            float: none;
            width: auto;
        }

        .prd_documents {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .prd_documents a {
            background: #000;
            color: #fff;
            padding: 10px 20px !important;
            border-radius: 5px;
            font-size: .9em;
        }

        .prd_documents a span {
            margin-right: 5px;
        }

        /*
.Header-menu { background: #1d2124; }
.Header-menu ul li:hover { background: #444; }
*/
        .Footer-email,
        .Header-top .user_menu {
            display: none;
        }

        .Header-logo img {
            max-height: 85px;
        }

        @media screen and (max-width: 768px) {
            .Header>.container .Header-right {
                top: 30px;
            }
        }

        .icon-tiktok {
            width: .8em;
            height: .8em;
            fill: #fff;
            display: block;
            position: relative;
            top: 3px;
        }

        @media screen and (min-width: 768px) {
            .Footer .container {
                position: relative;
            }

            .Footer-content>ul {
                position: absolute;
                right: 0;
                top: 50px;
                font-size: 1.5em;
            }
        }

        /* color - orange */
        .Product .discount,
        .prd_view .pricebox .discount {
            background-color: #EF6A2F;
        }

        .Product-content .price_box .price_sale,
        .prd_view .pricebox_content .sale_price_row {
            color: #EF6A2F;
        }

        .Header-menu,
        .Cart-icon .dy_cart_prd_count,
        .pagination .page-item.active .page-link,
        .alert-orange,
        .btn-orange,
        .Carousel .slick-dots li.slick-active,
        .order_steps .ord_step_selected .ord_step_number,
        .member_nav a.active,
        .Product .list_number {
            background-color: #EF6A2F;
        }

        .Header-menu ul li ul {
            background-color: #f76e31;
        }

        .breadcrumb .breadcrumb-item.active a,
        .pagination .page-item .page-link,
        .prd_view h1.contentHeader,
        .letter_bar .letter_items a.dy_selected {
            color: #EF6A2F;
        }

        .pagination .page-item .page-link:focus {
            box-shadow: 0 0 0 0.2rem rgba(239, 106, 47, .25);
        }

        .pagination .page-item.active .page-link,
        .btn-orange,
        .member_nav a.active,
        .Carousel .slick-dots li.slick-active {
            border-color: #EF6A2F;
        }

        .btn-orange:hover,
        .btn-orange:focus {
            background-color: #f76e31;
            border-color: #f76e31;
        }

        .btn-orange:focus,
        .btn-orange:not(:disabled):not(.disabled).active:focus,
        .btn-orange:not(:disabled):not(.disabled):active:focus,
        .show>.btn-orange.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(239, 106, 47, .5);
        }

        .btn-orange:not(:disabled):not(.disabled).active,
        .btn-orange:not(:disabled):not(.disabled):active,
        .show>.btn-orange.dropdown-toggle {
            background-color: #d4602c;
            border-color: #d4602c;
        }

        .loading div {
            border: 2px solid #EF6A2F;
            border-color: #EF6A2F transparent transparent transparent;
        }

        .tabs_view .nav a.active {
            border-bottom: 2px solid #EF6A2F;
        }

        .order_steps .ord_step_number {
            background-color: #f76e31;
        }

        .Header-menu ul li:hover {
            background-color: #f76e31;
        }

        .Header-menu ul li ul li:hover {
            background-color: #f76e31;
        }

        @media screen and (max-width: 768px) {
            .Header-menu .container {
                background-color: #EF6A2F;
            }
        }

        /* color - orange */

        #mod_container_141 .tabs_view_splitter_nav .tabs_view_splitter_col1 {
            grid-row: 1 / span 2;
        }

        #mod_container_141 .tabs_view_splitter_nav .tabs_view_splitter_col1 .Box.box_prd {
            padding: 0;
            padding-top: 20px;
        }

        #mod_container_141 .tabs_view_splitter_nav .tabs_view_splitter_col1 .Box.box_prd .Box-footer {
            display: none;
        }

        @media screen and (max-width: 768px) {
            #mod_container_141 .tabs_view_splitter_nav {
                display: flex;
                flex-direction: column;
            }

            #mod_container_141 .tabs_view_splitter_nav .tabs_view_splitter_col1 {
                order: 3;
            }
        }

        #mod_container_141 .tabs_view_splitter_col1 .Product .Product-content .price_box .discount {
            padding: 8px 10px;
        }

        #mod_container_141 .tabs_view_splitter_col1 .Product .Product-content .price_box .discount>span {
            font-size: 2.4em;
        }

        .Product .prd_img_items .discount {
            display: none;
        }

        .mod_big .Carousel-banner .slick-arrow {
            opacity: 1;
            visibility: visible;
        }

        .mod_big .Carousel-banner .slick-arrow .la {
            color: #fff;
        }

        .mod_big .Carousel-banner .slick-prev {
            left: 0;
        }

        .mod_big .Carousel-banner .slick-next {
            right: 0;
        }
    </style>
    <style type="text/css">
        .fancybox-margin {
            margin-right: 17px;
        }
    </style>