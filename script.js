//Shrink navbar
$(function() {
    var scrollTop = $(document).scrollTop();
    shrinkNav(scrollTop);
    $(window).scroll(function(){
        scrollTop = $(document).scrollTop();
        shrinkNav(scrollTop);
    });

    function shrinkNav(scrollTop) {
        if (scrollTop >= 50) {
            $('nav').addClass('shrink');
        } else if (scrollTop < 50) {
            $('nav').removeClass('shrink');
        }
    }
});

// Active links
$('body').scrollspy({ target: 'nav', offset: 70 });

//Typewriter
$(function() {
    // values to keep track of the number of letters typed, which quote to use. etc. Don't change these values.
    var i = 0,
    a = 0,
    isBackspacing = false;

    // Typerwrite text content. Use a pipe to indicate the start of the second line "|".  
    var textArray = [
        "ASP.NET Core",
        "EntityFramework",
        "MS SQL",
        "HTML",
        "JavaScript",
        "jQuery"
    ];

    // Speed (in milliseconds) of typing.
    var speedForward = 100, //Typing Speed
    speedWait = 1000, // Wait between typing and backspacing
    speedBackspace = 15; //Backspace Speed

    //Run the loop
    typeWriter("typewriter", textArray);

    function typeWriter(id, ar) {
    var element = $("#" + id),
    aString = ar[a],
    eHeader = element.children(".type"); //Header element

        // Determine if animation should be typing or backspacing
        if (!isBackspacing) {
            
            // If full string hasn't yet been typed out, continue typing
            if (i < aString.length) {
            
                eHeader.text(eHeader.text() + aString.charAt(i));
                i++;
                setTimeout(function(){ typeWriter(id, ar); }, speedForward);
            
            // If full string has been typed, switch to backspace mode.
            } else if (i == aString.length) {
            
                isBackspacing = true;
                element.children(".cursor").addClass("cursor--blink");
                //alert('aaaaa');
                setTimeout(function(){ typeWriter(id, ar); }, speedWait);
                //alert('bbbbb');
                //
            }
            
        // If backspacing is enabled
        } else {
            element.children(".cursor").removeClass("cursor--blink");
            // If either the header or the paragraph still has text, continue backspacing
            if (eHeader.text().length > 0 ) {
            
                eHeader.text(eHeader.text().substring(0, eHeader.text().length - 1));
                setTimeout(function(){ typeWriter(id, ar); }, speedBackspace);
            
            // If neither head or paragraph still has text, switch to next quote in array and start typing.
            } else { 
            
                isBackspacing = false;
                i = 0;
                a = (a + 1) % ar.length; //Moves to next position in array, always looping back to 0
                setTimeout(function(){ typeWriter(id, ar); }, 50);
            
            }
        }
    }
});

//Navbar link click
$(function() {
    $('a.page-scroll[href*="#"]:not([href="#"])').on('click',function(){
        if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&location.hostname==this.hostname){
            var target=$(this.hash);
            target=target.length?target:$('[name='+this.hash.slice(1)+']');
            if(target.length){
                $('html, body').animate({scrollTop:(target.offset().top-60)},1200,"easeInOutExpo");
                return false;
            }
        }
    });
});

// (function($) {
//     "use strict";
//     $(window).on('load',function(event) {
//         $('.preloader').delay(500).fadeOut(500);
//     });
// });

