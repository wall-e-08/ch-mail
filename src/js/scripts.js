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
        form: [{
                label: "Appointment Location Name",
                name: "apmt_loc_name",
                type: "select",
                placeholder: "",
            }, {
                label: "Appointment Address",
                type: "muted_text",
                location_obj_key: "address",
                name: "apmt_loc_address"
            }, {
                label: "Appointment Available Time",
                type: "muted_text",
                location_obj_key: "available_time",
                name: "apmt_loc_available_time"
            },
        ],

        // Appointment locations
        locations: [
            {
            name: "Cutler Bay",
            address: "10974 SW 184th Street\n" +
                "Cutler Bay, Florida  33157\n" +
                "Phone: 305-363-1366",
            available_time: "Monday/Wednesday/Friday – 10:00am-8:00pm\n" +
                "Tuesday/Thursday – 2:00pm-8:00pm\n" +
                "Saturday – 10:00am-1:00pm"
        }, {
            name: "Hialeah",
            address: "755 East 49th Street\n" +
                "Hialeah, Florida  33013\n" +
                "Phone: 305-558-5432",
            available_time: "Monday/Wednesday/Friday – 10:00am-8:00pm\n" +
                "Tuesday/Thursday – 2:00pm-8:00pm\n" +
                "Saturday – 10:00am-1:00pm"
        }, {
            name: "Downtown/Little Havana",
            address: "2190 W. Flagler Street\n" +
                "Miami, Florida  33135\n" +
                "Phone: 305-441-9918",
            available_time: "Monday/Wednesday/Friday – 10:00am-8:00pm\n" +
                "Tuesday/Thursday – 2:00pm-8:00pm\n" +
                "Saturday – 10:00am-1:00pm"
        }, {
            name: "FIU/Kendall",
            address: "11890 SW 8th Street,\n" +
                "Suite 400\n" +
                "Miami, Florida 33184\n" +
                "Phone: 305-685-9771",
            available_time: "Monday/Wednesday/Friday – 10:00am-8:00pm\n" +
                "Tuesday/Thursday – 2:00pm-8:00pm\n" +
                "Saturday – 10:00am-1:00pm"
        }, {
            name: "South Miami/Coral Gables",
            address: "6303 SW 40th Street\n" +
                "Miami, Florida  33155\n" +
                "Phone: 305-669-1808",
            available_time: "Monday/Wednesday/Friday – 10:00am-8:00pm\n" +
                "Tuesday/Thursday – 2:00pm-8:00pm\n" +
                "Saturday – 10:00am-1:00pm"
        }, {
            name: "Blue Lagoon/CEDA Ortho Group",
            address: "Dr. Roberto Moya/Dr. Nestor Javech\n" +
                "815 NW 57th Avenue\n" +
                "Suite 202\n" +
                "Miami, Florida  33126\n" +
                "Phone: 305-669-1808",
            available_time: "Monday/Tuesday/Thursday/Friday – 10:00am-6:00pm\n" +
                "Thursday 12:00pm-6:00pm"
        }, {
            name: "Hollywood",
            address: "Icon Medical – Affiliate\n" +
                "3625 Hollywood Blvd.\n" +
                "Hollywood, Florida  33021",
            available_time: "Monday-Friday 10:00am-7:00pm"
        }, {
            name: "Florida Wellness",
            address: "207 N. Krome Avenue,\n" +
                "Homestead, Florida  33030\n" +
                "Phone: 305-246-0056",
            available_time: "Monday-Friday 9:00am-1:00pm/2:30pm-7:00pm \n" +
                "(They close for lunch from 1:00pm-2:30pm)"
        },],
        
        // form data
        selected_location: {
            name: "",
            address: "",
            available_time: "",
        },  // initially this is empty, later this will be saved upon select
        
         intro_form: {
            name: "",
            phone: "",
            address: "",
         },
    },
    mounted: function () {
        $("input[data-picker='time']").timepicker({
            timeFormat: "hh:mm tt"
        });
        $("input[data-picker='date']").datepicker();

        this.current_stage = this.stage.intro;
        log("Current Stage: " + this.current_stage);
    },
    methods: {
        get_key_by_val(obj, val) {
            return Object.keys(obj).find(key => obj[key] === val)
        },
        get_next_stage() {
            let arr_of_keys = Object.keys(this.stage);
            let i = arr_of_keys.indexOf(this.get_key_by_val(this.stage, this.current_stage));
            return this.stage[arr_of_keys[i + 1]];
        },
        go_next() {
            if(this.current_stage === this.stage.intro) {
                for (let key in this.intro_form) {
                    if (!this.intro_form[key]) {
                        log(key)
                        alert("Please fill all fields");
                        return false;
                    }
                }
                if(!document.getElementById('form_date').value || !document.getElementById('form_call_time').value){
                    alert("Please fill all fields");
                    return false;
                }
                if (!this.accident_type) {
                    alert("Please select accident type");
                    return false;
                }
            }
            this.current_stage = this.get_next_stage();
        },
        before_form_submition() {
            $('#submit-btn').addClass('disabled').children('img').removeClass('d-none').prev().addClass('d-none');

            var _t = this;
            $("#apmt_loc_name").val(_t.selected_location.name);
            $("#apmt_loc_address").val(_t.selected_location.address);
            $("#apmt_loc_available_time").val(_t.selected_location.available_time);
        },
    },
    watch: {
        current_stage() {
            $('#indicator-' + this.current_stage).removeClass('bg-transparent');
            if (this.current_stage === this.stage.main) {
                $("input[data-picker='time']").timepicker({
                    timeFormat: "hh:mm tt"
                });
                $("input[data-picker='date']").datepicker();
            }
        }
    },
});

