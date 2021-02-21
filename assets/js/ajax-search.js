;jQuery(function ($) {

    const searchForm = jQuery(".search_form");
   const searchInput = jQuery(".search_form input[name=s]")


    const btnClearQuery = jQuery(".search-clear-btn");


    searchInput.on("keyup" , function (event) {
       let queryStr  = searchInput.val();

        // btn CLEAR string query ---------------------------------------------------
        btnClearQuery
            .removeClass("search-clear-btn_hidden")
            .text("ищем...")
            .on("click" , function (event) {
            searchInput.val('');
            const searchList =  jQuery(".search-list");
            if(searchList.length > 0) searchList.remove();
            btnClearQuery.addClass("search-clear-btn_hidden");
            return false;
        });
//====================================


       if(queryStr.length < 4) {
           jQuery(".search-list").remove();
           return false;
       }

       // ajax should be here
const data = {
  s: queryStr ,
  nonce: headerSearchData.nonce,
    action: "search-ajax"
};

const ajaxArg = {
    method: "POST",
    url: headerSearchData.url,
    data: data,
    dataType: "json",
    beforeSend(){
        console.log("this is beforeSend method")
    }
};

jQuery.ajax(ajaxArg)
    .done(function(data) {
        const  searchList = jQuery(".search-list");
        if(queryStr.length < 4) {
            searchList.remove();
            return false;
        }
        searchList.remove();
        searchForm.append( jQuery(data));
        btnClearQuery.text("очистить");

    })
    .fail(function(e) {
       // console.log(e);
    });

       //-------------

   });

});



