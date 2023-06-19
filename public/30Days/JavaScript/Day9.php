<?php
include_once "../../../Constants.php";
$Name_Page = str_replace('.php', '', basename(__FILE__));
$Name_File = basename(__DIR__);
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <?php include MAIN_DIR . "public/Main/meta-main.php" ?>
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'assets/css/FullStyle.css' ?>">  <!-- Style Main seed -->
    <link rel="stylesheet" href="../style.css">  <!-- Style This Page -->
    <link rel="stylesheet" href="<?= MAIN_SERVER . 'assets/vendor/prism.css' ?>">  <!-- Style Prism Library -->
    <title> <?= $Name_Page . ' ' . $Name_File ?>  </title>
</head>
<body>

<!-- HEADER -->
<?php require MAIN_DIR . "public/Main/Header.php" ?>
<!-- END HEADER -->


<!-- MAIN -->
<?php
// Number Of Day
$test = str_replace("Day", '', $Name_Page);
$test = [$test - 1, $test + 1, $test]; // 0 -> Pre  , 1 -> Nex , 2 -> Current
?>
<!-- Subject -->
<section class="container subject">
    <h1>
        <?= "$Name_File 30 Days" ?> (جاوا اسکریپت در 30 روز)
        -
        روز
        <?= $test[2] ?>
    </h1>
    <p>راهنمای قدم به قدم برای تبدیل شدن به برنامه نویس جاوا اسکریپت در <b>30 روز</b></p>
    <br>
    <div class="row options">
        <div class="col-xs-12 col-s-12 col-l-6">
            <a href="<?= MAIN_SERVER ?>">تمامی نقشه راه ها</a>
        </div>
        <div class="col-xs-12 col-s-12 col-l-6" style="text-align: left">
            <a href='<?= MAIN_GITHUB . "/issues/new?title=[Suggestion] $Name_File Developer - 30Days" ?>'
               target="_blank">پیشنهاد
                تغییر - نقشه راه بهتر</a>
        </div>
    </div>
    <section class="between">
        <hr class="between">
        <h2><a href="<?= MAIN_SITE ?>" target="_blank">Subscribe</a></h2>
        <h2><?= $Name_File ?></h2>
        <h2>Day <?= $test[2] ?></h2>
    </section>
</section>

<!-- Start Previous and Next Days -->
<div class="container Pre_Nex">
    <div class="row">
        <a href="<?= 'Day' . $test[1] . '.php' ?>" class="col-xs-5 col-md-2">
            &rarr;
            روز بعدی (
            <?= $test[1] ?>
            )
        </a>
        <div class="col-xs-2 col-md-8"></div>
        <a href="<?= 'Day' . $test[0] . '.php' ?>" class="col-xs-5 col-md-2">
            روز قبلی (
            <?= $test[0] ?>
            )
            &larr;
        </a>
    </div>
</div>
<!-- End Previous and Next Days -->

<br>
<!-- Start List -->
<section class="container list30days">
    <ul>
        <li><a href="#day-9">روز نهم</a>
            <ul>
                <li><a href="#higher-order-function">توابع مرتبه بالا (Higher Order Function)</a>
                    <ul>
                        <li><a href="#callback">مفهوم Callback</a></li>
                        <li><a href="#returning-function">عملکرد برگشتی (Returning function)</a></li>
                        <li><a href="#setting-time">تنظیم زمان (Setting time)</a>
                            <ul>
                                <li><a href="#setting-interval-using-a-set-interval-function">تنظیم زمان با استفاده از setInterval</a></li>
                                <li><a href="#setting-a-time-using-a-set-timeout">تنظیم زمان با استفاده از setTimeout</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#functional-programming">برنامه نویسی تابعی (Functional Programming)</a>
                    <ul>
                        <li><a href="#foreach">forEach</a></li>
                        <li><a href="#map">map</a></li>
                        <li><a href="#filter">filter</a></li>
                        <li><a href="#reduce">reduce</a></li>
                        <li><a href="#every">every</a></li>
                        <li><a href="#find">find</a></li>
                        <li><a href="#findindex">findIndex</a></li>
                        <li><a href="#some">some</a></li>
                        <li><a href="#sort">sort</a>
                            <ul>
                                <li><a href="#sorting-string-values">مرتب سازی رشته ها</a></li>
                                <li><a href="#sorting-numeric-values">مرتب سازی اعداد</a></li>
                                <li><a href="#sorting-object-arrays">مرتب سازی آرایه / شی</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#-exercises">💻 تمرینات</a>
                    <ul>
                        <li><a href="#exercises-level-1">تمرینات: سطح 1</a></li>
                        <li><a href="#exercises-level-2">تمرینات: سطح 2</a></li>
                        <li><a href="#exercises-level-3">تمرینات: سطح 3</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</section>
<!-- End List -->

<!-- Start Article -->
<article class="container">
    <h1 id="day-9">روز نهم</h1>
        <h1 id="higher-order-function">توابع مرتبه بالا (Higher Order Function)</h1>
            <div>
                <p>
                    تا به الان با مفهوم های زیادی آشنا شدیم ، اما امروز قراره چیزایی که یاد گرفتیم رو یکمی پیشرفته‌تر کنیم تا بیشتر به دردمون بخوره؛
                    یکی از مباحث Higher Order Function که یعنی تابعی داریم که یکی از آرگومان های همین تابع ، تابعی دیگه اییه! یعنی تابع ما خودش یه تابع میگیره و در آخرم یه تابع خروجی میده.
                    این مبحث برای توضیح دادن یکمی سخته و بهتره با مثال این مورد رو بهتون توضیح بدم!
                </p>
            </div>
            <h2 id="callback">مفهوم Callback</h2>
                <div>
                    <p>
                        اولین بخش در مورد توابع مرتبه بالا callback ، کالبک همونجوری که از اسمش پیداست یعنی تابعی که بهش یه تابع دیگه رو پاس میدیم
                        برای درک بهتر این زیر روی مثال توضیح میدم چون این بخش یکم توضیح دادنش برای خودمم سخته!!
                    </p>
                    <pre>
                        <code>
                            const callback = (n) => {
                                return n ** 2 ;
                            }
                            // ما یه تابع پیکانی ایجاد کردیم که یه آرگومان میگیره و اونو به توان 2 میرسونه

                            function cube(callback, n) {
                                return callback(n) * n ;
                            }
                            // اینجا هم یه تابع دیگه ایجاد کردیم که آرگومان اول یه تابع میگیره و در آخر مقدار اون تابع رو ضبدر یه متغیر دیگه میکنه
                            // توجه کنید که ما آرگومان دوم رو به آرگومان تابع کالبک پاس دادیم

                            console.log(cube(callback, 3)) // Print : 27
                        </code>
                    </pre>
                    <b>
                        توجه به دو نکته داشته باشید ، اول اینکه هر اسمی میتونید برای تابع ها بزارید ولی بهتره برای تابعی که از کالبک استفاده میکنه از کلمه callback استفاده کنید
                        تا یادتون بمونه این تابع متغیر نمیگرفت! و مورد دوم هم اینکه طریقه کار توابع کالبک به این صورته که اول تابع درونی صدا زده میشه
                        و بعد تابع بیرونی (یعنی اول مقدار تابع کالبک محاسبه میشه و بعد مقدار تابع اصلی بدست میاد)
                    </b>
                    <pre>
                        <code>
                            // یه مثال دیگه میزنم این پایین ولی نحوه کارشو فک کنید چجوریه
                            const myFunkCallBack = (a,b) => {
                                return ((a + b) / 2 );
                            }
                            function mainFunk (callback , a , b) {
                                return callback(a,b) * callback(a,b)
                            }

                            console.log(mainFunk(myFunkCallBack,4,6))  // Print : 25
                        </code>
                    </pre>
                </div>
            <h2 id="returning-function">عملکرد برگشتی (Returning function)</h2>
                <div>
                    <p>
                        حالا که معنی کالبک رو میدونیم ، برسیم سر همون توابع مرتبه بالا که فرق این توابع اینه که علاوه بر گرفتن یه تابع ، یه تابع رو هم برمیگردونن مثل زیر :
                    </p>
                    <pre>
                        <code>
                            const higherOrder = n => {
                                const doSomething = m => {
                                    const doWhatEver = t => {
                                        return n * m * t
                                }
                                return doWhatEver
                              }
                              return doSomething
                            }
                            console.log(higherOrder(2)(3)(10))  // Print : 60
                        </code>
                    </pre>
                    <b>
                        به احتمال بالا با دیدن کدهای بالا یکم جا خوردید ، که چی شد؟ بیاید از اول بررسی کنیم ببینیم داستان از چه قراره (به بررسی کدهامون از بالا به پایین میگیم trace کردن ، اینجوری درک بهتری از کدهامون پیدا میکنیم)
                        <br>
                        در قسمت اول یه تابع ایجاد کردیم با یه آرگومان به نام n ،
                        داخل همین تابع یه تابع دیگه تعریف میکنیم به نام doSomething که این تابع هم یه آرگومان به نام m میگیره و دوباره داخل همین تابع یه تابع دیگه تعریف میکنیم به
                        نام doWhatEver که این تابع هم یه آرگومان دیگه میگیره (3 تا تابع تو در تو داریم که هرکدومش یه آرگومان میگیره ، پس تابع اصلی نیاز به 3 تا آرگومان داره)
                        <br>
                        تابع آخری که تعریف کردیم دیگه داخلش تابع دیگه ایی وجود نداره و ضرب تمامی آرگومان هامون رو برمیگردونه (یعنی الان ضرب همه آرگومان هامون داخل متغیر doWhatEver ذخیره شده) ، حالا برای استفاده از این مقدار
                        باید این متغیر رو برگردونیم پس از return doWhatEver استفاده میکنیم ، با این کار مقدار doWhatEver به تابع doSomething فرستاده میشه ، ولی هنوز کار داریم
                        و دوباره باید این مقدار هم برگردونیم تا تابع higherOrder یه مقدار بازگشتی داشته باشه.
                        <br>
                        ممکنه یکم گیج شده باشید اما چند بار این متن رو بخونید تا متوجه بشید ، در واقع هر تابع داخل خودش یه تابع دیگه رو تعریف میکنه و در آخر
                        مقدار همون تابع رو برمیگردونه.
                    </b>
                    <pre>
                        <code>
                            // اینم یه مثال جالب تر که میتونید بررسیش کنید
                            const number = [1,2,3,4,5]
                            const sumArray = (arr) => {
                                let sum = 0 ;
                                const callback = function(element) {
                                    sum += element
                                }
                                for (const elem of arr) {
                                    callback(elem)
                                }
                                return sum
                            }
                            console.log(sumArray(number)) // Print : 15
                        </code>
                    </pre>
                </div>
            <h2 id="setting-time">تنظیم زمان (Setting time)</h2>
                <div>
                    <p>
                        حالا که در مورد تابع های مرتبه بالا و کالبک فانکشن ها اطلاعات داریم ، میرسیم به چنتا تابع مهم! دوتا تابع میخوایم معرفی کنیم که callback میگیرن
                        و قراره باهاشون کارهای جالبی انجام بدیم!
                    </p>
                </div>
                <h3 id="setting-interval-using-a-set-interval-function">تنظیم زمان با استفاده از setInterval</h3>
                    <div>
                        <p>
                            خب تا حالا توابع زیادی یاد گرفتیم ، اما فرض کنید میخواید بعد از 10 ثانیه یچیزی رو توی کنسول چاپ کنید و نمیخواید دقیقا همون لحظه اجرا بشه! اونوقت نیاز به تابعی داریم
                            که الان میخوایم بررسیش کنید! تابع setInterval ، تابعیه که ما میتونیم باهاش کارامون رو به صورت مداوم در بازه زمانی مشخص انجام بدیم (یعنی مثلا میخوایم هر 5 ثانیه یک بار توی کنسول سلام رو چاپ کنیم) :
                        </p>
                        <pre>
                            <code>
                                // سیتکس کلی این تابع ایمجوریه
                                function callback() { // تابعی که میخواید به صورت مداوم اجرا بشه
                                    // کد های شما
                                }
                                setInterval(callback , duration)

                                // آرگومان اول همون تابعیه که میخواید اجرا بشه و آرگومان دوم مدت زمان هر تکرار رو مشخص میکنه
                            </code>
                        </pre>
                        <pre>
                            <code>
                                function salam() {
                                    console.log('سلام')
                                }
                                setInterval(salam , 1000)
                                // آرگومان دوم رو به میلی ثانیه میدیم (هر 1000 میلی ثانیه یک ثانیه است)
                                // الان هر 1 ثانیه توی کنسول سلام چاپ میشه
                                // توجه کنید که تا بی نهایت ادامه داره
                            </code>
                        </pre>
                    </div>
                <h3 id="setting-a-time-using-a-set-timeout">تنظیم زمان با استفاده از setTimeout</h3>
                    <div>
                        <p>
                            تابع بالا به صورت مداوم دستورات شما رو اجرا میکنه ، اما اگه بخواید یبار اجرا بشه باید چیکار کنید؟ خب یه تابع دیگه داریم
                            که این تابع هم سیسنتکسش دقیقا مثل بالاییه ولی فقط یبار اجرا میشه :
                        </p>
                        <pre>
                            <code>
                                function salam() {
                                    console.log('سلام')
                                }
                                setTimeout(salam, 2000) // بعد از 2 ثانیه ، فقط یکبار سلام رو توی کنسول چاپ میکنه
                            </code>
                        </pre>
                        <b>
                            جلسات بعدی با این توابع بیشتر آشنا میشیم ، ولی میتونید سرچ بزنید و اطلاعاتتونو از قبل بالا ببرید تا به مبحثش برسیم!
                        </b>
                    </div>
        <h1 id="functional-programming">برنامه نویسی تابعی (Functional Programming)</h1>
            <div>
                <p>
                    مبحث توابع مرتبه بالا از شیوه برنامه نویسی تابعی ایجاد شده.ولی اصلا شیوه برنامه نویسی چیه ؟ بحث شیوه برنامه نویسی برای توضیحا دادن توی اینجا نیست و بهتره سرچ کنید
                    تا بهتر یاد بگیرید ولی به صورت کلی شیوه برنامه نویسی همونجوری که از روی اسمش پیداست یعنی با استفاده از چه الگویی کد بنویسیم. و توی برنامه نویسی تابعی یعنی رویکرد برنامه نویسمون
                    بر پایه محسابات و استفاده های مکرر از توابع مختلفه(شیوه های برنامه نویسی دیگه ایی هم داریم مثل شی گرا یا برنامه نویسی اعلانی که هر کدوم شیوه و هدف متفاوتی دارن)
                    <br>
                    در این قسمت میخوایم با بعضی از توابع آشنا بشیم که توی برنامه نویسی تابعی بهمون کمک میکنه و میتونه پیچیدگی برناممون رو تا حد زیادی کم کنه!
                </p>
            </div>
            <h2 id="foreach">forEach</h2>
                <div>
                    <p>
                        قبلا در مورد حلقه ها حرف زدیم و گفتیم میتونیم از حلقه for به شکلی استفاده کنیم که از ایندکس اول تا آخر آرایه رو برامون تکرار کنه ؛اما تابعی داریم که این کار رو برامون خیلی ساده‌تر میکنه
                        ینی پیچدگی حلقه for رو تا حد زیادی پایین میاره و حتی نوشتن راحت تری داره و اسم اون تابع چیزی نیست جز forEach!
                    </p>
                    <pre>
                        <code>
                            const number = [1,2,3,4,5];

                            number.forEach(num => console.log(num))
                            // قبل از مشاهده سینتکس اینو نگاه کنید و با این زیری مقایسه کنید

                            for (const num as number) {
                                console.log(num);
                            }

                            // جفت کدها یکار رو میکنن
                        </code>
                    </pre>
                    <pre>
                        <code>
                            /*
                            سینتسک کلی این تابع خیلی راحته ، آرایه ایی که میخواید روش تکرار رو انجام بدید رو مینویسید و از کلمه کلیدی
                            forEach
                            بعد از اون استفاده میکنید ، و در آرگومان هم یه تابع ناشناس تعریف میکنید و کاری که میخواید تکرار بشه
                            رو داخل اون مینویسد به همین راحتی
                            */

                            const number = [1,2,3,4,5];
                            number.forEach(num => console.log(num))
                            /*
                            ببنید ما یه آرایه با 5 عضو ساختیم
                            بعد از فورایچ استفاده کردیم و به عنوان آرگومان بهش یه تابع پیکانی دادیم که یه آرگومان داره ؛ آرگومان
                            num
                            همون اعضای آرایه رو در هر دور مشخص میکنه ، دقیقا مثل حلقه
                            for
                            که اعضا رو به صورت زیر مشخص میکردیم
                            const array as element
                            */


                            let sum = 0;
                            const numbers = [1, 2, 3, 4, 5];
                            numbers.forEach(num => sum += num)

                            console.log(sum) // Print : 15
                        </code>
                    </pre>
                    <pre>
                        <code>
                            // توجه کنید که سیتکس کلی این تابع به این صورته
                            const numbers = [1, 2, 3, 4, 5];
                            numbers.forEach((element, index, numbers) => {
                                console.log(element, index, numbers)
                            })

                            /* Print :
                            1 0 (5)[1, 2, 3, 4, 5]
                            2 1 (5)[1, 2, 3, 4, 5]
                            3 2 (5)[1, 2, 3, 4, 5]
                            4 3 (5)[1, 2, 3, 4, 5]
                            5 4 (5)[1, 2, 3, 4, 5]
                            */
                        </code>
                    </pre>
                    <b>
                        آرگومان اول یعنی element در هر دور یک عضو از آرایه رو میگیره ، آرگومان دوم یعنی index در هر دور مقدار اندیس یا همون ایندکس
                        هر عضو رو برمیگردونه (یعنی در دور اول 0 و در دور دوم 1 و الی آخر رو برمیگردونه) و همچنین آرگومان سوم خود آرایه رو برمیگدونه!
                    </b>
                </div>
            <h2 id="map">map</h2>
            <h2 id="filter">filter</h2>
            <h2 id="reduce">reduce</h2>
            <h2 id="every">every</h2>
            <h2 id="find">find</h2>
            <h2 id="findindex">findIndex</h2>
            <h2 id="some">some</h2>
            <h2 id="sort">sort</h2>
                <h3 id="sorting-string-values">مرتب سازی رشته ها</h3>
                <h3 id="sorting-numeric-values">مرتب سازی اعداد</h3>
                <h3 id="sorting-object-arrays">مرتب سازی آرایه / شی</h3>
        <h1 id="-exercises">💻 تمرینات</h1>
            <h2 id="exercises-level-1">تمرینات: سطح 1</h2>
            <h2 id="exercises-level-2">تمرینات: سطح 2</h2>
            <h2 id="exercises-level-3">تمرینات: سطح 3</h2>
</article>
<!-- End Article -->

<!-- Start Previous and Next Days -->
<div class="container Pre_Nex mg2b">
    <div class="row">
        <a href="<?= 'Day' . $test[1] . '.php' ?>" class="col-xs-5 col-md-2">
            &rarr;
            روز بعدی (
            <?= $test[1] ?>
            )
        </a>
        <div class="col-xs-2 col-md-8"></div>
        <a href="<?= 'Day' . $test[0] . '.php' ?>" class="col-xs-5 col-md-2">
            روز قبلی (
            <?= $test[0] ?>
            )
            &larr;
        </a>
    </div>
</div>
<!-- End Previous and Next Days -->

<!-- END MAIN -->

<!-- Up Button -->
<?php include MAIN_DIR . 'public/Main/Top_Button.php' ?>

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

<!-- Script For Prism -->
<script src="<?= MAIN_SERVER . 'assets/vendor/prism.js' ?>"></script>

<!-- Script Helper -->
<script src="<?= MAIN_SERVER . 'assets/js/Helper.js' ?>"></script>

<!-- File Need It -->
<script src="assets/FileNeedIt.js"></script>

<script>
    scroll_down('.list30days li a', 600);
    scroll_down('#top_button', 1000, '#Head-Sec');
</script>
<!-- END MAIN SCRIPT-->
</body>
</html>