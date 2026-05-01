(function ($) {
    const pluginDataKey = 'nb.steps';

    const defaults = {
        headerTag: 'h3',
        bodyTag: 'section',
        startIndex: 0,
        transitionEffect: 'none',
        autoFocus: false,
        labels: {
            cancel: 'Cancel',
            current: 'current step:',
            pagination: 'Pagination',
            finish: 'Finish',
            next: 'Next',
            previous: 'Previous',
            loading: 'Loading ...'
        },
        onStepChanging: function () { return true; },
        onStepChanged: function () { },
        onFinishing: function () { return true; },
        onFinished: function () { }
    };

    function Steps($element, options) {
        this.$element = $element;
        this.options = $.extend(true, {}, defaults, options);
        this.currentIndex = this.options.startIndex;
        this.count = 0;
        this.$stepsWrapper = null;
        this.$contentWrapper = null;
        this.$actionsWrapper = null;
        this.$previousItem = null;
        this.$nextItem = null;
        this.$finishItem = null;
        this.navItems = [];
        this.bodyItems = [];
        this._init();
    }

    Steps.prototype._init = function () {
        const opts = this.options;
        const headers = this.$element.children(opts.headerTag);
        const bodies = this.$element.children(opts.bodyTag);
        this.count = Math.min(headers.length, bodies.length);
        this.$element.addClass('wizard');

        this.$stepsWrapper = $('<div class="steps clearfix"><ul></ul></div>');
        const $navList = this.$stepsWrapper.find('ul');
        this.$contentWrapper = $('<div class="content clearfix"></div>');

        for (let index = 0; index < this.count; index++) {
            const $header = headers.eq(index);
            const $body = bodies.eq(index);
            const headerHtml = $header.html();

            const $item = $('<li class="disabled" aria-disabled="true"></li>').attr('role', 'tab');
            const $anchor = $('<a href="#"></a>').html(headerHtml);
            $item.append($anchor);
            $item.data('step-index', index);
            this.navItems.push($item);
            $navList.append($item);

            $body.addClass('body').attr({ 'data-step-index': index, role: 'tabpanel' });
            if (index !== this.currentIndex) {
                $body.hide();
            }
            this.bodyItems.push($body);
            this.$contentWrapper.append($body);
            $header.remove();
        }

        this.$actionsWrapper = $('<div class="actions clearfix"><ul></ul></div>');
        const $actionsList = this.$actionsWrapper.find('ul');
        this.$previousItem = $('<li><a href="#previous">' + opts.labels.previous + '</a></li>');
        this.$nextItem = $('<li><a href="#next">' + opts.labels.next + '</a></li>');
        this.$finishItem = $('<li><a href="#finish">' + opts.labels.finish + '</a></li>');
        $actionsList.append(this.$previousItem, this.$nextItem, this.$finishItem);

        this.$element.empty().append(this.$stepsWrapper, this.$contentWrapper, this.$actionsWrapper);

        this._attachEvents();
        this._refreshUI();
        if (opts.autoFocus) {
            this._focusStep(this.currentIndex);
        }
    };

    Steps.prototype._attachEvents = function () {
        const self = this;
        this.navItems.forEach(function ($item) {
            $item.on('click', function (event) {
                event.preventDefault();
                if ($item.hasClass('disabled')) {
                    return;
                }
                const targetIndex = $item.data('step-index');
                if (typeof targetIndex === 'number') {
                    self._goToStep(targetIndex);
                }
            });
        });

        this.$previousItem.on('click', function (event) {
            event.preventDefault();
            self.previous();
        });

        this.$nextItem.on('click', function (event) {
            event.preventDefault();
            self.next();
        });

        this.$finishItem.on('click', function (event) {
            event.preventDefault();
            self.finish();
        });
    };

    Steps.prototype._goToStep = function (newIndex, force) {
        if (newIndex === this.currentIndex || newIndex < 0 || newIndex >= this.count) {
            return false;
        }
        const oldIndex = this.currentIndex;
        if (!force) {
            const canChange = this.options.onStepChanging.call(this.$element[0], $.Event('stepChanging'), oldIndex, newIndex);
            if (canChange === false) {
                return false;
            }
        }
        this.currentIndex = newIndex;
        this._updateBodies(oldIndex, newIndex);
        this._refreshUI();
        this.options.onStepChanged.call(this.$element[0], $.Event('stepChanged'), newIndex);
        if (this.options.autoFocus) {
            this._focusStep(newIndex);
        }
        return true;
    };

    Steps.prototype._updateBodies = function (oldIndex, newIndex) {
        const $oldBody = this.bodyItems[oldIndex];
        const $newBody = this.bodyItems[newIndex];
        if (!$newBody) {
            return;
        }
        const effect = this.options.transitionEffect;
        if (effect === 'fade') {
            if ($oldBody) {
                $oldBody.stop(true, true).fadeOut(200, function () {
                    $newBody.fadeIn(200);
                });
            } else {
                $newBody.fadeIn(200);
            }
        } else {
            if ($oldBody) {
                $oldBody.hide();
            }
            $newBody.show();
        }
    };

    Steps.prototype._refreshUI = function () {
        const self = this;
        this.navItems.forEach(function ($item, index) {
            $item.removeClass('current done disabled').attr('aria-disabled', 'true');
            if (index < self.currentIndex) {
                $item.addClass('done');
            } else if (index === self.currentIndex) {
                $item.addClass('current').attr('aria-disabled', 'false');
            } else {
                $item.addClass('disabled');
            }
        });

        if (this.currentIndex === 0) {
            this._disableAction(this.$previousItem);
        } else {
            this._enableAction(this.$previousItem);
        }

        if (this.currentIndex >= this.count - 1) {
            this.$nextItem.hide();
            this.$finishItem.show();
        } else {
            this.$nextItem.show();
            this.$finishItem.hide();
        }
    };

    Steps.prototype._disableAction = function ($item) {
        $item.addClass('disabled');
        $item.find('a').attr('aria-disabled', 'true');
    };

    Steps.prototype._enableAction = function ($item) {
        $item.removeClass('disabled');
        $item.find('a').attr('aria-disabled', 'false');
    };

    Steps.prototype._focusStep = function (index) {
        const $body = this.bodyItems[index];
        if (!$body) {
            return;
        }
        const $focusable = $body.find('input, select, textarea, button').filter(':visible:not([disabled])').first();
        if ($focusable.length) {
            $focusable.trigger('focus');
        }
    };

    Steps.prototype.current = function () {
        return this.currentIndex;
    };

    Steps.prototype.next = function () {
        return this._goToStep(this.currentIndex + 1);
    };

    Steps.prototype.previous = function () {
        return this._goToStep(this.currentIndex - 1, true);
    };

    Steps.prototype.setStep = function (index) {
        return this._goToStep(index, true);
    };

    Steps.prototype.finish = function () {
        const canFinish = this.options.onFinishing.call(this.$element[0], $.Event('finishing'), this.currentIndex);
        if (canFinish === false) {
            return false;
        }
        this.options.onFinished.call(this.$element[0], $.Event('finished'), this.currentIndex);
        return true;
    };

    $.fn.steps = function (option) {
        const args = Array.prototype.slice.call(arguments, 1);
        let returnValue = this;
        this.each(function () {
            const $this = $(this);
            let data = $this.data(pluginDataKey);
            if (!data && (typeof option === 'object' || !option)) {
                data = new Steps($this, option || {});
                $this.data(pluginDataKey, data);
            }
            if (typeof option === 'string' && data) {
                if (typeof data[option] === 'function') {
                    const response = data[option].apply(data, args);
                    if (response !== undefined) {
                        returnValue = response;
                        return false;
                    }
                }
            }
        });
        return returnValue;
    };

    $.fn.steps.defaults = defaults;
})(jQuery);
