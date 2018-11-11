<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>webform</title>

    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/jquery-ui-timepicker-addon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .carousel-item {
            display: block !important;
            height: 300px;
        }

        .carousel-component {
            position: relative;
            overflow: hidden;
        }

        .carousel-page {
            visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: 0.5s;
            padding: 10px;
            border: 1px solid #EEE;
        }

        .carousel-page h2 {
            margin: 0;
        }

        .carousel-page img {
            width: 300px;
        }

        .carousel-page.active {
            visibility: visible;
            position: static;
        }

        .carousel-nav-prev,
        .carousel-nav-next {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            display: block;
            width: 50px;
            height: 50px;
            border: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #FFF;
            cursor: pointer;
        }

        .carousel-nav-prev {
            left: 5px;
        }

        .carousel-nav-next {
            right: 5px;
        }
    </style>

    <script src="js/vue.js"></script>
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 py-5">
                <div>
                    <carousel-component>
                        <carousel-item>
                            <div class="box bg-primary w-100 h-100"></div>
                        </carousel-item>
                        <carousel-item>
                            <div class="box bg-dark w-100 h-100"></div>
                        </carousel-item>
                        <carousel-item>
                            <div class="box bg-danger w-100 h-100"></div>
                        </carousel-item>
                        <carousel-item>
                            <div class="box bg-warning w-100 h-100"></div>
                        </carousel-item>
                        <carousel-item>
                            <div class="box bg-success w-100 h-100"></div>
                        </carousel-item>
                    </carousel-component>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-ui-timepicker.min.js"></script>
<script type="text/javascript">
    Vue.component('carousel-component', {
        render: function render(createElement) {
            var _this = this;
            return createElement('div', {class: 'carousel-component'},
                this.items.map(function (item, index) {
                    return (
                        createElement('div', {
                                'class': 'carousel-page' + (_this.current === index ? ' active' : ''),
                                style: {
                                    transform: 'translate3d(' + _this.position(index) * 100 + '%, 0, 0)'
                                }
                            },

                            [item]));
                }).concat([
                    createElement('button', {
                            'class': 'carousel-nav-prev',
                            on: {
                                click: function click() {
                                    _this.decreaseCurrent();
                                }
                            }
                        },
                        'Prev'),
                    createElement('button', {
                            'class': 'carousel-nav-next',
                            on: {
                                click: function click() {
                                    _this.increaseCurrent();
                                }
                            }
                        },
                        'Next')]));


        },
        data: function data() {
            return {
                current: 0
            };

        },
        computed: {
            items: function items() {
                return this.$slots.default.filter(function (item) {
                    return item.componentOptions !== undefined &&
                        item.componentOptions.tag === 'carousel-item';
                });
            }
        },

        methods: {
            decreaseCurrent: function decreaseCurrent() {
                this.current += this.items.length - 1;
                this.current %= this.items.length;
            },
            increaseCurrent: function increaseCurrent() {
                this.current += 1;
                this.current %= this.items.length;
            },
            position: function position(index) {
                if (index === this.current) return 0;
                if (index === (this.current + 1) % this.items.length) return 1;
                return -1;
            }
        }
    });


    Vue.component('carousel-item', {
        render: function render(createElement) {
            return createElement('div', {class: 'carousel-item'}, this.$slots.default);
        }
    });

    new Vue({
        el: '#app'
    });
</script>
</body>
</html>