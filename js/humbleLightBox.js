/*jshint camelcase: true, quotmark: double, strict: true*/
/*jslint browser: true*/
/*global $*/




"use strict"
$(document).ready(function () {

    var $body = $("body");
    var $lightBox, $overlay;
    var imageWidth, imageHeight;
    var resizeTimeout;


    //Creates the lightbox
    function createLightBox() {

        $lightBox = $("<div id='lightBox'>")
            .css({
                "width": imageWidth,
                "height": imageHeight
            })
            .append("<img id='centeredImg'>")
            .append("<div id='closeIcon'></div>")
            .appendTo($body)
            .hide();

    }

    //Creates overlay
    function createOverlay() {

        $overlay = $("<div id='overlay'>");
        $overlay.appendTo($body).hide();
    }

    $(document).on("click tap", "img.humbleLightbox", update);

    function update(event) {
        event.preventDefault();
        adjustSize(event.target);
        displayLightbox(event.target);
        displayOverlay();
    }

    //set the size of the image
    function adjustSize(img) {

        //get width and height of clicked img
        imageWidth = img.naturalWidth;
        imageHeight = img.naturalHeight;


        var imgRatio = imageWidth / imageHeight;

        //resize image if it's wider/taller than screen 
        if (imageWidth >= $(window).width() * 0.85) {
            imageWidth = $(window).width() * 0.85;
            imageHeight = imageWidth / imgRatio;
        }
        if (imageHeight >= $(window).height() * 0.85) {
            imageHeight = $(window).height() * 0.85;
            imageWidth = imageHeight * imgRatio;
        }
    }

    function displayLightbox(img) {

        if (!$("#lightBox").length) {
            createLightBox();
            $lightBox.fadeIn("slow");
        } else {
            $lightBox.fadeIn("slow").css({
                "width": imageWidth,
                "height": imageHeight
            });
        }

        $("#centeredImg").attr("src", img.src).addClass("active");
    }

    function displayOverlay() {
        var docHeight = $(document).height();

        if (!$("#overlay").length) {
            createOverlay();
            $overlay.height(docHeight).fadeIn(250);
        } else {
            $overlay.height(docHeight).fadeIn(250);
        }
    }


    $(document).on("click tap", "#overlay, #closeIcon", function (event) {
        $lightBox.fadeOut();
        $overlay.fadeOut();
        $("#centeredImg").removeClass("active");
    });



    // Change the image size when the screen gets larger or smaller
    $(window).resize(function () {


        if (!!resizeTimeout) {
            clearTimeout(resizeTimeout);
        }
        resizeTimeout = setTimeout(function () {

            if ($(".active")[0]) {
                $lightBox.hide;
                adjustSize($(".active")[0]);
                displayLightbox($(".active")[0]);
            }
        }, 500);
    });

});