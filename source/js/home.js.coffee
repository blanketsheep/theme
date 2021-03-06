(($) ->
  $ ->
    container = $('#home_slide_items')
    items     = $('#home_slide_items .slide_item')
    refresh_elms = ->
      container = $(container.selector)
      items     = $(items.selector)
    slideVars =
      isInited:   false
      isFirstRun: true
    consts = 
      queueName:  'slide'
      attr:
        isFirst: 'data-is-first'
        itemKey: 'data-item-key'
        isVisible: 'data-is-visible'
    
    onInterval = () ->
      refresh_elms()
      
      if !slideVars.isInited
        slideVars.isInited = true
        $(container).attr 'data-item-length', $(items).size()
        $(items).each (key, item) ->
          $(item).attr consts.attr.itemKey, key
          $(item).removeAttr consts.attr.isVisible
      
      local =
        keys:
          next: -1
          prev: -1
        elms:
          prev: null
          next: null
        slctr:
          prev: null
          next: ''
      
      local.elms.prev = $(items).filter '[data-is-visible]'
      
      if $(local.elms.prev).size() < 1
        local.keys.prev = 0
        local.keys.next = 1
        $(container).attr consts.attr.isFirst, consts.attr.isFirst
        slideVars.isFirstRun = true
      else
        local.keys.prev = parseInt $(local.elms.prev).attr consts.attr.itemKey
        local.keys.next = local.keys.prev + 1
        if $(items).filter('['+consts.attr.itemKey+'="'+local.keys.next+'"]').size() < 1
          local.keys.next = 0
        $(container).removeAttr consts.attr.isFirst
        slideVars.isFirstRun = false
      
      local.slctr.prev = '['+consts.attr.itemKey+'="'+local.keys.prev+'"]'
      local.slctr.next = '['+consts.attr.itemKey+'="'+local.keys.next+'"]'
      
      $(container).queue consts.queueName, ->
        move = null
        if slideVars.isFirstRun
          move = $(items).filter local.slctr.prev
        else
          move = $(items).filter local.slctr.next
        $(move).attr consts.attr.isVisible, consts.attr.isVisible
        $(@).dequeue consts.queueName
      
      $(container).queue consts.queueName, ->
        move = null
        if slideVars.isFirstRun
          move = $(items).not local.slctr.prev
        else
          move = $(items).not local.slctr.next
        $(move).removeAttr consts.attr.isVisible
        $(@).dequeue consts.queueName
      $(container).dequeue consts.queueName
      
      setTimeout onInterval,10000
    
    if $(container).size() > 0
      setTimeout onInterval, 1000
)(jQuery)