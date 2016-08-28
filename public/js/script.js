(function($)
{

  $(document).ready(function()
  {

    var menu = $('header');
    var heightBanner = $('.home-b').height() - 50;

    $(window).scroll(function()
    {
      var scrollOffsetTop = $(window).scrollTop();
      if(scrollOffsetTop >= heightBanner){
        $('header').css('background-color', '#1a8c8e');
        $('header').css('transition', '0.5s');
      } else if (scrollOffsetTop < heightBanner) {
        $('header').css('background-color', 'transparent');
        $('header').css('transition', '0.5s');
      }
    });

  });
})(jQuery);
