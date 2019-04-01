$(function () {
    // start the ticker 
    $('#sg_news').ticker();
    // hide the release history when the page loads
    $('#release-wrapper').css('margin-top', '-' + ($('#release-wrapper').height() + 20) + 'px');
    // show/hide the release history on click
    $('a[href="#release-history"]').toggle(function () {
        $('#release-wrapper').animate({
            marginTop: '0px'
        }, 600, 'linear');
    }, function () {
        $('#release-wrapper').animate({
            marginTop: '-' + ($('#release-wrapper').height() + 20) + 'px'
        }, 600, 'linear');
    });
    $('#download a').mousedown(function () {
        _gaq.push(['_trackEvent', 'download-button', 'clicked'])
    });
});

	
$(function () {
    // This filter is later used as the selector for which grid items to show.
    var filter = '';
    var handler;

    // Prepare layout options.
    var options = {
        autoResize: false, // This will auto-update the layout when the browser window is resized.
        container: $('#main'), // Optional, used for some extra CSS styling
        offset: 0, // Optional, the distance between grid items
        itemWidth: 225 // Optional, the width of a grid item
    };

    // This function filters the grid when a change is made.
    var refresh = function () {
        // Clear our previous handler.
        if (handler) {
            handler.wookmarkClear();
            handler = null;
        }

        // This hides all grid items ("inactive" is a CSS class that sets opacity to 0).
        $('#tiles li').addClass('inactive');

        // Create a new layout selector with our filter.
        handler = $(filter);

        // This shows the items we want visible.
        handler.removeClass("inactive");

        // This updates the layout.
        handler.wookmark(options);
    }

    /**
    * This function checks all filter options to see which ones are active.
    * If they have changed, it also calls a refresh (see above).
    */
    var updateFilters = function () {
        var oldFilter = filter;
        filter = '';
        var filters = [];

        // Collect filter list.
        var lis = $('#filters li');
        var i = 0, length = lis.length, li;
        for (; i < length; i++) {
            li = $(lis[i]);
            if (li.hasClass('active')) {
                filters.push('#tiles li.' + li.attr('data-filter'));
            }
        }

        // If no filters active, set default to show all.
        if (filters.length == 0) {
            filters.push('#tiles li');
        }

        // Finalize our filter selector for jQuery.
        filter = filters.join(', ');

        // If the filter has changed, update the layout.
        if (oldFilter != filter) {
            refresh();
        }
    };

    /**
    * When a filter is clicked, toggle it's active state and refresh.
    */
    var onClickFilter = function (event) {
        var item = $(event.currentTarget);
        item.toggleClass('active');
        updateFilters();
    }

    // Capture filter click events.
    $('#filters li').click(onClickFilter);

    // Do initial update (shows all items).
    updateFilters();

});
