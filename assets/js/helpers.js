/* 

makeAjaxRequest: make friendy ajax request
Examples

var request = makeAjaxRequest("url", {});

request.done(function (data, textStatus, jqXHR) {

});
request.fail(function (data, textStatus, jqXHR) {

});

*/


$(document).ready(function () {
    
    var targets = document.querySelectorAll('img.has-lazy');

    /*     
    var lazyLoad = target => {
        var io = new IntersectionObserver((entries, observer) =>{
            
        });        
    } 
    */

    var lazyLoad = function lazyLoad(target) {
        var io = new IntersectionObserver(function (entries, observer) {

            entries.forEach(function (entry){
                if (entry.isIntersecting) {
                    var img = entry.target;
                    var src = img.getAttribute('data-lazy');

                    img.setAttribute('src', src);
                    img.classList.add('fade');

                    observer.disconnect();
                }
            });

        });
        io.observe(target);
    };

    targets.forEach(lazyLoad);

});

function makeAjaxRequest(requestURL, Data, PostType) {

    if (PostType == undefined) PostType = "POST";

    var jqxhr = $.ajax({
        type: PostType,
        url: requestURL,
        data: Data,
        dataType: 'json'
    });

    return jqxhr;
}


function warnings(severity, message) {

    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.showDuration = 150;
    toastr.options.hideDuration = 150;
    toastr.options.timeOut = 15000;
    toastr.options.extendedTimeOut = 17000;
    toastr.options.preventDuplicates = true;

    switch (severity) {
        case 'error':
            toastr.error(message).css("font-size", "18px");
            break;
        case 'warning':
            toastr.warning(message).css("font-size", "18px");
            break;
        case 'info':
            toastr.info(message).css("font-size", "18px");
            break;
        case 'success':
            toastr.success(message).css("font-size", "18px");
            break;
        default:
            toastr.error(message).css("font-size", "18px");
    }

}
