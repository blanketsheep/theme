(function() {
  (function($) {
    return $(function() {
      return (function() {
        var consts, locals, onResize, onScroll;
        locals = {
          mainPosition: null
        };
        consts = {
          attr: {
            scrollTop: 'data-scroll-top',
            showHeader: 'data-show-header'
          }
        };
        onResize = function() {
          var elm;
          elm = $('.layout_main_position');
          if ($(elm).size() < 1) {
            return locals.mainPosition = 0;
          } else {
            return locals.mainPosition = $(elm).eq(0).offset().top;
          }
        };
        onScroll = function() {
          var body, header, headerHeight, position;
          position = $(window).scrollTop();
          body = $('body').eq(0);
          header = $('#header');
          headerHeight = parseInt($(header).height());
          if ((locals.mainPosition - headerHeight) <= position) {
            return $(body).attr(consts.attr.showHeader, consts.attr.showHeader);
          } else {
            return $(body).removeAttr(consts.attr.showHeader);
          }
        };
        $(window).on('scroll', onScroll);
        $(window).on('resize', onResize);
        onResize();
        return onScroll();
      })();
    });
  })(jQuery);

}).call(this);
