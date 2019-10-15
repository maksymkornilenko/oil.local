<?php if (!empty($count)) { ?>
    <!--версия 2.0-->
    <div class="t706__cartwin-heading t-name t-name_xl">Оставьте данные для оформления заказа</div>
    <div class="t706__cartwin-products">
        <div class="t706__product">
            <div class="t706__product-thumb">
                <div class="t706__product-imgdiv">

                </div>
            </div>
            <div class="t706__product-title t-descr t-descr_sm">
                Косметическое кокосовое масло Maldives Dreams
            </div>
            <div class="t706__product-plusminus t-descr t-descr_sm">
                    <span class="t706__product-minus">
                        <img src="/image/arrows_circle_minus.svg" data-id="<?= $id ?>" data-name="Кокосовое мыло"
                             data-count="1" id="minus-cart">
                    </span>
                <span class="t706__product-quantity cart-count" data-id="<?= $id ?>"><?= $count ?></span>
                <span class="t706__product-quantity cart-price" data-id="<?= $id ?>">299</span>
                <span class="t706__product-plus">
                        <img src="/image/arrows_circle_plus.svg" data-id="<?= $id ?>" data-name="Кокосовое мыло"
                             data-count="1" id="plus-cart">
                    </span>
            </div>
            <div class="t706__product-amount t-descr t-descr_sm"><?= $count * 299 ?>&nbsp;грн
            </div>
            <span class="t706__product-del">
                    <img src="/image/arrows_circle_remove.svg"
                         class="del-item" data-name="Кокосовое мыло" data-id="<?= $id ?>">
                </span>
        </div>
    </div>
    <div class="cartwin-prodamount-wrap t-descr t-descr_sm">
        <?php if ($count > 1) { ?>
            <span class="t706__cartwin-prodamount-label">Сумма с учётом скидки:</span>
        <?php } else { ?>
            <span class="t706__cartwin-prodamount-label">Сумма:&nbsp;</span>
        <?php } ?>
        <span class="t706__cartwin-prodamount"><?= $count * 299 ?>&nbsp;грн</span>
        <span class="t706__cartwin-count"><?= $count ?></span>
    </div>
<?php } else { ?>
    <div>
        <h3>
            <?php if (Yii::$app->session->hasFlash('success')) { ?>
                <div class="js-successbox t-form__successbox t-text t-text_md"><?php echo Yii::$app->session->getFlash('success'); ?></div>
                <?php echo $liqpayForm ?>
            <?php } elseif (Yii::$app->session->hasFlash('error')) { ?>
                <div class="js-successbox t-form__errorbox t-text t-text_md"><?php echo Yii::$app->session->getFlash('error'); ?></div>
            <?php } else { ?>
                <div class="empty-cart"><p>Корзина пуста</p></div>
            <?php } ?>
        </h3>
    </div>
<?php } ?>