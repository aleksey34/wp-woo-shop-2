;jQuery(function ($) {

    const startViewBtnList = jQuery(".agile_ecommerce_tab_left  .w3_hs_bottom>ul>li>a.modal-product-link[data-product_id]");
    const quickViewModalWindow = jQuery("#modal_product");

if(!startViewBtnList.length  || !quickViewModalWindow.length) return  false;

    startViewBtnList.on("click" , function (event) {
        event.preventDefault();

        const productId = jQuery(this).data('product_id');


        const data = {
            productId ,
            action: "ajax-quick-view",
            nonce: quickViewData.nonce
        };


        const ajaxArg = {
            method: "POST",
            url: quickViewData.url,
            data,
             dataType: "json",
            // dataType: "json",
            beforeSend(){
                quickViewModalWindow.find(".modal-body").html("waiting for...");
                // console.log("this is beforeSend method")
            }
        };

        jQuery.ajax(ajaxArg)
             .done(function(data) {
        console.log(data);
        console.log("success");
     //   quickViewModalWindow.css("border", "3px solid red").remove();
        quickViewModalWindow.find(".modal-body").html(data.product);
        // quickViewModalWindow.find(".modal-body").html(data.responseText);
    })
          .fail(function(e) {
             //  console.log(e);
               alert("error")
    });


    });


   const closeBtn =  jQuery("button.close[data-dismiss=modal]");
   if(closeBtn.length > 0){
       closeBtn.on("click" , function (event) {
           jQuery(this)
               .parent()
               .next()
               .find(".modal-body")
               .empty();
       })
   }



});



