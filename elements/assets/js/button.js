jQuery(function($) {
    $(".dndee-button").draggable({
        start: function(event, ui) {

        },
        drag: function(event, ui) {

        },
        stop: function(event, ui) {
            var snapped = $(this).data('ui-draggable').snapElements;
            var snappedTo = $.map(snapped, function(element) {
                return element.snapping ? element.item : null;
            });

            if (snappedTo != null) {
                $(snappedTo).html($('.dndee-button.ui-draggable.ui-draggable-handle')[0].outerHTML);
            }
        },
        snap: ".dndee-table-td",
        opacity: 0.9,
        helper: "clone"
    });
});
