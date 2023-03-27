$(document).ready(function(){
    $(".testimonial .indicators li").click(function(){
      var i = $(this).index();
      var targetElement = $(".testimonial .tabs li");
      targetElement.eq(i).addClass('active');
      targetElement.not(targetElement[i]).removeClass('active');
              });
              $(".testimonial .tabs li").click(function(){
                  var targetElement = $(".testimonial .tabs li");
                  targetElement.addClass('active');
                  targetElement.not($(this)).removeClass('active');
              });
          });
  $(document).ready(function(){
      $(".slider .swiper-pagination span").each(function(i){
          $(this).text(i+1).prepend("0");
      });
  });
  document.onreadystatechange = function() {
    let lastScrollPosition = 0;
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function(e) {
      lastScrollPosition = window.scrollY;
      
      if (lastScrollPosition > 100)
        navbar.classList.add('navbar-dark');
      else
        navbar.classList.remove('navbar-dark');
    });
  }