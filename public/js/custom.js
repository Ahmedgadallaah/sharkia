//function renderTime(){
//    var mydate = new Date();
//    var year = mydate.getYear();
//       if(year < 1000){
//           year +=1900
//       }
//    var day = mydate.getDay();
//    var month = mydate.getMonth();
//    var daym = mydate.getDate();
//    var dayarray = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
//    var montharray = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//    //DATE END
//    
//    var currentTime = new Data();
//    var h = currentTime.getHours();
//    var m = currentTime.getMinutes();
//    var s = currentTime.getSeconds();
//         if(h == 24){
//             h = 0;
//         } else if(h = 12){
//             h = h - 0;
//         }
//    
//         if(h < 10){
//             h = "0" + h;
//         }
//    
//         if(m < 10){
//             m = "0" + m;
//         }
//    
//         if(s < 10){
//             m = "0" + s;
//         }
//    
//    var myClock = document.getElementById("clockDisplay");
//    myClock.textContent = "" +dayarray[day]+ " " +daym+ " " +montharray[month]+ " " +year+ " | " +h+ ":" +m+ ":" +s; 
//    myClock.innerText = "" +dayarray[day]+ " " +daym+ " " +montharray[month]+ " " +year+ " | " +h+ ":" +m+ ":" +s;
//    
//    setTimeout("renderTime()", 1000);
//}
//renderTime();

// TYPER WRITER SHARKIA
var i=1;
   function type(){
      var message = "مرحبا بكم فى أرض الخير";
       //خدمات إلكترونية - تفاعلية - إخبارية - تعليمية
      if(i<=message.length){
          var text=message.substring(0,i);
          document.getElementById('type').innerHTML=text;
          setTimeout("type()",120);
          i++;
      }
//      else{
//          i = 1;
//          document.getElementById('type').innerHTML="";
//          setTimeout("type()",100);
//      }
  };
   type();

// GALLARY NE
 var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      autoplay:true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 40,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
    