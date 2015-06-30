/*
 * Toggles search on and off
 */
jQuery(document).ready(function($){
    var on=false;
    $(".search-toggle").click(function(){
        if($(document).width() <= 1160) {
            $("#search-container").slideToggle('slow', function () {
                $('.search-toggle').toggleClass('active');
                if(on){
                    $('.site-branding').css('margin-top', '50px');
                    on=false;
                }else{
                    on=true;
                }
            });
            if(!on){
                $('.site-branding').css('margin-top', '0');
            }

            // Optional return false to avoid the page "jumping" when clicked
            return false;
        }
    });
});