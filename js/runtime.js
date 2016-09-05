/**
 * Created by Ichisen-PC on 08.07.2016.
 */

var articleHeaderBind = function() {
    $( '.article-header' ).each(function(index, item) {
        var $articleHeader = $(item);
        var bind = $articleHeader.attr('data-event-bind');

        if(bind != 'true') {
            var $articleBody = $articleHeader.parent().find('.article-body');
            $articleBody.hide();
            $articleHeader.click(function(){ $articleBody.toggle() });
            $articleHeader.attr('data-event-bind',"true")
        }
    });
};

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

articleHeaderBind();

/*var loadHTMLContent = function(url, callBack) {
    $.ajax({
        url: url +'/content.html',
        method: 'GET',
        complete: function(response) {
            if(response.status != 200) return;

            callBack( response.responseText );
            articleHeaderBind();
        }
    })
};

$( '.load-content' ).each(function(index, item) {
    var $loadTarget = $(item);
    var url = $(item).attr('data-url');
    var isSingle = $(item).attr('data-single') == 'true';

    if(isSingle){
        loadHTMLContent(url, function(responseText){
            $( responseText ).insertBefore( $loadTarget );
            $loadTarget.remove()
        })

    } else {
        $.ajax({
            url: url +'/data.json',
            method: 'GET',
            complete: function(response) {
                if(response.status != 200) return;

                var data = JSON.parse(response.responseText);

                var items = data.items || [];
                var length = LOADCOUNT < items.length ? LOADCOUNT : items.length;
                var lengthState = length;
                var selfURL;

                for(var i = 0; i < length; i++) {


                    (function(item){
                        selfURL = url + '/' + item.url;
                        loadHTMLContent(selfURL, function(responseText){
                            item.content = responseText;
                            lengthState -= 1;

                            if(lengthState == 0) {
                                for(var j = 0; j < length; j++) {
                                    $( items[j].content ).insertBefore( $loadTarget );
                                }
                                $loadTarget.remove();
                            }
                        })
                    })(items[i]);
                }
            }
        })
    }
});*/