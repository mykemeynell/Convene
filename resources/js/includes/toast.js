(function() {
    let toaster = function(options) {
        if(! (this instanceof toaster)) {
            return new toaster(options);
        }

        this.options = $.extend({
            title: '',
            message: ''
        }, options);
    };

    toaster.fn = toaster.prototype = {
        init: function() {}
    };

    toaster.fn.pop = function() {
        this.wrapper = "<div id=\"toast-wrapper\" style=\"position: absolute; top: 20px; right: 20px;width: 20rem;\"></div>";

        this.toast = "<div class=\"toast\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" data-autohide=\"false\">\n" +
            "      <div class=\"toast-header\">\n" +
            "        <img src=\"//placehold.it/20\" class=\"rounded mr-2\" alt=\"...\">\n" +
            "        <strong class=\"mr-auto\">" + this.options.title + "</strong>\n" +
            "        <small class=\"text-muted\">just now</small>\n" +
            "        <button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\">\n" +
            "          <span aria-hidden=\"true\">&times;</span>\n" +
            "        </button>\n" +
            "      </div>\n" +
            "      <div class=\"toast-body\">\n" +
            "        " + this.options.message +
            "      </div>\n" +
            "    </div>";

        if($('body #wrapper #toast-wrapper').length < 1) {
            $('body #wrapper').append(this.wrapper);
        }

        $('body #wrapper #toast-wrapper').append(this.toast);

        $('.toast').toast('show');

        $('.toast').on('hidden.bs.toast', function () {
            $(this).remove();
        })

        return this;
    };

    window.toaster = toaster;
})();
