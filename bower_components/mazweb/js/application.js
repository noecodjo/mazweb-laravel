define(['$'], function($){

    var $window = $(window),
        $document = $(document);

    var Application = {
        api: {}
    };

    Application.init = function() {

    };

    Application.api.parallax = {
        selector: 'a[href*=#]:not([href=#])',
        enable: function() {
            // alert('cscaca');
            var self = this;
            var selector = self.selector;
            $(selector, $document).on('click', function() {
                if ($window.location.pathname.replace(/^\//,'') == self.pathname.replace(/^\//,'')
                    || $window.location.hostname == self.hostname) {
                    var target = $(self.hash);
                    target = target.length ? target : $('[name=' + self.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body', $document).animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        }
    };

    Application.api.navmenu = {
        selector: '#menu-close, #menu-toggle',
        enable: function() {
            var self = this;
            var selector = self.selector;
            $(selector, $document).on('click', function(e) {
                e.preventDefault();
                $("#sidebar-wrapper", $document).toggleClass("active");
            });
        }
    }

    return Application;
});
