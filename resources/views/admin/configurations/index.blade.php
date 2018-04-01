@extends('layouts.admin')
@section('styles')
    <style>
        /*! ========================================================================
  * Bootstrap Toggle: bootstrap-toggle.css v2.2.0
  * http://www.bootstraptoggle.com
  * ========================================================================
  * Copyright 2014 Min Hur, The New York Times Company
  * Licensed under MIT
  * ======================================================================== */
        .checkbox label .toggle, .checkbox-inline .toggle {
            margin-left: -20px;
            margin-right: 5px
        }

        .toggle {
            position: relative;
            overflow: hidden
        }

        .toggle input[type=checkbox] {
            display: none
        }

        .toggle-group {
            position: absolute;
            width: 200%;
            top: 0;
            bottom: 0;
            left: 0;
            transition: left .35s;
            -webkit-transition: left .35s;
            -moz-user-select: none;
            -webkit-user-select: none
        }

        .toggle.off .toggle-group {
            left: -100%
        }

        .toggle-on {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 50%;
            margin: 0;
            border: 0;
            border-radius: 0
        }

        .toggle-off {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            right: 0;
            margin: 0;
            border: 0;
            border-radius: 0
        }

        .toggle-handle {
            position: relative;
            margin: 0 auto;
            padding-top: 0;
            padding-bottom: 0;
            height: 100%;
            width: 0;
            border-width: 0 1px
        }

        .toggle.btn {
            min-width: 59px;
            min-height: 34px
        }

        .toggle-on.btn {
            padding-right: 24px
        }

        .toggle-off.btn {
            padding-left: 24px
        }

        .toggle.btn-lg {
            min-width: 79px;
            min-height: 45px
        }

        .toggle-on.btn-lg {
            padding-right: 31px
        }

        .toggle-off.btn-lg {
            padding-left: 31px
        }

        .toggle-handle.btn-lg {
            width: 40px
        }

        .toggle.btn-sm {
            min-width: 50px;
            min-height: 30px
        }

        .toggle-on.btn-sm {
            padding-right: 20px
        }

        .toggle-off.btn-sm {
            padding-left: 20px
        }

        .toggle.btn-xs {
            min-width: 35px;
            min-height: 22px
        }

        .toggle-on.btn-xs {
            padding-right: 12px
        }

        .toggle-off.btn-xs {
            padding-left: 12px
        }
    </style>
    <style>
        #alert {
            display: block;
        }

        #alert div {
            display: none;
        }

        .show {
            display: block !important;
        }

        .hidden {
            display: none !important;
            visibility: hidden !important;
        }

        .invisible {
            visibility: hidden;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-offset-3 col-md-6">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Advance Features</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-12" style="margin: 15px 0;">
                <div id="alert">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <span></span>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="series">Natural Language Processing Features</label>
                            <input name="is_NLP_enabled" type="hidden" id="is_NLP_enabled">
                            <label class="switch pull-right">
                                <input id="toggleConfigurationButton" type="checkbox"
                                       {{ $isChecked ? 'checked': ''}} data-toggle="toggle" data-onstyle="success">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 {{ !$isChecked ? 'hidden': '' }}" id="variables">
                    <form action='/updateFacebookVariables' method="POST">
                        {{ csrf_field() }}
                        {{--@foreach($configurations as $config)--}}
                            {{--<div style="margin-left: 15px">--}}
                                {{--<label for="">{{ ucfirst(str_replace('_', ' ', $config->key)) }}</label>--}}
                                {{--                                <input type="hidden" name="keys[{{$config->id}}]" value="{{ $config->key }}">--}}
                                {{--<input class="form-control" name="values[{{$config->id}}]]" type="text"--}}
                                       {{--value="{{ $config->value }}">--}}
                            {{--</div>--}}


                        {{--@endforeach--}}

                        <div style="margin-left: 15px">
                            <label for="facebook_page_id">Facebook Page ID</label>
                            <input class="form-control" name="facebook_page_id" type="text" value="{{ $facebook_page_id->value }}">
                        </div>

                        <div style="margin-left: 15px">
                            <label for="facebook_user_access_token">Facebook User Access Token</label>
                            <input class="form-control" name="facebook_user_access_token" type="text" value="{{ $facebook_user_access_token->value }}">
                        </div>

                        <button style="margin-top: 15px" class="pull-right btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        /*! ========================================================================
         * Bootstrap Toggle: bootstrap-toggle.js v2.2.0
         * http://www.bootstraptoggle.com
         * ========================================================================
         * Copyright 2014 Min Hur, The New York Times Company
         * Licensed under MIT
         * ======================================================================== */
        +function (a) {
            "use strict";
            function b(b) {
                return this.each(function () {
                    var d = a(this), e = d.data("bs.toggle"), f = "object" == typeof b && b;
                    e || d.data("bs.toggle", e = new c(this, f)), "string" == typeof b && e[b] && e[b]()
                })
            }

            var c = function (b, c) {
                this.$element = a(b), this.options = a.extend({}, this.defaults(), c), this.render()
            };
            c.VERSION = "2.2.0", c.DEFAULTS = {
                on: "On",
                off: "Off",
                onstyle: "primary",
                offstyle: "default",
                size: "normal",
                style: "",
                width: null,
                height: null
            }, c.prototype.defaults = function () {
                return {
                    on: this.$element.attr("data-on") || c.DEFAULTS.on,
                    off: this.$element.attr("data-off") || c.DEFAULTS.off,
                    onstyle: this.$element.attr("data-onstyle") || c.DEFAULTS.onstyle,
                    offstyle: this.$element.attr("data-offstyle") || c.DEFAULTS.offstyle,
                    size: this.$element.attr("data-size") || c.DEFAULTS.size,
                    style: this.$element.attr("data-style") || c.DEFAULTS.style,
                    width: this.$element.attr("data-width") || c.DEFAULTS.width,
                    height: this.$element.attr("data-height") || c.DEFAULTS.height
                }
            }, c.prototype.render = function () {
                this._onstyle = "btn-" + this.options.onstyle, this._offstyle = "btn-" + this.options.offstyle;
                var b = "large" === this.options.size ? "btn-lg" : "small" === this.options.size ? "btn-sm" : "mini" === this.options.size ? "btn-xs" : "",
                    c = a('<label class="btn">').html(this.options.on).addClass(this._onstyle + " " + b),
                    d = a('<label class="btn">').html(this.options.off).addClass(this._offstyle + " " + b + " active"),
                    e = a('<span class="toggle-handle btn btn-default">').addClass(b),
                    f = a('<div class="toggle-group">').append(c, d, e),
                    g = a('<div class="toggle btn" data-toggle="toggle">').addClass(this.$element.prop("checked") ? this._onstyle : this._offstyle + " off").addClass(b).addClass(this.options.style);
                this.$element.wrap(g), a.extend(this, {
                    $toggle: this.$element.parent(),
                    $toggleOn: c,
                    $toggleOff: d,
                    $toggleGroup: f
                }), this.$toggle.append(f);
                var h = this.options.width || Math.max(c.outerWidth(), d.outerWidth()) + e.outerWidth() / 2,
                    i = this.options.height || Math.max(c.outerHeight(), d.outerHeight());
                c.addClass("toggle-on"), d.addClass("toggle-off"), this.$toggle.css({
                    width: h,
                    height: i
                }), this.options.height && (c.css("line-height", c.height() + "px"), d.css("line-height", d.height() + "px")), this.update(!0), this.trigger(!0)
            }, c.prototype.toggle = function () {
                this.$element.prop("checked") ? this.off() : this.on()
            }, c.prototype.on = function (a) {
                return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._offstyle + " off").addClass(this._onstyle), this.$element.prop("checked", !0), void(a || this.trigger()))
            }, c.prototype.off = function (a) {
                return this.$element.prop("disabled") ? !1 : (this.$toggle.removeClass(this._onstyle).addClass(this._offstyle + " off"), this.$element.prop("checked", !1), void(a || this.trigger()))
            }, c.prototype.enable = function () {
                this.$toggle.removeAttr("disabled"), this.$element.prop("disabled", !1)
            }, c.prototype.disable = function () {
                this.$toggle.attr("disabled", "disabled"), this.$element.prop("disabled", !0)
            }, c.prototype.update = function (a) {
                this.$element.prop("disabled") ? this.disable() : this.enable(), this.$element.prop("checked") ? this.on(a) : this.off(a)
            }, c.prototype.trigger = function (b) {
                this.$element.off("change.bs.toggle"), b || this.$element.change(), this.$element.on("change.bs.toggle", a.proxy(function () {
                    this.update()
                }, this))
            }, c.prototype.destroy = function () {
                this.$element.off("change.bs.toggle"), this.$toggleGroup.remove(), this.$element.removeData("bs.toggle"), this.$element.unwrap()
            };
            var d = a.fn.bootstrapToggle;
            a.fn.bootstrapToggle = b, a.fn.bootstrapToggle.Constructor = c, a.fn.toggle.noConflict = function () {
                return a.fn.bootstrapToggle = d, this
            }, a(function () {
                a("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()
            }), a(document).on("click.bs.toggle", "div[data-toggle^=toggle]", function (b) {
                var c = a(this).find("input[type=checkbox]");
                c.bootstrapToggle("toggle"), b.preventDefault()
            })
        }(jQuery);
        //# sourceMappingURL=bootstrap-toggle.min.js.map

        $(document).ready(function () {
            $("#toggleConfigurationButton").change(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                e.preventDefault();

                $.ajax({

                    type: 'POST',
                    url: '/toggleConfiguration',
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                }).then(function (data) {

                    // Notification
                    var $cloned = $('#alert div:first-child').clone(true);
                    $cloned.css('display', 'block');
                    var message = '';

                    if (JSON.parse(data).value === "1") {
                        $('#variables').show();
                        message = 'NLP Enabled';
                    } else {
                        message = 'NLP Disabled';
                        $('#variables').hide();

                    }
                    $cloned.find('span').text(message);
                    $('#alert').append($cloned);
                    setTimeout(function () {
                        $cloned.hide(200);
                    }, 1000);
                    // END - Notification

                }).catch(function () {
                    alert('there was an error');
                });
            });
        });
    </script>
@endsection