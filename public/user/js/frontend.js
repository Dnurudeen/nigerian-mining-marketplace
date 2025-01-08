$(function() {
  $(".nav_opener").on("click", function(e) {
    $("body").toggleClass("nav_area_active");
    e.stopPropagation()
  });
  $("html").click(function(e) {
    if ($(e.target).closest('.main_nav_hold').length == 0)
      $("body").removeClass('nav_area_active');
  });

});


	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

    var swiper = new Swiper(".goldSlider", {
        slidesPerView: 1,
        spaceBetween: 60,
        loop: true,
     
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      $(".custom-pagination").on('click', 'li', function () {
        $(".custom-pagination li.active").removeClass("active");
        // adding classname 'active' to current click li 
        $(this).addClass("active");
    });





$(function() {
    $(".hamburger").on("click", function(e) {
        $("body").toggleClass("hamburger_active");
        e.stopPropagation()
    });
    $("html").click(function(e) {
        if ($(e.target).closest('.nav-right').length == 0)
        $("body").removeClass('hamburger_active');
    });

});

$(document).ready(function() {
  $(".drop-icon").click(function () {
      if(!$(this).hasClass('active'))
      {
          $(".drop-icon.active").removeClass("active");
          $(this).addClass("active");        
      }
  });
});
$("html").click(function(e) {
          if ($(e.target).closest('.nav_link').length == 0)
          $(".drop-icon").removeClass('active');
      });

$('.toggle').click(function(e) {
    e.preventDefault();
    $('.toggle').removeClass('cross-icon')
    if(!$(this).next().hasClass('show')){
        $(this).addClass('cross-icon');
    }
  let $this = $(this);
  if ($this.next().hasClass('show')) {
      $this.next().removeClass('show');
      $this.next().slideUp(350);
  } else {
      $this.parent().parent().find('li .inner').removeClass('show');
      $this.parent().parent().find('li .inner').slideUp(350);
      $this.next().toggleClass('show');
      $this.next().slideToggle(350);
  }
});

