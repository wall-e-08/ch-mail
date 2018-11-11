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

    <script src="js/vue.js"></script>
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 py-5">
                <form action="mail.php" id="cedahealth-form" class="text-center" method="POST" v-on:submit="before_form_submition">
                    <template v-for="(ig, key) in input_groups">
                        <table class="table table-bordered mb-5 text-left">
                            <thead>
                                <tr>
                                    <th colspan="2" class="table-secondary text-center heading">{{ ig.name }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inp in ig.all_inputs">
                                    <td class="py-2">{{ inp.label }}:</td>
                                    <td class="p-0">
                                        <div class="input-group">
                                            <template v-if="key != 'appointment_location'">
                                                <textarea v-if="inp.type == 'textarea'" class="form-control border-0" :name="inp.name"></textarea>
                                                <input v-else :type="inp.type == 'date' || inp.type == 'time' ? 'text' : inp.type" class="form-control border-0" :name="inp.name" :data-picker="inp.type">
                                            </template>
                                            <template v-else>
                                                <pre v-if="inp.type == 'muted_text'" class="w-100 bg-light border-0 table-active m-0 py-2 px-3 muted-texts">{{ selected_location[inp.location_obj_key] }}</pre>
                                                <select v-else-if="inp.type == 'select'" v-model="selected_location" class="custom-select border-0">
                                                    <option v-for="loc in locations" v-bind:value="loc">{{ loc.name }}</option>
                                                </select>
                                                <input v-else :type="inp.type == 'date' || inp.type == 'time' ? 'text' : inp.type" class="form-control border-0" :name="inp.name" :data-picker="inp.type">
                                            </template>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                    
                    <!--hidden inputs-->
                    <input type="hidden" name="apmt_loc_name" id="apmt_loc_name">
                    <input type="hidden" name="apmt_loc_address" id="apmt_loc_address">
                    <input type="hidden" name="apmt_loc_available_time" id="apmt_loc_available_time">
                    
                    <button class="btn btn-lg btn-success border-0" type="submit" id="submit-btn">
                        <span>Send Mail</span>
                        <img src="loading.gif" alt="loading.." class="d-none">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-ui-timepicker.min.js"></script>
<script src="js/scripts2.js"></script>
</body>
</html>