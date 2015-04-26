###!
  # Responsive Celendar widget script
  # by w3widgets
  #
  # Author: Lukasz Kokoszkiewicz
  #
  # Copyright © w3widgets 2013 All Rights Reserved
###

do ($ = jQuery) ->
  "use strict"
  Calendar = ( element, options ) ->
    @$element = element
    @options = options
    @weekDays = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun']

    @time = new Date()

    @currentYear = @time.getFullYear()
    @currentMonth = @time.getMonth()

    if @options.time
      time = @splitDateString( @options.time )
      @currentYear = time.year
      @currentMonth = time.month

    # Do the initial draw
    @initialDraw()

    null

  Calendar.prototype =
    addLeadingZero: (num) ->
      (if num < 10 then "0" + num else "" + num)

    applyTransition: ( $el, transition ) ->
      $el.css 'transition', transition
      $el.css '-ms-transition', '-ms-' + transition
      $el.css '-moz-transition', '-moz-' + transition
      $el.css '-webkit-transition', '-webkit-' + transition

    applyBackfaceVisibility: ( $el ) ->
      $el.css 'backface-visibility', 'hidden'
      $el.css '-ms-backface-visibility', 'hidden'
      $el.css '-moz-backface-visibility', 'hidden'
      $el.css '-webkit-backface-visibility', 'hidden'

    applyTransform: ( $el, transform ) ->
      $el.css 'transform', transform
      $el.css '-ms-transform', transform
      $el.css '-moz-transform', transform
      $el.css '-webkit-transform', transform

    splitDateString: ( dateString ) ->
      time = dateString.split( '-' )
      year = parseInt time[0]
      month = parseInt time[1] - 1
      day = parseInt time[2]

      time =
        year: year
        month: month
        day: day

    initialDraw: () ->
      @drawDays @currentYear, @currentMonth

    editDays: ( events ) ->
      for dateString, dayEvents of events
        @options.events[ dateString ] = events[ dateString ]
        time = @splitDateString( dateString )
        day = @$element.find( '[data-year="' + time.year + '"][data-month="' + ( time.month + 1 ) + '"][data-day="' + time.day + '"]' ).parent( '.day' )
        day.removeClass( 'active' )
        day.find( '.badge' ).remove()
        day.find( 'a' ).removeAttr( 'href' )
        @makeActive( day, dayEvents ) if this.currentMonth == time.month || this.options.activateNonCurrentMonths

    clearDays: ( days ) ->
      for dateString in days
        delete @options.events[ dateString ]
        time = @splitDateString( dateString )
        day = @$element.find( '[data-year="' + time.year + '"][data-month="' + ( time.month + 1 ) + '"][data-day="' + time.day + '"]' ).parent( '.day' )
        day.removeClass( 'active' )
        day.find( '.badge' ).remove()
        day.find( 'a' ).removeAttr( 'href' )

    clearAll: () ->
      @options.events = {}
      days = @$element.find('[data-group="days"] .day')
      for day, i in days
        $(day).removeClass( 'active' )
        $(day).find( '.badge' ).remove()
        $(day).find( 'a' ).removeAttr( 'href' )

    setMonth: ( dateString ) ->
      time = @splitDateString( dateString )
      @currentMonth = @drawDays( time.year, time.month )

    prev: () ->
      if @currentMonth - 1 < 0
        @currentYear = @currentYear - 1
        @currentMonth = 11
      else
        @currentMonth = @currentMonth - 1
      @drawDays @currentYear, @currentMonth
      # callback function
      if @options.onMonthChange
        @options.onMonthChange.call @
      null

    next: () ->
      if @currentMonth + 1 > 11
        @currentYear = @currentYear + 1
        @currentMonth = 0
      else
        @currentMonth = @currentMonth + 1
      @drawDays @currentYear, @currentMonth
      # callback function
      if @options.onMonthChange
        @options.onMonthChange.call @
      null

    curr: () ->
      @currentYear = @time.getFullYear()
      @currentMonth = @time.getMonth()
      @drawDays @currentYear, @currentMonth
      # callback function
      if @options.onMonthChange
        @options.onMonthChange.call @
      null

    addOthers: ( day, dayEvents ) ->
      # if events word is an object (array)
      # create badge with the number of events
      if typeof dayEvents is "object"
        # add badge
        if dayEvents.number?
          badge = $("<span></span>").html(dayEvents.number).addClass("badge")

          if dayEvents.badgeClass?
            badge.addClass(dayEvents.badgeClass)

          day.append badge

        # add url
        if dayEvents.url
          day.find("a").attr "href", dayEvents.url

      day

    makeActive: ( day, dayEvents ) ->
      # if event exists for the given day ...
      if dayEvents
        # ... add class `active`
        if dayEvents.class
          classes = dayEvents.class.split " "
          day.addClass eventClass for eventClass, i in classes 
        else
          day.addClass "active"
        
        # add badge
        day = @addOthers day, dayEvents
        
      day

    getDaysInMonth: ( year, month ) ->
      new Date(year, month + 1, 0).getDate();

    drawDay: ( lastDayOfMonth, yearNum, monthNum, dayNum, i ) ->
      day = $("<div></div>").addClass("day")
      dateNow = new Date()
      dateNow.setHours( 0, 0, 0, 0 )
      dayDate = new Date(yearNum, monthNum - 1, dayNum)

      if dayDate.getTime() < dateNow.getTime()
        pastFutureClass = "past"
      else if dayDate.getTime() == dateNow.getTime()
        pastFutureClass = "today"
      else
        pastFutureClass = "future"

      day.addClass( @weekDays[ i % 7 ] )
      day.addClass( pastFutureClass )
      
      dateString = yearNum + "-" + @addLeadingZero(monthNum) + "-" + @addLeadingZero(dayNum)
      
      # starts drawing days from the appropriate day of the week 
      if dayNum <= 0 or dayNum > lastDayOfMonth
        calcDate = new Date(yearNum, monthNum - 1, dayNum)
        dayNum = calcDate.getDate()
        monthNum = calcDate.getMonth() + 1
        yearNum = calcDate.getFullYear()

        day.addClass("not-current")
          .addClass(pastFutureClass)

        if @options.activateNonCurrentMonths
          # create date string to access `events` options dictionary
          dateString = yearNum + "-" + @addLeadingZero(monthNum) + "-" + @addLeadingZero(dayNum)
      
      day.append $("<a>" + dayNum + "</a>")
        .attr("data-day", dayNum)
        .attr("data-month", monthNum)
        .attr("data-year", yearNum)

      if @options.monthChangeAnimation
        @applyTransform day, 'rotateY(180deg)'
        @applyBackfaceVisibility day
      
      # make active if event for a day exists
      day = @makeActive( day, @options.events[ dateString ] )

      @$element.find('[data-group="days"]').append day

    drawDays: (year, month) ->
      thisRef = @
      # set initial time parameters
      time = new Date(year, month)
      currentMonth = time.getMonth() # count from 0
      monthNum = time.getMonth() + 1 # count from 1
      yearNum = time.getFullYear()
      
      # get week day for the first day of the current month
      time.setDate 1
      firstDayOfMonth = if @options.startFromSunday then (time.getDay() + 1) else ( time.getDay() || 7 ) # sunday fix
      
      # get week day for the last day of the current month
      lastDayOfMonth = @getDaysInMonth year, month
      
      # out animation
      timeout = 0
      if @options.monthChangeAnimation
        days = @$element.find('[data-group="days"] .day')
        for day, i in days
          delay = i * 0.01

          @applyTransition $(day), 'transform .5s ease ' + delay + 's'
          @applyTransform $(day), 'rotateY(180deg)'
          @applyBackfaceVisibility $(day)
          timeout = (delay + 0.1) * 1000

      dayBase = 2

      # celculate loop base / number of possible calendar day cells
      if @options.allRows
        loopBase = 42
      else
        multiplier = Math.ceil( ( firstDayOfMonth - ( dayBase - 1 ) + lastDayOfMonth ) / 7 )
        loopBase = multiplier * 7

      #@$element.find(".timeInfo").html time.getFullYear() + " " + @options.translateMonths[time.getMonth()]
      @$element.find("[data-head-year]").html time.getFullYear()
      @$element.find("[data-head-month]").html @options.translateMonths[time.getMonth()]
      
      draw = () ->
        thisRef.$element.find('[data-group="days"]').empty()
        # fill callendar
        dayNum =  dayBase - firstDayOfMonth
        i = if thisRef.options.startFromSunday then 0 else 1
        while dayNum < loopBase - firstDayOfMonth + dayBase
          thisRef.drawDay lastDayOfMonth, yearNum, monthNum, dayNum, i
          dayNum = dayNum + 1
          i = i + 1
        
        setEvents = () ->
          days = thisRef.$element.find('[data-group="days"] .day')
          for day, i in days
            thisRef.applyTransition $(day), 'transform .5s ease ' + ( i * 0.01 ) + 's'
            thisRef.applyTransform $(day), 'rotateY(0deg)'

          if thisRef.options.onDayClick
            thisRef.$element.find('[data-group="days"] .day a').click ->
              thisRef.options.onDayClick.call this, thisRef.options.events

          if thisRef.options.onDayHover
            thisRef.$element.find('[data-group="days"] .day a').hover ->
              thisRef.options.onDayHover.call this, thisRef.options.events

          if thisRef.options.onActiveDayClick
            thisRef.$element.find('[data-group="days"] .day.active a').click ->
              thisRef.options.onActiveDayClick.call this, thisRef.options.events

          if thisRef.options.onActiveDayHover
            thisRef.$element.find('[data-group="days"] .day.active a').hover ->
              thisRef.options.onActiveDayHover.call this, thisRef.options.events

        setTimeout setEvents, 0


      setTimeout( draw, timeout )

      currentMonth

  $.fn.responsiveCalendar = ( option, params ) ->
    options = $.extend {}, $.fn.responsiveCalendar.defaults, typeof option == 'object' && option

    publicFunc =
      next: 'next'
      prev: 'prev'
      edit: 'editDays'
      clear: 'clearDays'
      clearAll: 'clearAll'
      getYearMonth: 'getYearMonth'
      jump: 'jump'
      curr: 'curr'
    
    init = ( $this ) ->
      # support for metadata plugin
      options = if $.metadata then $.extend( {}, options, $this.metadata() ) else options
      
      $this.data 'calendar', ( data = new Calendar $this, options )
      
      # call onInit function
      if options.onInit
        options.onInit.call data

      # create events for manual month change
      $this.find("[data-go]").click ->
        if $(this).data("go") is "prev"
          data.prev()
        if $(this).data("go") is "next"
          data.next()
        
    @each ->
      $this = $(this)
      
      # create "calendar" data variable
      data = $this.data 'calendar'
      
      # create calendar object on init
      if !data
        init $this
      else if typeof option == 'string'
        if publicFunc[option]?
          data[ publicFunc[option] ]( params )
        else
          data.setMonth( option ) # sets month to display, format "YYYY-MM"
      else if typeof option == 'number'
        data.jump Math.abs( option ) + 1

      null
      
  # plugin defaults - added as a property on our plugin function
  $.fn.responsiveCalendar.defaults =
    translateMonths: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    events: {}
    time: undefined # string - example: "2013-04"
    allRows: true
    startFromSunday: false
    activateNonCurrentMonths: false
    monthChangeAnimation: true

    # callback functions
    onInit: undefined
    onDayClick: undefined
    onDayHover: undefined
    onActiveDayClick: undefined
    onActiveDayHover: undefined
    onMonthChange: undefined

  spy = $('[data-spy="responsive-calendar"]')

  if ( spy.length )
    opts = {}
    if (spy.data 'translate-months')? then opts.translateMonths = spy.data( 'translate-months' ).split ','
    #if (spy.data 'events')? then opts.events = spy.data 'events'
    if (spy.data 'time')? then opts.time = spy.data 'time'
    if (spy.data 'all-rows')? then opts.allRows = spy.data 'all-rows'
    if (spy.data 'start-from-sunday')? then opts.startFromSunday = spy.data 'start-from-sunday'
    if (spy.data 'activate-non-current-months')? then opts.activateNonCurrentMonths = spy.data 'activate-non-current-months'
    if (spy.data 'month-change-animation')? then opts.monthChangeAnimation = spy.data 'month-change-animation'
    
    spy.responsiveCalendar( opts )
