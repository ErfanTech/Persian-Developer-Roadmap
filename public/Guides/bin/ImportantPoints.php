<?php
include_once "../../../Constants.php";
$Name_Page = str_replace('.php', '', basename(__FILE__));
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <?php include MAIN_DIR . "public/Main/meta-main.php" ?>
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'assets/css/FullStyle.css' ?>">  <!-- Style Main seed -->
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'public/Guides/style.css' ?>">  <!-- Style Main seed -->
    <title> <?= $Name_Page ?></title>
</head>
<body>

<!-- HEADER -->
<?php require MAIN_DIR . "public/Main/Header.php" ?>
<!-- END HEADER -->


<!-- MAIN -->
<!-- Subject -->
<section class="container subject">
    <h1><?= "$Name_Page" ?> (نکات مهم قبل از شروع) </h1>
    <p>نکاتی که قبل از استفاده بهتر است بدانید </p>
    <section class="between">
        <hr class="between">
        <h2><a href="<?= MAIN_SITE ?>" target="_blank">Subscribe</a></h2>
        <h2><?= $Name_Page ?></h2>
    </section>
</section>
<!-- End Subject -->
<!-- Text -->
<section class="container" id="Content">
    <div>
        <ul>
            <b> حتما به موارد زیر توجه داشته باشید : </b>
            <li>هر بخش در نقشه راه قابلیت کلیک دارد و میتوانید توضیح مختصری را مطالعه نمایید.</li>
            <li>توجه داشته باشید منابع استفاده شده ، هم به صورت فارسی و هم به صورت انگلیسی در اختیار شما قرار گرفته است.</li>
            <li>تا جای ممکن بهترین منابع یادگیری و مختص همان موضوع را جمع‌آوری کرده ایم ، اگر منابع بهتری میشناسید حتما معرفی کنید.</li>
            <li>نقشه راه های ایجاد شده از منابع معتبر جمع‌آوری شده اند و بهترین بازده را خواهند داشت ، اگر به هر دلیلی نقشه راه یهتری پیدا نمودید با ما در ارتباط باشید.</li>
            <li>حرف آخر هم اینکه نقشه راه فقط یک مسیر برای رسیدن به هدفتونه ، و برای واقعا رسیدن از هیچ تلاش و کوششی دریغ نکنید</li>
        </ul>
    </div>
</section>
<!-- End Text -->
<!-- END MAIN -->


<!-- Community -->
<?php require MAIN_DIR . "public/Main/Community.php" ?>
<!-- End Community -->
<!-- FOOTER -->
<?php require MAIN_DIR . "public/Main/Footer.php" ?>
<!-- END FOOTER -->


<!-- MAIN SCRIPT -->
<script src="<?= MAIN_SERVER . 'assets/vendor/jquery-3.7.0.min.js' ?>"></script>
<!-- Script For Response Menu -->
<script src="<?= MAIN_SERVER . 'assets/js/Response-Menu.js' ?>"></script>
</body>
</html>