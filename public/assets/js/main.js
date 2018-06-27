if(document.querySelector('.homepage')){
  $(".carousel").swipe({

    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

      if (direction == 'left') $(this).carousel('next');
      if (direction == 'right') $(this).carousel('prev');

    },
    allowPageScroll:"vertical"

  });
}

if(document.querySelector('.dashboard')){  
  function include(fileName){
    document.write("<script type='text/javascript' src='"+fileName+"'></script>" );
  }
  
  include('/assets/js/lib/jquery/jquery.min.js');
  include('/assets/js/jquery.slimscroll.js');
  include('/assets/js/sidebarmenu.js');
  include('/assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js');
  include('/assets/js/lib/morris-chart/raphael-min.js');
  include('/assets/js/lib/morris-chart/morris.js');
  include('/assets/js/lib/morris-chart/dashboard1-init.js');
  include('/assets/js/lib/calendar-2/moment.latest.min.js');
  include('/assets/js/lib/calendar-2/semantic.ui.min.js');
  include('/assets/js/lib/calendar-2/prism.min.js');
  include('/assets/js/lib/calendar-2/pignose.calendar.min.js');
  include('/assets/js/lib/calendar-2/pignose.init.js');
  include('/assets/js/lib/owl-carousel/owl.carousel.min.js');
  include('/assets/js/lib/owl-carousel/owl.carousel-init.js');
  include('/assets/js/scripts.js');
}