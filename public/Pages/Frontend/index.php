<?php
include_once "../../../Constants.php";
$Name_Page = basename(__DIR__);
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <?php include MAIN_DIR . "public/Main/meta-main.php" ?>
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'assets/css/FullStyle.css' ?>">  <!-- Style Main seed -->
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'public/Pages/style.css' ?>">    <!-- Style Page Clickable -->
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'public/Topics/style.css' ?>">   <!-- Style Topic popup -->
    <title> <?= $Name_Page ?> Road Map </title>
</head>
<body>

<!-- HEADER -->
<?php require MAIN_DIR . "public/Main/Header.php" ?>
<!-- END HEADER -->


<!-- MAIN -->

<!-- Subject -->
<section class="container subject">
    <h1><?= "$Name_Page Developer" ?> (توسعه دهنده سمت کاربر) </h1>
    <p>راهنمای قدم به قدم برای تبدیل شدن به توسعه دهنده سمت کاربر در سال 1402</p>
    <br>
    <div class="row options">
        <div class="col-xs-12 col-s-12 col-l-6">
            <a href="<?= MAIN_SERVER ?>">تمامی نقشه راه ها</a>
            <a id="DownloadFile" href="bin/<?= $Name_Page . '.pdf' ?>">دانلود به صورت PDF</a>
        </div>
        <div class="col-xs-12 col-s-12 col-l-6" style="text-align: left">
            <a href='<?= MAIN_GITHUB . "/issues/new?title=[Suggestion] $Name_Page Developer" ?>' target="_blank">پیشنهاد
                تغییر - نقشه راه بهتر</a>
        </div>
    </div>
    <section class="between">
        <hr class="between">
        <h2><a href="<?= MAIN_SITE ?>" target="_blank">Subscribe</a></h2>
        <h2><?=$Name_Page?></h2>
        <h2><a href="<?= MAIN_SERVER . 'public/Topics/' . $Name_Page ?>">Topics</a></h2>
    </section>
</section>

<!-- Summery DATA - Data Content -->
<dialog id="Data_Content" open>
    <button class="close_up_btn">X</button>
    <div></div>
    <button class="close_down_btn">بازگشت</button>
</dialog>

<!-- Main RoadMap -->
<section class="container RoadMap" style="direction: ltr">
    <?php
    //    include "bin/$Name_Page.svg";   #Direct Load
    CheckLoadSVG(CHECK_SVG,$Name_Page);   #Function Load
    ?>
</section>

<!-- Simple RoadMap -->
<section class="container RoadMapBeginner" style="direction: ltr; display: none">
    <?php
    //    include "bin/$Name_Page"."Beginner.svg";  #Direct Load
    CheckLoadSVG(CHECK_SVG,$Name_Page, "Beginner");   #Function Load
    ?>
</section>

<!-- END MAIN -->


<!-- FOOTER -->
<?php require MAIN_DIR . "public/Main/Footer.php" ?>
<!-- END FOOTER -->


<!-- MAIN SCRIPT -->
<script src="<?= MAIN_SERVER . 'assets/vendor/jquery-3.7.0.min.js' ?>"></script>
<!-- Script For Click -->
<script>
    $('.clickable-group').on('click', function () {
        let data = $(this).attr('data-group-id');
        let name_page = "<?=$Name_Page?>";
        let DownloadBtn = $('#DownloadFile');
        $.ajax({
            method: "POST",
            url: "<?=MAIN_SERVER . 'public/AjaxHandler.php' ?>",
            data: {name: name_page, data_result: data},
            success: function (result) {
                if (result === "Beginner") {
                    $('.RoadMap').fadeOut();
                    $('.RoadMapBeginner').fadeIn();
                    <?php
                    $check = 'bin/' . $Name_Page . "Beginner.pdf";
                    # Check Existed File
                    if(file_exists($check)) :
                    ?>
                    DownloadBtn.attr('href', 'bin/' + name_page + "Beginner.pdf");
                    <?php endif; ?>
                } else if (result === "Pro") {
                    $('.RoadMapBeginner').fadeOut();
                    $('.RoadMap').fadeIn();
                    DownloadBtn.attr('href', 'bin/' + name_page + ".pdf");
                } else {
                    $('#Data_Content').fadeIn();
                    $('#Data_Content div').html(result)
                }
            }
        })
    });
    $("#Data_Content button").on('click', function () {
        $('#Data_Content').fadeOut();
    });
</script>
<!-- Script For Response Menu -->
<script src="<?= MAIN_SERVER . 'assets/js/Response-Menu.js' ?>"></script>
<!-- END MAIN SCRIPT-->
</body>
</html>