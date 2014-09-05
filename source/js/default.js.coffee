(($) ->
  $ ->
    (() ->
      locals =
        mainPosition: null
      consts =
        attr:
          scrollTop:  'data-scroll-top'
          showHeader: 'data-show-header'
      (() ->
        elm = $('.layout_main_position')
        if $(elm).size() < 1
          locals.mainPosition = 0
        else
          locals.mainPosition = $(elm).eq(0).offset().top
      )()
      onScroll = ->
        position = $(window).scrollTop()
        body = $('body').eq(0)
        header = $('#header')
        
        headerHeight = parseInt $(header).height()
        
        if (locals.mainPosition - headerHeight) <= position
          $(body).attr consts.attr.showHeader, consts.attr.showHeader
        else
          $(body).removeAttr consts.attr.showHeader
      
      $(window).on 'scroll', onScroll
      onScroll()
    )()
)(jQuery)