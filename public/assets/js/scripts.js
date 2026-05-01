

$(window).on("load resize",function(e){

    // const headerHeight =   document.querySelector('.header').offsetHeight;
    // document.querySelector('.offcanvas-wrapper').style.top = `${headerHeight}px`;
});


jQuery(document).ready(function($) {

    $('.bar').click(function(){
        $('.offcanvas-wrapper, .bars, .overlay').addClass('show');
    });
    $('.close, .overlay').click(function(){
        $('.offcanvas-wrapper, .overlay, .bars').removeClass('show');
    });

    $('.counter').counterUp({
        delay: 10,
        time: 1000,
        triggerOnce:true
    });
});
