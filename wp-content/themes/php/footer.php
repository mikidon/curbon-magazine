<!-- .footer -->
<footer class="footer">
    <!-- .messageBlock -->
    <!--<div class="messageBlock">
        <div class="cols">
            <div class="col-12">
                <p>degrees magazine は、CURBONがおくる<br>写真に関する新しいWEBメディア。</p>
                <p>写真を学びたいひと。写真を仕事にしたいひと。<br>自分にあうカメラやレンズを見つけたいひと…。</p>
                <p>写真に関わる全てのひとに、もっと写真が上手に、<br>もっと写真が好きになる<br>アイデアや情報をお届けします。</p>
             
            </div>
        </div>
    </div>-->
    <div class="bgc-black ptb60 js-scroll">
        <!-- バナー郡 -->
        <!--<div class="cols ptb30 sm-ptb20">
            <div class="col-12">
                <div class="cols nega gutter-30 gutter-sm-20">
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB1.jpg" width="606" height="184" alt=""></a></div>
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB2.jpg" width="606" height="184" alt=""></a></div>
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB3.jpg" width="606" height="184" alt=""></a></div>
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB4.jpg" width="606" height="184" alt=""></a></div>
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB5.jpg" width="606" height="184" alt=""></a></div>
                    <div class="col-4 col-sm-6 pt30 sm-pt20"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrB6.jpg" width="606" height="184" alt=""></a></div>
                </div>
            </div>
        </div>-->
        <nav class="cols ai-c">
            <div class="col-12">
                <div class="d-f jc-c sm-d-b ai-c ta-c">
                    <a href="<?php echo home_url(); ?>/" class="hov">
                        <img src="<?php echo home_url(); ?>/img/common/logo-w.png" width="139" height="38" alt="">
                    </a>
                    <div class="ml50 pl50 sm-ml0 sm-pl0 sm-mt35 footer-txt">
                        <p>日本国内最大級の写真教育サービス運営からスタートしたCURBONはクリエイターの可能性を活かした新しいビジネスを展開するクリエイティブカンパニーです。最高峰の質とカリスマ性を誇るアーティストのネットワークを有するからこそ生まれる価値や、成し遂げられる仕事が、ここにはあります。</p>
                        <!-- .footer-subLink -->
                        <div class="footer-subLink mt30">
                            <ul>
                                <li><a href="https://www.curbon.jp/" target="_blank" rel="noopener" class="hov">curbon.jp</a></li>
                                <li><a href="https://company.curbon.jp/" target="_blank" rel="noopener" class="hov">運営会社</a></li>
                                <li><a href="https://www.curbon.jp/pages/terms" target="_blank" rel="noopener" class="hov">利用規約</a></li>
                                <li><a href="https://www.curbon.jp/pages/privacy" target="_blank" rel="noopener" class="hov">プライバシー<br class="d-n md-d-b sm-d-n">ポリシー</a></li>
                                <li><a href="https://www.curbon.jp/pages/commercial-act" target="_blank" rel="noopener" class="hov">特定商取引法に<br class="d-n md-d-b sm-d-n">基づく表記</a></li>
                                <li><a href="https://company.curbon.jp/contact" target="_blank" rel="noopener" class="hov">お問い合わせ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="copyright"><small>© 2021, <a href="<?php echo home_url(); ?>/" class="hov">CURBON</a>.</small></div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" defer></script>
<script src="<?php echo home_url(); ?>/js/scroller.js" defer></script>
<script src="<?php echo home_url(); ?>/js/jquery.matchHeight-min.js" defer></script>
<?php if (is_home()) { ?>
    <!-- For Toppage -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php } elseif (is_singular()) { ?>
    <!-- For CMS_POST -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet" defer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript" defer></script>
<?php } ?>
<script src="<?php echo home_url(); ?>/js/common.js" defer></script>