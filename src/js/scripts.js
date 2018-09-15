var log = console.log;

var v_app = new Vue({
    el: '#app',
    data: {
        // all inputs grouped by Patient/Accident/Appointment/Attorney
        input_groups: {
            patient_info: {
                name: "Patient Information",
                all_inputs: [
                    {label: "Refer By", type: "text", name:"refer"},
                    {label: "Call time", type: "time", name:"call_time"},
                    {label: "Name", type: "text", name:"name"},
                    {label: "Date", type: "date", name:"date"},
                    {label: "City", type: "text", name:"city"},
                    {label: "Zip code", type: "text", name:"zip_code"},
                    {label: "Case status", type: "text", name:"case_status"},
                    {label: "Mobile", type: "text", name:"mobile"},
                ]
            },
            accident_info: {
                name: "Accident Information",
                all_inputs: [
                    {label: "Accident Type", type: "text", name:"acc_type"},
                    {label: "Accident Date", type: "text", name:"acc_date"},
                    {label: "Insurance 1", type: "text", name:"ins_1"},
                    {label: "Insurance 2", type: "text", name:"ins_2"},
                    {label: "Description of accident", type: "textarea", name:"acc_description"},
                    {label: "EMT", type: "text", name:"emt"},
                    {label: "Hospital", type: "text", name:"hospital"},
                    {label: "Injuries", type: "text", name:"injuries"},
                    {label: "Property Damage", type: "text", name:"damage"},
                    {label: "Police on Scene", type: "text", name:"police_on_scene"},
                    {label: "Police Report", type: "text", name:"police_report"},
                    {label: "Passengers (If any)", type: "text", name:"passengers"},
                    {label: "Who received Ticket?", type: "text", name:"who_ticket"},
                ]
            },
            appointment_location: {
                // this group using location data next to this variable
                name: "Appointment Information",
                all_inputs: [
                    {label: "Appointment Location", type: "select", name:"apmt_loc_name"},
                    {label: "Location-Address", type: "muted_text", location_obj_key: "address", name:"apmt_loc_address"},
                    {label: "Available Time", type: "muted_text", location_obj_key: "available_time", name:"apmt_loc_available_time"},
                    {label: "Date", type: "date", name:"apmt_date"},
                    {label: "Time", type: "time", name:"apmt_time"},
                ]
            },
            attorney_info: {
                name: "Attorney Information",
                all_inputs: [
                    {label: "Attorney", type: "text", name:"attorney"},
                    {label: "Spoke to", type: "text", name:"spoke_to"},
                    {label: "Notes", type: "textarea", name:"notes"},
                ]
            },
        },

        // CEDA Health locations
        locations: [{
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
            available_time: "Monday-Friday 9:00am-1:00pm/2:30pm-7:00pm  (They close for lunch from 1:00pm-2:30pm)"
        },],
        selected_location: {
            name: "",
            address: "",
            available_time: "",
        },  // initially this is empty, later this will be saved upon select
    },
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

