/**
 * Created by thangchung on 1/6/14.
 */
define(['$', 'mazweb/core/helper', 'mazweb/application', 'mazweb/core/overlay', 'mazweb/core/jquery.mazweb'], function($, helper, application) {
    $(function() {
        var content = $.get(application.rootPath + '/partials/overlay-modal', function(data) {
            $.message.info('request success');
            $('#overlay-example1').html(data);
        })
    });
});