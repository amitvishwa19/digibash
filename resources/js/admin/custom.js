


//Adding active tag in side menu nav items
var CURRENT_URL = window.location.href.split('#')[0];
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.aside-body').find('a[href="' + CURRENT_URL + '"]').parents('ul').closest('li').addClass('active show');


//App toadt
window.setTimeout(function () {
    ;
    $("#toasty").fadeOut(1000, function () {
        $(this).remove();
    });
}, 5000);
//console.log(CURRENT_URL)

//Post delete confirmation
$('.del-button').click(function () {
    alert('Delete clicked');
});