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
    <ul dir="auto">
        <li><a href="#-day-8">📔 Day 8</a>
            <ul dir="auto">
                <li><a href="#scope">Scope</a>
                    <ul dir="auto">
                        <li><a href="#window-global-object">Window Global Object</a></li>
                        <li><a href="#global-scope">Global scope</a></li>
                        <li><a href="#local-scope">Local scope</a></li>
                    </ul>
                </li>
                <li><a href="#-object">📔 Object</a>
                    <ul dir="auto">
                        <li><a href="#creating-an-empty-object">Creating an empty object</a></li>
                        <li><a href="#creating-an-objecting-with-values">Creating an objecting with values</a></li>
                        <li><a href="#getting-values-from-an-object">Getting values from an object</a></li>
                        <li><a href="#creating-object-methods">Creating object methods</a></li>
                        <li><a href="#setting-new-key-for-an-object">Setting new key for an object</a></li>
                        <li><a href="#object-methods">Object Methods</a>
                            <ul dir="auto">
                                <li><a href="#getting-object-keys-using-object-keys">Getting object keys using Object.keys()</a></li>
                                <li><a href="#getting-object-values-using-object-values">Getting object values using Object.values()</a></li>
                                <li><a href="#getting-object-keys-and-values-using-object-entries">Getting object keys and values using Object.entries()</a></li>
                                <li><a href="#checking-properties-using-has-own-property">Checking properties using hasOwnProperty()</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#-exercises">💻 Exercises</a>
                    <ul dir="auto">
                        <li><a href="#exercises-level-1">Exercises: Level 1</a></li>
                        <li><a href="#exercises-level-2">Exercises: Level 2</a></li>
                        <li><a href="#exercises-level-3">Exercises: Level 3</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</section>
<!-- End List -->

<!-- Start Article -->
<article class="container">
    <h1 id="-day-7">📔 روز هفتم</h1>
        <h1 id="functions">توابع (Functions)</h1>
            <div>
                <p>
                    خب خب خب! تا الان با توابع زیادی آشنا شدیم و تونستیم باهاشون کار کنیم. امروز میخوایم در مورد تعریف تابع باهم صحبت کنیم.اصلا چرا باید تابع تعریف کنیم؟ ما تابع های
                    زیادی توی جاوا اسکریپت داریم که خیلیاشون خیلی کمک کننده هستن اما کافی نیستن! مثلا ما برای چاپ یچیزی توی کنسول از دستور console.log استفاده میکنیم اما اگه بخوایم
                    توی برناممون 10 بار چاپش کنیم نیازه که یه حلقه بنویسم. تا اینجا کارمون با حلقه حله ، اما وقتی به مشکل میخوریم که توی 20 تا جای دیگه هم بخوایم 10 بار چیزی رو چاپ کنیم
                    اونوقت باید 20 بار حلقه بنویسیم و هربار هم یه کار رو داره انجام میده! پس اینجا نیاز به تابع داریم که کارمون رو راحت تر کنیم و با دستورات کمتر برناممون رو به سرانجام برسونیم (این یه مثال ساده بود ، بعضی وقتا نیاز به کار های پیچیده تری داریم و نیازه که چندجا از یه دستور استفاده کنیم برای همین تابع مینویسیم تا کارمون راحت تر بشه و کدمون تمیز تر و کمتر بشه!)
                </p>
            </div>
            <h2 id="function-declaration">اعلان تابع (Function Declaration)</h2>
                <div>
                    <p>
                        برای تعریف تابع کارمون خیلی ساده است و فقط یه کلمه کلیدی باید یاد بگیرید که اونم کلمه کلیدی function که میتونیم مث آب خوردن باهاش تابع بسازیم ، سینتکس کلی تابع به این شکله :
                    </p>
                    <pre>
                        <code>
                            function اسم_تابع() {
                                // دستورات شما
                            }
                            اسم_تابع  // صدا زدن تابع()

                            // میبینید چقد ساده است اینجوری یه تابع ساختیم و یادتون باشه اسمش باید انگلیسی باشه
                            // پرانتز جلوی اسم تابع حتما باید باشه و همون تابع رو مشخص میکنه
                        </code>
                    </pre>
                </div>
            <h2 id="function-without-a-parameter-and-return">تابع بدون پارامتر و مقدار بازگشتی</h2>
                <div>
                    <p>
                        ساده ترین نوع تعریف تابع ، تابعی بدون پارارمتر(دیدین ما به توابع آرگومان پاس میدیم؟در تعریف تابع به این آرگومان هایی که قرار پاس داده بشن میگن پارامتر که البته بعضی جاها جای هم استفاده میشه که بهتره استفاده نکنید) و مقدار بازگشتیه(جلوتر در مورد مقدار بازگشتی حرف میزنیم)
                        ، این نوع تابع داخل پرانتز هیچی نداره و چیزیم به عنوان خروجی برنمیگردونه (ینی نمیتونید مثل تابع length این توابع رو به یه متغیر نسبت بدید چون هیچ نوع داده ایی رو بر نمیگردونه و فقط میتونه براتون یه کاری رو داخل تابع انجام بده) این زیر چنتا مثال ببینید حال کنید :
                    </p>
                    <pre>
                        <code>
                            function print10() {
                                console.log(10)
                            }
                            print10() ;  // Print : 10
                            // تابع بالا یه تابع خیلی مسخره است و باعث میشه عدد 10 چاپ بشه ، گفتم مسخره چون برای همچین
                            // چیز ساده ایی تابع نمینویسیم اینجا فقط یه مثال ساده زدم

                            function copyRight() {
                                console.log('-----------');
                                console.log('Amir Roox');
                                console.log('-----------');
                            }
                            copyRight() ;
                            /*
                            تابع بالا یکمی کاربردی تره ، فرض کنید میخواید توی خیلی جاها همچین چیز ثابتی رو چاپ کنید توی کنسول
                            اگه بدون تابع بخواید پیش برید هر دفعه 3 خط کد باید بنویسید و اگه 30 بار استفاده کنید میشه 90 خط
                            ولی اگه با تابع این کارو کنید خود تابع 5 خط و هر بار اجرا یه خطه که برای 30 بار میشه 35 خط
                            که یعنی حدود یک سوم کمتر دستور وارد میکنید
                            */

                            function addTwoNumbers() {
                              let numOne = 10
                              let numTwo = 20
                              let sum = numOne + numTwo

                              console.log(sum)
                            }

                            addTwoNumbers() // این تابع هم براتون جمع 2 عدد 10 و 20 رو انجام میده و در آخر اونو چاپ میکنه

                            /*
                            ما بالاتر گفتیم این نوع تابع چیزی برای خروجی نداره و درستم گفتیم ، چاپ کردن یچیزی خروجی خود تابع نیست مثلا تابع
                            length
                            طول رشته رو براتون میفرسته و جایی هم چاپش نمیکنه یعنی میتونید مثل زیر ازش استفاده کنید
                            let tool = "amirroox".length();
                            الان عدد 8 مقدار بازگشتی این تابع است و ریختیمش توی متغیرمون اما توی توابع بالا چیزی برنمیگرده که بخوایم
                            توی متغیر ذخیره کنیم و به صورت خام از تابع استفاده میشه
                            */
                        </code>
                    </pre>
                </div>
            <h2 id="function-returning-value">تابع با مقدار بازگشتی</h2>
                <div>
                    <p>
                        حالا که در مورد توابع بدون مقدار بازگشتی صحبت کردیم ، میرسیم به مقدار بازگشتی ؛ مقدار بازگشتی یعنی تابع ما بعد از انجام دستورات
                        یه مقداری رو برگردونه که ما بتونیم از اون مقدار توی متغیر یا هرجایی که خواستیم استفاده کنیم ، مثال زیرو ببینید :
                    </p>
                    <pre>
                        <code>
                            function printFullName (){
                              let firstName = 'Amir'
                              let lastName = 'Roox'
                              let space = ' '
                              let fullName = firstName + space + lastName
                              return fullName
                            }
                            console.log(printFullName()) // Print : Amir Roox
                            /*
                            برای بازگشتی کردن تابع از کلمه کلیدی
                            return
                            استفاده میکنیم ، و تابع بالا کارش اینه که اسم مارو برگردونه (یعنی مقدار بازگشتی یه رشته است)
                            البته حواستون باشه که میتونید توی توابع بازگشتی هم یچییزی چاپ کنید و هم مقدار بازگشتی داشته باشید
                            */
                            let myName = printFullName() // الان تونستیم اون رشته ساخته شده رو به یه متغیر پاس بدیم به همین راحتی
                        </code>
                    </pre>
                </div>
            <h2 id="function-with-a-parameter">تابع با یک پارامتر</h2>
                <div>
                    <p>
                        تا الان با تواابعی آشنا شدیم که آرگومانی نمیتونستیم بهشون پاس بدیم و این باعث میشه تابع ما پویا نباشه و همیشه یه کار ثابت رو انجام بده ، مثلا فرض کنید توی اون تابع که اسممو چاپ میکرد
                        من یجایی بخوام اسم یکی دیگه رو وارد کنم و نمیخوام تابع جدیدی هم بنویسم (چون دقیقا میخوام یه کار انجام بشه ولی فقط اسم تغییر کنه) اینجاست که نیاز داریم تابعی بنویسم
                        که پارامتر داشته باشه و مارو از نوشتن چندین تابع جداگونه بی نیاز کنه (کلا برنامه نویس باید تنبل باشه و کد اضافه ننویسه!) این زیر (اره همین زیر) سینتکس و چنتا مثال میبینید :
                    </p>
                    <pre>
                        <code>
                            function functionName(پارامتر) {
                                // دستورات شما
                            }

                            function fullName(name) {
                                console.log(----------);
                                console.log(name);
                                console.log(----------);
                            }
                            /*
                            تابع بالا الان پویا است و میتونید مثل زیر صداش کنید و حالا هرچیزی به عنوان آرگومان به این تابع پاس بدید
                            براتون با همون آرگومان روی کنسول چاپ میکنه
                            */
                            fullName('AmirRoox');
                            fullName('Javad');
                            fullName('Sepideh');


                            // مثال زیر برای محاسبه مساحت یه دایره است و اینجاست که میتونید قدرت پارامتر داشتن تابع رو بفهمید
                            function area(r) {
                                let area = Math.PI * r * r
                                return area;
                            }
                            let myCircle = area(15)
                            console.log(myCircle) // Print : 706.8583470577034

                            // یادتون باشه میتونید هر اسمی برای پارامتر هاتون بزارید اما بهتره یچیزی بزارید که مرتبط باشه چون قراره
                            // داخل خود تابع از اون پارامتر استفاده کنید
                        </code>
                    </pre>
                </div>
            <h2 id="function-with-two-parameters">تابع با دو پارامتر</h2>
                <div>
                    <p>
                        مثال بالا توابعی با 1 پارامتر بود حالا میخوایم 2 تا پارامتر بدیم چون ممکنه یه کاری بخوایم بکنیم که نیاز به دوتا داده داشته باشه ، مثل محاسبه مساحت مستطیل که هم نیاز به طول داره هم عرض :
                    </p>
                    <pre>
                        <code>
                            function area(length , width) {
                                let areaT = length * width
                                return areaT;
                            }
                            let myT = area(3,4)
                            console.log(myT) // Print : 12


                            // یا اینکه میخواید جمع دوتا عدد رو روی کنسول چاپ کنید
                            function sumTwoNum(num1 , num2) {
                                console.log(num1 + num2)
                            }
                            sumTwoNum(78, 3) // Print : 81
                        </code>
                    </pre>
                </div>
            <h2 id="function-with-many-parameters">تابع با چند پارامتر</h2>
                <div>
                    <p>
                        دیگه بسه هی گفتم فلان قدر پارامتر ، شما میتونید هرچقد دلتون میخواد پارامتر برای تابع تعریف کنید ، پس به نیازتون مربوطه مثلا برای مساحت دایره یه پارامتر به عنوان شعاع میخواید ، برای مستطیل دوتا میخواید و برای ذوزنقه 3 تا پارامتر میخواید ، پس باید
                        توجه کنید که تابعتون میخواد چیکار کنه و به همون مقدار پارامتر تعریف کنید (حواستونم باشه وقتی برای یه تابع پارامتر در نظر میگیرد وقتی اون تابع رو صدا میزنید حتما باید به اندازه پارامتر ها بهشون آرگومان بدید وگرنه داستان میشه براتون (خطا ایجاد میشه) )
                    </p>
                    <pre>
                        <code>
                            function functionName(پارمتر 1 و پارامتر 2 و الی آخر) {
                                // دستورات شما
                            }

                            function area(a , b ,h) {
                                area = ((a+b)/2) * h  // مساحت ذوزنقه
                                return area;
                            }
                            let my = area(2,5,7)
                            console.log(my); // Print : 24.5
                        </code>
                    </pre>
                </div>
            <h2 id="function-with-unlimited-number-of-parameters">تابع با پارمتر های نامحدود</h2>
                <div>
                    <p>
                        حالا یه وقتایی هم هست که اصلا ما نمیدونیم چنتا پارامتر نیاز داریم ، مثلا فرض کنید میخواید چنتا عدد رو باهم جمع کنید (شما نمیدونید چنتا عدد چنتاست ممکنه یکی باشه ممکنه 40 تا باشه) اونجاست که ما نمیدونیم اصلا چنتا پارامتر نیاز داریم
                        برای همین باید تابعی تعریف کنیم که پارامتر های نامحدود داشته باشه ، ما اینجا دوتا روش رو یاد میدیم ، یکی توی توابع معمولی و یکی توی توابع پیکانی (که جلوتر در مورد این نوع تابع هم بیشتر صحبت میکنیم).
                    </p>
                </div>
                <h3 id="unlimited-number-of-parameters-in-regular-function">پارامتر نامحدود در regular function</h3>
                    <div>
                        <p>
                            برای تعریف توابع با پارامتر نامحدود در توابع عمومی (منظم) ما نیازی نداریم که داخل پرانتز پارامتری قرار بدیم و فقط از شی arguments استفاده میکنیم. این شی تمامی آرگومان های پاس داده شده به آرایه رو تو خودش ذخیره میکنه و مثل زیر میتونید ازش استفاده کنید :
                        </p>
                        <pre>
                            <code>
                                function sumAllNums() {
                                    console.log(arguments)
                                }

                                sumAllNums(1, 2, 3, 4)
                                // Print : Arguments(4) [1, 2, 3, 4, callee: ƒ, Symbol(Symbol.iterator): ƒ]

                                /*
                                 تمامیه آرگومان هایی که به تابع پاس دادیم رو به صورت یه آرایه بر میگردونه arguments کلمه کلیدی
                                پس وقتی چیزی داریم که تمام آرگومان ها توش ذخیره میشه میتونیم ازشون استفاده کنیم و تعدادشونم مهم نیست
                                اگر هم توجه کنید ما توی تعریف تابع داخل پرانتز تابع پارامتری قرار ندادیم یعنی میتونه از 0 تا بی نهایت ارگومان بهش بدیم
                                ولی اگه به همون تابع یه پارامتر بدیم از 1 تا بی نهایت آرگومان میتونیم بهش بدیم
                                همراه با پارمتر هم استفاده کرد arguments پس بدونید که میشه از شی
                                */

                                // این زیرم یه مثال دیگه زدم که ببینید میشه به هر آرگومان هم دسترسی داشت
                                function func1(a) {
                                    console.log(arguments[0]);  // اولین آرگومان رو چاپ میکنه

                                    console.log(arguments[1]);
                                    // دومین آرگومان رو چاپ میکنه ، ولی اگه آرگومان دومی پاس ندیم باعث داده تعریف نشده میشه
                                }

                                func1(1, 2, 3);
                                func1(1); // باعث داده تعریف نشده میشه
                            </code>
                        </pre>
                    </div>
                <h3 id="unlimited-number-of-parameters-in-arrow-function">پارارمتر نامحدود در arrow function</h3>
                    <div>
                        <p>
                            ما پایین تر در مورد arrow function ها صحبت میکنیم ، اما فعلا بدونید که اینم یه نوع تعریف تابع است ولی کدای مارو کمتر میکنه (قبلا گفتم ما خیلی تنبلیم) و یکی از مزایاش همین کمتر کد زدنه!
                            سینتکس کلیش این زیریه است :
                        </p>
                        <pre>
                            <code>
                                let myFunc = (پارامترها) => {
                                    //کد شما
                                }

                                /*
                                اگه یکم توجه کنید ممکنه خودتون متوجه بشید که چه فرقی کرده ، اول اینکه این نوع تابع کلمه کلیدی خاصی نداره
                                ولی باید حواستون باشه که به یه متغیر داده میشه ، یعنی ما یه متغیر میسازیم و جلوش = میزاریم
                                بعد از اون داخل پرانتز پارامترهامونو مینویسم (البته پرانتز نزارید هم قبوله) دقیقا مثل روش قبلی تعریف تابع
                                بعد از تعریف پارامترها باید از علامت <= استفاده کنیم و برای همینم بهش میگیم تابع پیکانی (فلش دار)
                                بعد از اونم دستوراتمونو وارد میکنیم ، دقیقا مشابه با تابع عادی
                                و برای صدا زدن تابع هم از اسم متغیرمون بعلاوه پرانتز کمک میگیرم مثل زیر
                                myFunc()
                                */
                            </code>
                        </pre>
                        <p>
                            برای اینکه از پارامتر های نامحدود توی این نوع تابع استفاده کنیم جای پارامتر رو با args... عوض میکنیم
                            و برای دسترسی به آرگومان های پاس داده شده به تابع از args استفاده میکنیم ، دقیقا مثل زیر :
                        </p>
                        <pre>
                            <code>
                                const sumAllNums = (...args) => {
                                    console.log(args)
                                }

                                sumAllNums(1, 2, 3, 4)  // Print : [1, 2, 3, 4]
                            </code>
                        </pre>
                        <p>
                            <b>
                                args هم مانند arguments یک آرایه به شما تحویل میده و برای دسترسی به هر آرگومان پاس داده شده باید از ایندکس [] استفاده کنید ، پس این
                                موردم یادتون نره! و تا یادم نرفته اینم بگم که میتونید به جای args... هر اسم دیگه ایی هم بزارید و برای دسترسی به آرگومان ها از همون اسم استفاده کنید.
                            </b>
                        </p>
                    </div>
            <h2 id="anonymous-function">تابع ناشناس (Anonymous Function)</h2>
                    <div>
                        <p>
                            خب یه تابع باحال داریم به نام تابع ناشناس! چرا بهش میگیم ناشناس؟ چون این توابع اسم ندارن! شاید بپرسید اگه اسم ندارن چجوری میتونیم صداشون کنیم؟ باید بگم
                            دقیقا مثل توابع پیکانی ، این توابع رو هم به یه متغیر نسبت میدیم. سینتکسش خلی آسونه و فقط همون کلمه کلیدی function رو داره و هرکاری با توابع معمولی میکردید
                            با اینم میتونید انجام بدید (فقط فرقش همون نداشتن اسمه)
                        </p>
                        <pre>
                            <code>
                                const anonymousFun = function() {
                                    console.log('من یه تابع ناشناسمممممم')
                                }
                                anonymousFun(); //من یه تابع ناشناسمممممم

                                /*
                                حواستون باشه که برای صدا زدن این تابع باید اسم متغیر رو به همراه پرانتز بنویسید
                                در واقع اسم متغیر یه جور اسم تابع به حساب میاد
                                */

                                // این زیرم یه مثال دیگه از تابع ناشناس میبینید
                                const square = function(n) {
                                    return n * n
                                }
                                console.log(square(2)) // -> 4
                            </code>
                        </pre>
                    </div>
            <h2 id="self-invoking-functions">تابع خود خوان (Self Invoking Functions)</h2>
                <div>
                    <p>
                        تا الان هرچی تابع یاد گرفتیم ، باید اول تعریفشون میکردیم و بعد به شکلی صداشون میزدیم تا برامون اجرا بشن ، ولی یه نوع تابع دیگه داریم که زمان تعریف صدا زده میشه ، یعنی دیگه نیاز ندارید بعدا صداش بزنید
                        و هر وقت تعریفش کردید همون لحظه اجرا میشه! برای توضیحات تکمیلی باید بگم این نوع تابع هم یه نوع تابع ناشناسه فقط یه خورده فرق داره!!!
                    </p>
                    <pre>
                        <code>
                            (function(پارامتر ها) {
                                // دستورات شما
                            })(آرگومان شما)
                            /*
                            شکل کلی این تابع به صورت بالا است ، اول یه پرانتز باز میکنید و داخلش یه تابع ناشناس تعریف میکنید
                            و بعد از بستن پرانتز یه پرانتز دیگه باز میکنید و داخل اون پرانتز آرگومان خودتون رو پاس میدید
                            این زیر چنتا مثال گذاشتم که هم با پارمترو ببنید و هم بدون پارامتر
                            */

                            (function () {
                                console.log('Salam')
                            })();
                            // تابع بالا دقیقا بعد از تعریف صدا زده میشه پس سلام رو چاپ میکنه

                            (function (n) {
                                console.log(n * n)
                            })(2);
                            // تابع بالا یه پارامتر به نام اِن داره و ما 2 رو بهش پاس دادیم و باعث میشه 4 چاپ بشه (دقیقا در زمان تعریف)

                            let squad = (function (n) {
                                return n * n ;
                            })(2);
                            // توجه کنید که اگه تابع ما مقدار بازگشتی داشته باشه ، باید حتما اونو توی متغیر ذخیره کنیم
                            // تا بتونیم بعدا از اون مقدار استفاده کنیم
                        </code>
                    </pre>
                </div>
            <h2 id="arrow-function">تابع پیکانی (Arrow Function)</h2>
                <div>
                    <p>
                        یه خورده بالاتر در مورد پارامتر های نامحدود توی تابع پیکانی صحبت کردیم ، حالا اینجا یکم خود تابع پیکانی رو بررسی میکنیم و چنتا
                        مثال خوشگل میزنیم تا درکش ساده تر بشه :
                        <br>
                        <b>
                            شما می توانید single parameter رو در arrow function به صورت زیر پاس بدید.گذاشتن پرانتز اختیاری است.
                        </b>
                    </p>
                    <pre>
                        <code>
                            let myFunction = (a) => a + 10
                            // بودو نبود پرانتز برای یه پارامتر فرقی نداره
                            let myFunction = a => a + 10

                            // صدا زدن این نوع تابع
                            console.log(myFunction(5)) // Print : 15
                        </code>
                    </pre>
                    <b>
                        مشابه تمامی توابع، arrow functions ها می توانند چندین پارامتر به عنوان آرگومان بگیرند.چون ما بیشتر از یک پارامتر رو به تابع پاس دادیم استفاده از پرانتز الزامیه!
                    </b>
                    <pre>
                        <code>
                            let myFunction = (a, b) => a + b
                            console.log(myFunction(5,7)) // Print : 12
                        </code>
                    </pre>
                    <b>
                        تا یادم نرفته اینم بگم که این تابع رو بدون پارامتر هم میشه نوشت ، اینجوری :
                    </b>
                    <pre>
                        <code>
                            let myFunction = () => 5 + 10
                            console.log(myFunction()) // Print : 15
                        </code>
                    </pre>
                    <b>
                        Arrow functions ها میتونن یک بدنه خیلی کوتاه تر داشته باشن بدون هیچ braces (آکولاد {}) یا اینکه بدنه اونها مشابه توابع معمولی باشه.
                        نکته تو اینه که اگه از آکولاد استفاده بشه، تابع به یک دستور return نیاز داره.
                        این زیر میتونید منظورمو بهتر بفهمید :
                    </b>
                    <pre>
                        <code>
                            // وقتی از آکولاد برای بدنه استفاده نمیکنید نیاز به دستور ریتِرن ندارید
                            let myFunction = a => a * 5

                            // وقتی از آکولاد استفاده میکنید حتما باید از ریتِرن استفاده کنید
                            let func = (a) => {
                                return a * 5;
                            }
                        </code>
                    </pre>
                    <b>
                        این نوع تعریف تابع با اینکه راحت تر و کوتاه تره ، یه مشکل اساسیش اینه که خوانایی کدمون رو میاره پایین و این باعث میشه
                        بعدا که به کدمون سر میزنیم یخورده سخت باشه فهمیدنش برای خودمون!
                    </b>
                    <pre>
                        <code>
                            const printFullName = (firstName, lastName) => `${firstName} ${lastName}`
                            // از روش بک تیک هم میتونید برای توابع استفاده کنید ، گفتم اینم بدونید
                            // الان توی تابع بالا ، تابع ما آرگومانی که بهش پاس داده میشه رو بهم وصل میکنه و بر میگردونه
                            console.log(printFullName('Amir', 'Roox'))
                        </code>
                    </pre>
                    <br>
                    <br>
                    <b>
                        این وسط یه نکته هم بگم که الان بهش برخوردم ، تابع ()console.clear تابعیه که براتون کنسول رو پاک میکنه ؛ گفتم شاید بدردتون بخوره!
                    </b>
                </div>
            <h2 id="function-with-default-parameters">توابع با پارمتر های پیشفرض</h2>
                <div>
                    <p>
                        حالا که همه نوع تابع رو توضیح دادیم ، یه نکته ریزی وجود داره که گذاشتم این آخر بگم ؛ شما میتونید برای پارامتراتون مقدار پیشفرض تعیین کنید ؛ اینجوری اگه یادتون رفت به تابعی که دوتا پارامتر داره
                        آرگومان پاس بدید باعث خطا نمیشه و میدونید که تابعتون داره درست کار میکنه؛ برای مقدار پیشفرض به پارامتر ها هم کار خاصی نباید کنید
                        فقط در زمان تعریف تابع توی قسمت پارامتر ها ، هر اسمی که برای پارامتر هاتون انتخاب کردید جلوش یه = بزارید و مقدار پیشفرضشو بهش بگید ، این زیر میتونید بهتر متوجه بشید :
                    </p>
                    <pre>
                        <code>
                            // syntax
                            function functionName(مقدار پیشفرض = پارامتر) {
                              //دستورات شما
                            }

                            // صدا زدن تابع به صورت با آرگومان و بدون آرگومان مشکلی ایجاد نمیکنه
                            functionName()
                            functionName(arg)
                        </code>
                    </pre>
                    <pre>
                        <code>
                            function greetings(name = 'Zahra') {
                                let message = `${name}, welcome to 30 Days Of JavaScript!`;
                                return message;
                            }
                            // صدا زدن بدون آرگومان
                            console.log(greetings()) // Print : "Zahra, welcome to 30 Days Of JavaScript!"
                            // صدا زدن با آرگومان
                            console.log(greetings('Amir')) // Print : "Amir, welcome to 30 Days Of JavaScript!"
                        </code>
                    </pre>
                    <pre>
                        <code>
                            // توجه کنید که میتونید همه پارامتراتون رو مقدار پیشفرض بدید
                            function generateFullName(firstName = 'Amir', lastName = 'Roox') {
                                let fullName = firstName + ' ' + lastName
                                return fullName
                            }

                            console.log(generateFullName())  // Print : Amir Roox
                            console.log(generateFullName('Zahra', 'Javadi'))  // Print : Zahra Javadi

                        </code>
                    </pre>
                    <b>
                        توجه داشته باشید خوشگلا! وقتی دارید از مقادیر پیشفرض استفاده میکنید و فقط میخواید به یه پارامتر از مثلا 3 پارامتر مقدار پیشفرض بدید
                        باید پارامتر آخر رو انتخاب کنید چون در غیر اینصورت وقتی به تابعتون 2 تا آرگومان پاس میدید آرگومان های شما جای مقادیر پیشفرض رو میگیرن
                        و اگه آخرین پارامتر مقدئار پیشفرض نداشته باشه بازم یه جای کار میلنگه ، مثال زیرم برای همین موضوع نوشتم :
                    </b>
                    <pre>
                        <code>
                            function name(firstName = "Amir" , lastName) {
                                console.log(firstName + ' ' + lastName)
                            }

                            name() // وقتی آرگومان پاس ندیم کلا دچار مشکل میشه چون پارامتر دوم مقدار پیشفرض نداره پس تعریف نشده میشه
                            // Print : Amir undefined

                            name('hadi') // وقتی یه آرگومان پاس بدید هم دچار مشکل میشه چون آرگومان شما جای پارامتر اول رو میگیره و پارامتر دوم بازم خالیه
                            // Print : hadi undefined

                            name('Hadith' , 'Ziba')  // فقط وقتی دو آرگومان بدید این تابع درست کار میکنه


                            // حالا فقط بیایم و جای پارامتر هارو عوض کنیم تا اخرین پارامتر پیشفرض دار بشه
                            function name(lastName , firstName = "Amir") {
                                console.log(firstName + ' ' + lastName)
                            }

                            name()  // این بازم مشکل داره چون بلخره تابع ما همه پارامترهاش پیشفرض نداره
                            // Print : Amir undefined

                            name('hadi')  // ولی ایندفعه با یه آرگومان کار میکنه چون آرگومان جای پارامتر اول قرار میگیره و دومی هم که پیشفرض داشت
                            // Print : Amir Hadi

                            name('Hadith' , 'Ziba')  // اینم که توی هردوتا کار میکنه

                            // پس این نکته ایی که الان گفتم یادتون نره
                        </code>
                    </pre>
                    <p>
                        بلخره امروزم تموم شد. ببخشید سرتونو درد اوردم نیاز بود همه این مواردو بگم ولی بازم یادتون باشه من هرچقدرم توضیح بدم و نکته بگم
                        بازم یچیزی جا میمونه ، چون توی برنامه نویسی همیشه باید آپدیت باشید و سرچ کنید تا از قافله جا نمونید. در هر صورت من تمام تلاشمو میکنم کامل توضیح بدم و چیزی جا نمونه
                        ولی شما هم به من دل خوش نکنید و چیزی رو خوب یاد نگرفتید سرچ کنید و اگرم چیزیو خوب یاد گرفتید باز سرچ کنید تا تمرینات و نمونه های بیشتری پیدا کنید.
                        <b>و همیشه باید بگم ، تمرینات این زیر فراموش نشه!</b>
                    </p>
                </div>
        <h1 id="-exercises">💻 تمرینات</h1>
            <h2 id="exercises-level-1">تمرینات: سطح 1</h2>
                <div>
                    <ol>
                        <li>یه تابع تعریف کنید که فقط اسمتون رو چاپ کنه</li>
                        <li>به همون تابع بالا سنتون رو هم اضافه کنید</li>
                        <li>حالا تابع بالا رو با پارامتر ایجاد کنید تا هرکسی با هر اسم و سنی که داره بیاد و چاپ بشه</li>
                        <li>همین تابع بالا رو به صورن ناشناس بنویسد</li>
                        <li>یه تابع دیگه ایجاد کنید تا 2 تا عدد رو ضرب هم کنه</li>
                        <li>تابع بالارو جوری تغییر بدید که 3 تا عدد رو ضرب هم کنه</li>
                        <li>به تابع بالا مقادیر پیشفرض هم بدید</li>
                        <li>تابعی بنویسد که محیط مربع رو حساب کنه</li>
                        <li>برای خودتون تابع های مختلف دیگه ایی بنویسید و حال کنید</li>
                    </ol>
                </div>
            <h2 id="exercises-level-2">تمرینات: سطح 2</h2>
                <div>
                    <ol>
                        <li>یکم میخوام کارتون رو سخت کنم ، پس تابعی بنوسید که بتونه معادله ax + c = 0 رو حل کنه (تابع باید دو تا پارامتر داشته باشه برای a و c)</li>
                        <li>حالا یکم سختتر! تابعی بنویسید که معادله درجه دوم رو حله کنه ax2 + bx + c = 0 (برای محاسبه میتونید سرچ بزنید و یاد بگیرید اگه نمیتونید)</li>
                        <li>یه تابع بنویسید که تاریخ تولدتون رو بهش پاس بدید و سنتون رو محاسبه کنه (برای محسابه سن تا امسال از توابع Date استفاده کنید)</li>
                        <li>تابع بالا رو به صورت تابع پیکانی و ناشناس هم بنویسید</li>
                        <li>حالا یکم پیشرفته ترش کنید و سنتون رو به ثانیه تبدیل کنید</li>
                        <li>یه تابع بنویسید با پارامتر های نامحدود که مجموع تمام آرگومان هارو محاسبه کنه</li>
                        <li>یه تابع بنویسید که دوتا پارامتر میگیره و اعداد زوج بینشون رو داخل یه آرایه ذخیره میکنه و اون آرایه رو برمیگردونه</li>
                    </ol>
                </div>
            <h2 id="exercises-level-3">تمرینات: سطح 3</h2>
                <div>
                    <ol>
                        <li>
                            تابعی بنویسید که دوتا پارامتر داشته باشه و اعداد رندوم بین همون اعداد رو براتون چاپ کنه.
                            <br>
                            (
                            <a href="javascript:void(0)" onclick="alert('function randomIntFromInterval(min, max) { return  (Math.random() * (max - min + 1) + min) }')">اگه فک کردید و به جواب نرسیدید این راهنما رو نگاه کنید</a>
                            )
                        </li>
                        <li>تابعی بنویسید که 2 تاعدد رو باهم جمع کنه ولی آرگومان هاش رو از کاربر بگیره (دستور prompt)</li>
                        <li>
                            بقیه تمرینات رو میزارم به پای خودتون! سعی کنید چیزایی برای خودتون خلق کنید و برای خودتون تمرین بسازید
                            به یه ایده فکر کنید و سعی کنید عملیش کنید. فعلا خودافزززز.
                        </li>
                    </ol>
                </div>
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