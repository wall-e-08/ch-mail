var log = console.log;

new Vue({
    el: '#app',
    
    mounted: function(){
        $("input[data-picker='time']").timepicker({
            timeFormat: "hh:mm tt"
        });
        $("input[data-picker='date']").datepicker();
    },
    methods: {
        before_form_submition: function(){
            var _t = this;
            
            $('#submit-btn').addClass('disabled').children('img').removeClass('d-none').prev().addClass('d-none');

            $("#apmt_loc_name").val(_t.selected_location.name);
            $("#apmt_loc_address").val(_t.selected_location.address);
            $("#apmt_loc_available_time").val(_t.selected_location.available_time);
        },
    }
});

