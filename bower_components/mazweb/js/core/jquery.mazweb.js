(function ($){

    // Check for jQuery library
    if ($ == undefined) {
        alert('jQuery library not loaded');
        return false;
    }

    $.mazweb = {
        /**
         * Wrapper around the browser console
         */
        Console: {

            NONE: 0,
            INFO: 1,
            WARN: 2,
            ERR: 4,
            DEBUG: 8,
            ALL: 15,

            _logLevel: 0,

            /**
             * Log to browser console
             *
             * @param obj
             * @param level
             */
            log: function (obj, level) {
                if (!window.console || !obj) {
                    return false;
                }

                if (!level) {
                    level = this.INFO;
                }

                if (obj.length == 1) {
                    obj = obj[0];
                }

                try {
                    if ((this._logLevel & level) > 0) {
                        switch (level) {
                            case this.INFO:
                                window.console.info(obj);
                                break;
                            case this.WARN:
                                window.console.warn(obj);
                                break;
                            case this.ERR:
                                window.console.error(obj);
                                break;
                            case this.DEBUG:
                                if (window.console.debug) {
                                    window.console.debug(obj);
                                } else {
                                    window.console.log(obj);
                                }
                                break;
                            default:
                                window.console.log(obj);
                                break;
                        }
                        return true;
                    }
                } catch (ex) {
                    return false;
                }
                return false;
            },

            /**
             * Log info
             */
            info: function () {
                return this.log(arguments, this.INFO);
            },

            /**
             * Log warning
             */
            warn: function () {
                return this.log(arguments, this.WARN);
            },

            /**
             * Log error
             */
            error: function () {
                return this.log(arguments, this.ERR);
            },

            /**
             * Log debug information
             */
            debug: function () {
                return this.log(arguments, this.DEBUG);
            },

            /**
             * Set log output level
             *
             * @param level
             */
            setLogLevel: function (level) {
                this._logLevel = parseInt(level);
                return this;
            }
        },
        Message: ({

            self: this,

            INFO: 'info',
            WARN: 'warn',
            ERR: 'error',

            /**
             * Default options
             */
            defaults: {
                type: self.INFO,
                container: null,
                customClass: '',
                duration: 5000,
                positionElement: null,
                positionX: 'center',
                offsetX: 0,
                offsetY: 0,
                onshow: function () {
                },
                onhide: function () {
                },
                clearContents: false
            },

            /**
             * Set the default site-wide message container.
             * @param options
             */
            setDefaults: function (options) {
                $.extend(this.defaults, options);
            },

            /**
             * Set options and show a site message
             * @param message
             * @param options
             */
            show: function (message, options) {

                options = $.extend({}, this.defaults, options);

                if (!options.container) {
                    $.console.error('Site message container not set');
                    return;
                }

                // Ensure jQuery object
                var container = $(options.container);

                // Show new message
                function showMessage(message) {
                    container.show();
                    if (options.clearContents) {
                        container.html(message);
                    } else {
                        container.append(message);
                    }

                    message.show();

                    // Set position
                    var posEle = $(options.positionElement);
                    if (posEle.length && container.css('position') == 'fixed') {
                        var el = $(options.positionElement),
                            pos = el.position();

                        container.css('top', pos.top + parseInt(options.offsetY));
                        if (options.positionX == 'right') {
                            container.css({
                                right: pos.left + parseInt(options.offsetX)
                            });
                        } else if (options.positionX == 'center') {
                            container.css({
                                left: ($(window).width() / 2) - (container.width() / 2)
                            });
                        } else {
                            container.css({
                                left: pos.left + parseInt(options.offsetX)
                            });
                        }
                    }

                    message.slideDown('fast');
                    options.onshow();
                }

                // Hide message
                function hideMessage(message) {
                    $(message).slideUp('fast', function () {
                        $(this).remove();
                        if ($('.message', container).length == 0) {
                            container.hide();
                        }
                        options.onhide();
                    });
                }

                // Set the message type class
                var messageClass = '';
                switch (options.type) {
                    case this.WARN:
                    case this.ERR:
                        messageClass = options.type;
                        break;
                    default:
                        messageClass = this.INFO;
                        break;
                }

                if (typeof(message) == 'object') {
                    message = $(message).text();
                }

                var $message = $('<div class="message ' + messageClass + ' ' + options.customClass + '" style="display:none">' + message + '<a class="close"></a></div>');

                // Show the new message
                showMessage($message);

                // Auto close duration
                if (options.duration) {
                    setTimeout(function () {
                        hideMessage($message);
                    }, options.duration);
                }

                // Close button
                $message.find('.close').click(function (e) {
                    hideMessage($(this).closest('.message'));
                });
            },

            /**
             * Hide all messages
             */
            hide: function () {
                $(this.defaults.container)
                    .html('')
                    .hide();
            },

            /**
             * Alias for Message.show
             * @param message
             * @param options
             */
            info: function (message, options) {
                this.show(message, options);
            },

            /**
             * Breaking news
             * @param message
             */
            news: function (message) {
                message = '<strong>Breaking news:</strong> ' + message;
                this.show(message, { duration: 10000 });
            },

            /**
             * Helper for showing a message of type ERR
             * @param message
             * @param options
             */
            error: function (message, options) {
                this.show(message, $.extend(options, {type: this.ERR}));
            }
        })
    };

    /**
     * Access the mazweb.Console object
     */
    $.console = $.mazweb.Console;

    /**
     * Access to the mazweb.Message object
     */
    $.message = $.mazweb.Message;

    /**
     * jQuery plugins
     */
    $.fn.extend({
        /**
         * Send a message to the global message handler
         *
         * @param message
         * @param options
         */
        message: function (message, options) {
            return this.each(function () {
                var newOptions = $.extend({container: $(this)}, options || {});
                $.Webonyx.Message.show(message, newOptions);
            });
        }
    });
})(jQuery);
