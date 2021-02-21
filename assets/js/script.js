
jQuery(document).ready(function(){


	/* ---- Countdown timer ---- */

	jQuery('#counter').countdown({
		timestamp : (new Date()).getTime() + 11*24*60*60*1000
	});


	/* ---- Animations ---- */

    jQuery('#links a').hover(
		function(){ jQuery(this).animate({ left: 3 }, 'fast'); },
		function(){ jQuery(this).animate({ left: 0 }, 'fast'); }
	);

    jQuery('footer a').hover(
		function(){ jQuery(this).animate({ top: 3 }, 'fast'); },
		function(){ jQuery(this).animate({ top: 0 }, 'fast'); }
	);



    // header scripts
	jQuery('#horizontalTab').easyResponsiveTabs({
		type: 'default', //Types: default, vertical, accordion
		width: 'auto', //auto or any width like 600px
		fit: true   // 100% fit in a container
	});


    //<!-- start-smooth-scrolling -->
    jQuery(".scroll").click(function(event){
        event.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top},1000);
    });


    // autorun modal window reg and login
    // jQuery('#myModal88').modal('show');



	//  navbar add trigger  event  hover and click
    jQuery('li.menu-item-has-children > a + span.caret').mouseover(function (e) {
       e.preventDefault();
        jQuery(this).trigger("click");
    });
    // jQuery("li.menu-item-has-children").mouseover( function (e) {
		// e.preventDefault();
		// jQuery(this).children("span.caret").trigger("click");
    //
    // })




	// header minicart

	const headerMinicartIcon = jQuery(".cart.box_1");
	const headerMinicartContent = jQuery(".header-minicart-content")  ;
	headerMinicartIcon.on("mouseover" , function (event){
		headerMinicartContent.removeClass("header-minicart-content_hidden");
    })

    jQuery(document).mouseup(function (e){
    	// событие клика по веб-документу; // тут указываем ID элемента
        if (!headerMinicartContent.is(e.target) // если клик был не по нашему блоку
            && headerMinicartContent.has(e.target).length === 0) { // и не по его дочерним элементам
            headerMinicartContent.addClass("header-minicart-content_hidden"); // скрываем его
        }
    });


});
