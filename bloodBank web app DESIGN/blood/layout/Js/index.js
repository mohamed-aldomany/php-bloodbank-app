/*global $,document ,WOW,window*/

$(document).ready(function () {
    'use strict';

    var mySlider = $(".bxslider");
    //bx slider
    mySlider.bxSlider({
        pager: false
    });

    $(".fa-bars").click(function () {
        $("nav").slideToggle(500);
    });

    //sign in & log in tap
    $("#my-tabs li").click(function () {
        var myID = $(this).attr("id");
        $(this).removeClass("inactive").siblings().addClass("inactive");
        $(".forms .ok").hide();
        $("#" + myID + "-content").fadeIn("1000");
    });

    $("#type-buttons li").click(function () {
        var myID2 = $(this).attr("id");
        $(this).removeClass("inactive2").siblings().addClass("inactive2");
        $(".g-h-container .ok2").hide();
        $("#" + myID2 + "-content2").fadeIn();
    });
    //nice scroll
    $("html").niceScroll({

        cursorcolor: "#D83841",
        cursorwidth: "10px",
        cursorborder: "1px solid #D83841",
        cursorborderradius: "3px",
        horizrailenabled: false
    });
    //go to join us
    $(".joinus-linknav").click(function () {
        $("html,body").animate({
            scrollTop: $("#section4").offset().top + 60
        }, 1000);
    });
    //go to contact
    $(".contact-linknav").click(function () {
        $("html,body").animate({
            scrollTop: $("#section5").offset().top + 60
        }, 1000);
    });

    $("#scroll-top").hide();
    // fade in #back-top
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#scroll-top i').click(function () {
            $("html,body").animate({
                scrollTop: $("#top").offset().top
            }, 1000);
        });
    });

    //start type
    //    $(".typed").typed({
    //        strings: ["YOU DON'T HAVE MERCY IN EXAM.", "WE DON'T HAVE MERCY IN HACK.", "YOU HAVE BEEN HACKED."],
    //        typeSpeed: 50,
    //        startDelay: 2800,
    //        backDelay: 500,
    //        loop: true,
    //        smartBackspace: true,
    //        showCursor: false
    //    });
    $(".type").typed({
        strings: ["Donate Now .", "Safe The World."],
        typeSpeed: 50,
        startDelay: 2800,
        backDelay: 200,
        loop: true,
        smartBackspace: true,
        showCursor: false
    });


    /* Admin Page */
    /*global $,document */

    $("#my-tabs-admin li").click(function () {
        var myID = $(this).attr("id");
        $(this).removeClass("inactive3").siblings().addClass("inactive3");
        $(".admin-tables .admin-table").hide();
        $("#" + myID + "-content3").fadeIn("1000");
    });


    $(".edit-button-message").click(function () {
        $(".admin-edit1").show(1000);
    });
    $(".message-button-save").click(function () {
        $(".admin-edit1").hide();
    });

    $(".edit-button-donor").click(function () {
        $(".admin-edit2").show(1000);
    });
    $(".donor-button-save").click(function () {
        $(".admin-edit2").hide();
    });

    $(".edit-button-institution").click(function () {
        $(".admin-edit3").show(1000);
    });
    $(".institution-button-save").click(function () {
        $(".admin-edit3").hide();
    });



    /* end admin */


});

new WOW().init();

/*loading*/
$(window).on('load', function () {

    "use strict";
    $("body").css("overflow", "auto");


    $(".loading-overlay .spinner").fadeOut(3000, function () {

        $(this).parent().fadeOut(2000, function () {

            $(this).remove();
        });

    });
});


/* Admin Page */
/*global $,document */
$(document).ready(function () {
    'use strict';
    $("#my-tabs-admin li").click(function () {
        var myID = $(this).attr("id");
        $(this).removeClass("inactive3").siblings().addClass("inactive3");
        $(".admin-tables .admin-table").hide();
        $("#" + myID + "-content3").fadeIn("1000");
    });


    $(".edit-button-message").click(function () {
        $(".admin-edit1").show(1000);
    });
    $(".message-button-save").click(function () {
        $(".admin-edit1").hide();
    });

    $(".edit-button-donor").click(function () {
        $(".admin-edit2").show(1000);
    });
    $(".donor-button-save").click(function () {
        $(".admin-edit2").hide();
    });

    $(".edit-button-institution").click(function () {
        $(".admin-edit3").show(1000);
    });
    $(".institution-button-save").click(function () {
        $(".admin-edit3").hide();
    });

});

/* end admin */
