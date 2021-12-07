$(".collapsible").click(function () {

    $collapsible = $(this);
    $arrow = $(".fas");

    $content = $collapsible.next();

    $content.slideToggle(500, function () {

        

            if ($content.is(":visible"))
            {
                $arrow.addClass("fa-chevron-up");
                $arrow.removeClass("fa-chevron-down").addClass("fa-chevron-up");
            }
            else
            {
                $arrow.addClass("fa-chevron-down");
                $arrow.removeClass("fa-chevron-up");
            }
    });

});