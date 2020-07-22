@extends('index')
@section('content')

<div class="banner-show desesrt-bg">
    <h2>السياحة الصحراوية</h2>
    <div>
        <p><a href="index.html"> الرئيسية </a> &#124; <a href="#"> السياحة </a> &#124; <a href="desert-tourism.html">السياحة الصحراوية</a> </p>
    </div>
</div>
@include('layouts.mission')

<!-- ************************************************************************* -->
<div class="sh-rows-info">
    <div class="container">
      <div class="text-center upper-show">
         <h4>{{$desert->name}}</h4>
      </div>
       <div class="row">
           <div class="col-md-12">
               {{$desert->description}}
               {{-- <p>عرفت هذه الرياضة منذ اكثر من ثلاثة الاف سنة وتمتد اصولها فى التراث العربى وكانت قديما تمثل للعرب عبر الصحارى احدى الوسائل الحيوية لتأمين الغذاء لهم فى الرحلات الطويلة. وتعد فنون الصيد بالصقور من ارقى الهوايات التى يمارسها الجميع وتزدهر فى الصحراء. وتشتهر قرية سعود الحسينية بتربية وصيد الصقور وانواعها:-</p>
               <h6>الصقر الحر:</h6>
               <p>أنواع الصقر الحر كثيرة وصعب تعدادها، والصقر الحر من أكبر الصقريات وهو أكبر من الصقر الوكري تقريبا بحجم صقر الجير فيبلغ طوله من 47سم- إلى -57سم ويصل طول جناحه حوالي متر ونصف ومساحة جناحه كمساحة جناح الصقر الجير. وإناث الحر أكبر حجما من الذكر بحيث يصل طول الاناث إلى 16 أنش وطول الذكور من صقور الحر إلى 14، وتضع أنثى الحر من 3 إلى 6 بيضات وتكون هذه فراخ هذه البيضات على نحو متدرج فيخرج منها النادر واللزيز والتبع والمحقور.</p>
               <h6> الصقر شاهين</h6>
               <p>يُعد الشاهين بالنسبة إلى الكثيرين ذروة الكواسر المفترسة - صقر متين البنيان، سريع الطيران، يفتك بفريسته بشكل نمطيّ في انقضاضه مدهشة تثير الإعجاب (تُسمى أحيانا بقطرة الدمع نظرا لأن شكل الطائر وهو يهبط على فريسته يبدو وكأنه نقطة دمع) من ارتفاع شاهق في أغلب الحالات وهذا ما أدى إلى تعرّض الشاهين للاضطهاد منذ زمن طويل من قبل هواة الصيد الذين كانوا في بادئ الأمر يجمعون بيوض الطيور البرية لتفقس عندهم ومن ثم يقومون بتربية الفرخ إلى أن يشتد عوده ويصبح قادرا على الصيد حيث يقومون بتدريبه لفترة معينة إلى أن يعتاد الاستجابة لمعاني حركات الإنسان ومن ثم يُستخدم في الصيد، إلا أنه مؤخرا أصبحت الطيور تُربى في الأسر وتزوّج انتقائيّا لإنتاج سلالات صيّادة أفضل. وبالإضافة إلى ذلك، كان الشاهين ولا يزال في بعض المناطق، يُضطهد من قبل حرّاس الطرائد الذين يُحاولون التقليص من أعداده أحيانا بما أنه يفتك بالكثير من الطيور التي يُدخلها البشر لتشجيع رياضة الصيد، كما يُحاول البعض من مُربي الحمام تقليص أعداد هذه الصقور في المنطقة التي يربون فيها طيورهم، بما أن الحمام واليمام من الطيور الأثيرة للشاهين أنّى وجدت في موطنه. يُعد الشاهين أسرع الطيور حركة في العالم، إذ أنه في الانقضاض قد يحقق 180 كيلومترا في الساعة (112 ميلا في الساعة).</p> --}}
           </div>
       </div>
    </div>
</div>
@endsection