jQuery(document).ready(function() {
     jQuery('.nav ul>li').has("ul").addClass('hasList');
    jQuery('.nav ul>li').has("ul").append("<span class='child_list_opener'><i class='fa fa-chevron-down' aria-hidden='true'></i></span>");
    jQuery(document).on("click",".child_list_opener",function() {
        jQuery(this).closest('li').find('i').toggleClass('fa-chevron-up');
        jQuery(this).closest('li').find('i').toggleClass('fa-chevron-down');
        jQuery(this).closest('li').find('ul').slideToggle(300);
    });
    //ENABLE GRID/LIST VIEW
    jQuery('.list-view').click(function(e) {
        //e.preventDefault();
        jQuery('.products').addClass('list-view');
    });
    jQuery('.grid-view').click(function(e) {
        //e.preventDefault();
        jQuery('.products').removeClass('list-view');
    });
    //ENABLE BURGER MENU
    jQuery('.btn-opener').click(function(e) {
        //e.preventDefault();
        jQuery('#header .nav>ul').slideToggle(300);
   });
});
 jQuery('#btn-refresh').click(function() {
    location.reload();
    });
    jQuery(window).load(function() {
        jQuery(".woomoby .loader").fadeOut("slow");
    }); 
if ('ontouchstart' in window) {
    jQuery(document).on('focus', 'textarea,input,select', function() {
        jQuery('.fixed-links, #header').css('position', 'absolute');
    }).on('blur', 'textarea,input,select', function() {
        jQuery('.fixed-links, #header').css('position', '');
    });
}
// 

   
   