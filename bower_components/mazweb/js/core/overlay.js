define(['$', 'bootstrap'], function($) {
    /**
     * @summary
     * Full-screen overlay with scrolling capability.
     * Extends [bootstrap modal](http://twitter.github.io/bootstrap/javascript.html#modals).
     *
     * @usage
     * All options, events and methods are the same as in
     * [bootstrap modal](http://twitter.github.io/bootstrap/javascript.html#modals).
     *
     * But there are also notable differences:
     *
     *  - Different markup (see examples)
     *  - jQuery plugin name is `.overlay()`
     *  - Options `keyboard` and `backdrop` are disabled by default
     *  - New option `focus` - selector of element being focused on open (Default: __input[type=text]:first__)
     *  - Data API: use `data-toggle="overlay"` to show overlay and `data-dismiss="overlay"` to close.
     *
     * @example Example with scrollable body
     * <button type="button" class="btn btn-default"
     *      data-toggle="overlay"
     *      data-target="#overlay-example1">Show Overlay #1</button>
     *
     * <div class="overlay hide" id="overlay-example1">
     *     <div class="overlay-header">
     *         <h3>
     *             <span class="large icon-date"></span> Example Header
     *         </h3>
     *     </div>
     *
     *     <div class="overlay-border col-md-offset-8"></div>
     *
     *     <div class="overlay-scrollable row">
     *         <div class="col-md-8">
     *             <div class="section main">
     *                 Scrollable body content
     *                 <div style="height: 2000px; class="example-only">&nbsp;</div>
     *             </div>
     *         </div>
     *         <div class="col-md-4">
     *             <div class="section bordered">
     *                 Section1
     *             </div>
     *             <div class="section shifted bordered">
     *                 <span class="control-icon unshifted icon-date"></span>
     *                 Section With Icon<br>
     *                 Multiline
     *             </div>
     *             <div class="section">
     *                 <h3 class="shifted">Aligned Title</h3>
     *                 Section3
     *             </div>
     *         </div>
     *     </div>
     *
     *     <div class="overlay-footer">
     *         <div class="actions">
     *             <button class="btn btn-primary">Some Action</button>
     *             <button class="btn btn-default" data-dismiss="overlay">Close</button>
     *         </div>
     *     </div>
     * </div>
     *
     * @example With scrollable sidebar
     * <button type="button" class="btn btn-default"
     *      data-toggle="overlay"
     *      data-target="#overlay-example2">Show Overlay #2</button>
     *
     * <div class="overlay hide" id="overlay-example2">
     *     <div class="overlay-header">
     *         <div class="actions">
     *             <button data-dismiss="overlay" class="btn btn-default">Close</button>
     *         </div>
     *     </div>
     *
     *     <div class="overlay-border col-md-8"></div>
     *
     *     <div class="row">
     *         <div class="col-md-8">
     *             <div class="section main">
     *                 <input type="text" class="title-input form-control">
     *             </div>
     *         </div>
     *
     *         <div class="overlay-scrollable">
     *             <div class="col-md-offset-8 col-md-4">
     *                 <div class="section bordered">
     *                     Scrollable sidebar
     *                 </div>
     *                 <div class="section">
     *                     <div style="height: 2000px" class="example-only">&nbsp;</div>
     *                 </div>
     *             </div>
     *         </div>
     *     </div>
     * </div>
     */
    var Overlay = function(element, options) {
        this.options = options;
        this.$element = $(element);

        var self = this;
        // Prevent underneath scrolling (android mostly)
        $(document).on('touchmove touchstart', '.overlay', function(e){
            e.stopPropagation();
        });

        this.$element.on('click.dismiss.overlay', '[data-dismiss="overlay"]', function(e) {
            e.preventDefault();
            self.hide();
        });

        this.$element.on('shown.bs.modal', function(e) {
            if (e.target !== self.$element.get(0)) {
                return ;
            }
            $('body').addClass('overlay-open');
            self.$element.find('.overlay').removeClass('hide');

            if (options.focus) {
                self.$element.find(options.focus).focus();
            }
        });
        this.$element.on('hidden.bs.modal', function(e) {
            if (e.target !== self.$element.get(0)) {
                return ;
            }
            $('body').removeClass('overlay-open');
            self.$element.find('.overlay').addClass('hide');
        });
    };

    function inherits(Child, Parent) {
        var F = function() { };
        F.prototype = Parent.prototype;
        Child.prototype = new F();
        Child.prototype.constructor = Child;
        Child.SUPER = Parent.prototype;
    }

    // Inherit from bootstrap modal
    inherits(Overlay, $.fn.modal.Constructor);

    Overlay.prototype.enforceFocus = function() {
        // Enforcing focus causes lots of bugs in IE9-: with flash, with multiple modals or in case of overlay+modal combo
        // (it simply falls into endless recursion), so disable it at all.
        // See https://github.com/twitter/bootstrap/issues/5114 and many other issues
        // (search for "enforceFocus" in bootstrap issue tracker)
        // FIXME: maybe it's worth to remove enforceFocus for bootstrap modal as well.
    };

    // jQuery plugin
    $.fn.overlay = function (option) {
        var args = arguments;
        return this.each(function () {
            var $this = $(this),
                data = $this.data('overlay'),
                options = $.extend({}, $.fn.overlay.defaults, $this.data(), typeof option == 'object' && option);
            if (!data) {
                $this.data('overlay', (data = new Overlay(this, options)));
            }

            if (typeof option == 'string') {
                data[option].apply(data, Array.prototype.slice.call(args, 1));
            }
            else if (options.show) {
                data.show();
            }
        });
    };

    $.fn.overlay.defaults = {
        focus: 'input[type="text"]:first',
        backdrop: false,
        keyboard: false,
        show: true
    };

    // Data API
    $(document).on('click.overlay.data-api', '[data-toggle="overlay"]', function (e) {
        var $this = $(this),
            $target = $($this.attr('data-target') || $this.attr('href')),
            option = $target.data('overlay') ? 'toggle' : $.extend({}, $target.data(), $this.data());

        e.preventDefault();
        $target.overlay(option);
    });

    return Overlay;
});
