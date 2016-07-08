/**
 * Created by Ichisen-PC on 08.07.2016.
 */

$( '.article-header' ).each(function(index, item) {
    var $articleHeader = $(item);
    var $articleBody = $articleHeader.parent().find('.article-body');
    $articleBody.hide();
    $articleHeader.click(function(){ $articleBody.toggle() })
});

var currentURLHash;

var intervalID = setInterval(function(){
    var urlHash = decodeURI(document.location.hash.replace('#', ''));

    if(currentURLHash != urlHash) {
        var elem = $( '.'+urlHash +'-record');
        if(elem[0]) {
            $('html,body').animate({scrollTop: elem.first().offset().top}, 'slow');
        }
        currentURLHash = urlHash;
    }
},50);