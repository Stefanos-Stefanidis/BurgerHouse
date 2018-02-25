$(document).ready(function () {

    $('.carousel').carousel({
        interval: 6000
    });
    var index = Cookies.get('active');
    console.log(index);
    if (index == undefined) {
        $('#logo').addClass('active');
    }
    $('.navbar-nav').find('li').removeClass('active');
    $(".navbar-nav").find('li').eq(index).addClass('active');
    $('.navbar-nav').on('click', 'li', function (e) {
        //e.preventDefault();
        $('.navbar-nav').find('li').removeClass('active');
        $(this).addClass('active');
        Cookies.set('active', $('.navbar-nav li').index(this));
    });
});