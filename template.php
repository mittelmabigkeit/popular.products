<? if($arResult): ?>
<div class="bottom_slider specials tab_slider_wrapp popular_slider_wrap">
    <div class="top_blocks">
        <ul class="tabs">
            <li class="cur"><span>Популярные товары</span></li>
        </ul>
    </div>
    <ul class="slider_navigation top custom_flex border">
        <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
		<div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
    </ul>
    <div class="swiper-container popular_slider 1212" style="margin-top: 40px">
        <ul class="swiper-wrapper" style="margin: 0 0 40px">
            <? foreach($arResult['PRODUCTS'] as $product): ?>
                <li class="catalog_item swiper-slide">
                    <div class="slide-inner">
                        <div class="item-title" style="height: 72px;">
                            <a href="<?= $product['DETAIL_PAGE_URL'] ?>"><span><?= $product['NAME'] ?></span></a>
                        </div>
                        <div class="image_wrapper_block">
                            <a href="<?= $product['DETAIL_PAGE_URL'] ?>" class="thumb">
                                <img border="0" src="<?= $product['DETAIL_PICTURE'] ?>" alt="" title="" draggable="false" style="max-width: 65%; max-height: 100%;">
                            </a>
                        </div>
                        <div class="item_info">
                            <ul class="item_stocks">
                                <? foreach ($product['OFFERS'][$product['ID']] as $offer): ?>
                                    <li class="item_stocks_item">
                                        <div>
                                            <div class="item_stock_card_title">Вес</div>
                                            <div class="item_stocks_wieght"><?= $offer['NAME'] ?></div>
                                        </div>
                                        <div>
                                            <div class="item_stock_card_title">Цена</div>
                                            <div>
                                                <div class="item_stock_new_price"><?= $offer['PRICE'] ?> руб.</div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="item_stock_card_title">Кол-во</div>
                                            <div class="item_stock_quantity">
                                                <?
                                                $quanClass="";
                                                if($offer['CATALOG_QUANTITY']>=1) $quanClass='one';
                                                if($offer['CATALOG_QUANTITY']>=2) $quanClass='two';
                                                if($offer['CATALOG_QUANTITY']>=3) $quanClass='three';
                                                if($offer['CATALOG_QUANTITY']>=4) $quanClass='four';
                                                if($offer['CATALOG_QUANTITY']>=5) $quanClass='five';
                                                ?>
                                                <div class="item_stock_quantity_list <?= $quanClass ?>" title="Наличие на складе">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="item_stock_cart 111">
                                            <a class="item_stock_cart_button" data-id="<?/*= $offer['ID'] */?>" href="<?/*= $APPLICATION->GetCurPage() . '?action=ADD2BASKET&amp;id=' . $offer['ID'] */?>" title="Добавить в корзину" onclick="fbq('track', 'AddToCart');"></a>
                                        </div>-->

                                        <?if($offer['CATALOG_QUANTITY'] >0):?>
                                            <div class="item_stock_cart">
                                                <a class="item_stock_cart_button" data-id="<?=$offer['ID']?>" href="<?= $APPLICATION->GetCurPage() . '?action=ADD2BASKET&amp;id=' . $offer['ID'] ?>" onclick="fbq('track', 'AddToCart');" title="Добавить в корзину">
                                                </a>
                                            </div>
                                        <?else:?>
                                            <div class="stocks__col item_stock_warning item_stock_warning--size" data-tooltip="Доставка данного товара может занимать от 3 до 14 дней, за подробной информацией по данной позициии обратитесь к своему Диноменеджеру"></div>
                                            <div class="item_stock_cart">
                                                <a class="item_stock_cart_button" data-id="<?=$offer['ID']?>" data-iblockid="<?=$offer['IBLOCK_ID']?>" href="<?= $APPLICATION->GetCurPage() . '?action=ADD2BASKET&amp;id=' . $offer['ID'] ?>" onclick="fbq('track', 'AddToCart');" title="Добавить в корзину">
                                                </a>
                                            </div>
                                        <?endif;?>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="catalog_item--wrapper">
                        <div class="image_wrapper_block">
                            <a href="<?= $product['DETAIL_PAGE_URL'] ?>" class="thumb">
                                <img border="0" src="<?= $product['DETAIL_PICTURE'] ?>" alt="" title="" draggable="false" style="max-width: 65%;">
                            </a>
                        </div>
                        <div class="item_info" style="height: 54px;">
                            <div class="item-title" style="height: 54px;">
                                <a href="<?= $product['DETAIL_PAGE_URL'] ?>"><span><?= $product['NAME'] ?></span></a>
                            </div>
                        </div>
                        <div class="products">
                            <? foreach ($product['OFFERS'][$product['ID']] as $offer): ?>
                                <div class="product">
                                    <div class="product-left"><div class="item_stock_card_title">Вес</div><?= $offer['NAME'] ?></div>
                                    <div class="product-right">
                                        <div class="product-price"><div class="item_stock_card_title">Вес</div><?= $offer['PRICE'] ?> р.</div>
                                        <div class="product-add">
                                            <a class="item_stock_cart_button" data-id="<?= $offer['ID'] ?>" href="<?= $APPLICATION->GetCurPage() . '?action=ADD2BASKET&amp;id=' . $offer['ID'] ?>" title="Добавить в корзину" onclick="fbq('track', 'AddToCart');"></a>
                                        </div>
                                    </div>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div> -->
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function () {
            var width = document.body.clientWidth;
            var slidesPerView = 3;
            var spaceBetween = 15;

            if (width < 521) {
                slidesPerView = 1;
                // spaceBetween = 5;
            } else if (width < 871) {
                slidesPerView = 2;
                // spaceBetween = 10;
            }

            var mySwiper = new Swiper('.popular_slider', {
                // Optional parameters
                loop: true,
                slidesPerView: slidesPerView,
                spaceBetween: spaceBetween,
                slidesPerGroup: 1,
                fadeEffect: {
                    crossFade: true
                },
                observer: true,
            });

            var totalSlides = $('.popular_slider .swiper-slide:not(.swiper-slide-duplicate)').length;

            $('.popular_slider_wrap')
            .on('click', '.swiper-button-prev', function() {
                if (mySwiper.slidePrev()) return;
                if (mySwiper.isBeginning) {
                    mySwiper.slideToLoop(totalSlides - 1);
                } else {
                    mySwiper.slideToLoop(mySwiper.realIndex - 1);
                }
            })
            .on('click', '.swiper-button-next', function() {
                if (mySwiper.slideNext()) return;
                if (mySwiper.isEnd) {
                    mySwiper.slideToLoop(0);
                } else {
                    mySwiper.slideToLoop(mySwiper.realIndex + 1);
                }
            });
        });
    </script>
<? endif; ?>
