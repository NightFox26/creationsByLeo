(function ($) {
    $(".header-media").css("opacity", "1");
        
    $(window).scroll(function () {
        let scrollTop = $(window).scrollTop();
        let heightWindow = $(window).innerHeight();
        let maxHeightPage = $(document).innerHeight();
        let documentBottom = maxHeightPage-heightWindow-100;
        //console.log(maxHeightPage);
        //console.log(heightWindow);
        //console.log(documentBottom);
        if (scrollTop >= 600){
           $(".home .hero-content-wrapper .entry-container").show(500);  
           $(".home .hero-content-wrapper .post-thumbnail-background").addClass("zoom");                  
        }
        if (scrollTop >= documentBottom){
           $(".archive-posts-wrapper .section-content-wrapper").show(800);            
        }
    });

})(jQuery);