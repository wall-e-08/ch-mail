var log = console.log;

new Vue({
    el: '#app',
    data: {
        current_stage: "",
        stage: {
            lang: "stage-lang-ques",
            intro: "stage-intro-ques",
            main: "stage-main-ques"
        },
        accident_type: "",  // possible options: ca, sf; ca = car accident, sf = slip and fall
    },
    mounted: function () {
        this.current_stage = this.stage.lang;
        log("Current Stage: " + this.current_stage);
    },
    methods: {
        get_key_by_val(obj, val) {
            return Object.keys(obj).find(key => obj[key] === val)
        },
        get_next_stage(){
            let arr_of_keys = Object.keys(this.stage);
            let i = arr_of_keys.indexOf(this.get_key_by_val(this.stage, this.current_stage));
            return this.stage[arr_of_keys[i + 1]];
        },
        go_next() {
            this.current_stage = this.get_next_stage();
        },
        before_form_submition() {
            var _t = this;

            $('#submit-btn').addClass('disabled').children('img').removeClass('d-none').prev().addClass('d-none');
        },
    },
    watch: {
        current_stage() {
            $('#indicator-' + this.current_stage).removeClass('bg-transparent');
            if(this.current_stage === this.stage.main){
                $("input[data-picker='time']").timepicker({
                    timeFormat: "hh:mm tt"
                });
                $("input[data-picker='date']").datepicker();
            }
        }
    },
});

