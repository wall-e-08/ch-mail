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
                <h2>Thank you for calling 388-CEDA</h2>

                <div id="indicator" class="d-flex justify-content-center py-3">
                    <!--<div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.lang"></div>-->
                    <div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.intro"></div>
                    <div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.main"></div>
                </div>

                <form class="form-inline" action="mail.php" method="POST" v-on:submit="before_form_submition">
                    <div :id="stage.lang" class="w-100" :style="{display: current_stage === stage.lang ? 'block' : 'none'}">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Select Language</div>
                            <div class="card-body">
                                <h5 class="card-title">Would you like to speak in English o en Espanol?</h5>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="form_lang1" name="form_lang" class="custom-control-input" value="English" checked="checked">
                                    <label class="custom-control-label" for="form_lang1">English</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="form_lang2" name="form_lang" class="custom-control-input" value="Spanish">
                                    <label class="custom-control-label" for="form_lang2">Spanish</label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" @click="go_next">Next</button>
                            </div>
                        </div>
                    </div>

                    <div :id="stage.intro" class="w-100" :style="{display: current_stage === stage.intro ? 'block' : 'none'}">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                Intro
                                <p><small class="alert alert-warning p-0">* indicates required field</small></p>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-5">
                                    <label for="form_name" class="col-lg-2 col-form-label justify-content-lg-end justify-content-start align-self-baseline text-lg-right text-left">Name*</label>
                                    <div class="col-lg-8">
                                        <input type="text" data-picker="text" name="form_name" id="form_name" class="form-control w-100" v-model="intro_form.name">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-5">
                                    <label for="form_phone" class="col-lg-2 col-form-label justify-content-lg-end justify-content-start align-self-baseline text-lg-right text-left">Phone*</label>
                                    <div class="col-lg-8">
                                        <input type="text" data-picker="text" name="form_phone" id="form_phone" class="form-control w-100" v-model="intro_form.phone">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-5">
                                    <label for="form_address" class="col-lg-2 col-form-label justify-content-lg-end justify-content-start align-self-baseline text-lg-right text-left">Address*</label>
                                    <div class="col-lg-8">
                                        <textarea name="form_address" id="form_address" class="form-control w-100" v-model="intro_form.address"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-5">
                                    <label for="form_date" class="col-lg-2 col-form-label justify-content-lg-end justify-content-start align-self-baseline text-lg-right text-left">Date*</label>
                                    <div class="col-lg-8">
                                        <input type="text" data-picker="date" name="form_date" id="form_date" class="form-control w-100">
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row mb-5">
                                    <label for="form_call_time" class="col-lg-2 col-form-label justify-content-lg-end justify-content-start align-self-baseline text-lg-right text-left">Call Time*</label>
                                    <div class="col-lg-8">
                                        <input type="text" data-picker="time" name="form_call_time" id="form_call_time" class="form-control w-100">
                                    </div>
                                </div>
                                <hr>
                            
                                <div class="form-group">
                                    <p class="mb-0 mr-5">Were you injured in a Car Accident or a “Slip & Fall”?</p>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="form_accident1" v-model="accident_type" value="ca" name="form_accident" class="custom-control-input" checked="checked">
                                        <label class="custom-control-label" for="form_accident1">Car Accident</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="form_accident2" v-model="accident_type" value="sf" name="form_accident" class="custom-control-input">
                                        <label class="custom-control-label" for="form_accident2">Slip & Fall</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" @click="go_next">Next</button>
                            </div>
                        </div>
                    </div>

                    <div :id="stage.main" class="w-100" :style="{display: current_stage === stage.main ? 'block' : 'none'}">
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                Questions
                                <p><small class="alert alert-warning p-0">* indicates required field</small></p>
                            </div>
                            <template v-if="accident_type == 'ca'">
                                <div class="card-body">
                                    <h5 class="card-title">Accident Details</h5>
                                    <hr>
                                    <table class="table table-bordered mb-5 text-left">
                                        <tr>
                                            <th colspan="2" class="table-secondary text-center heading">Car Accident</th>
                                        </tr>
                                        <tr>
                                            <td class="py-2">What type of accident was it?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_type" placeholder="Car, Motorcycle, Pedestrian, etc">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Was it a strong impact?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_impact">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Were you struck from behind, the side or the front?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_struck">
                                                        <option value="Behind">Behind</option>
                                                        <option value="Side">Side</option>
                                                        <option value="Front">Front</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">How much would you say the property damage is?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_damage">
                                                        <option value="Mild">Mild</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Heavy">Heavy</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Was the rescue or ambulance called?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_rescue">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Did the police go to the scene?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_police">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Did you go to the hospital?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_hospital">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                Do you have a police report?*
                                                <!--<small class="alert alert-warning p-0">(If no police report exists, tell them we can figure that out)</small>-->
                                            </td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_plice_report">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Was there any passengers in the car with you?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_passengers">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                What are your injuries?*
                                                <!--<small class="alert alert-warning p-0">(If patient is injured, make appointment at the nearest CEDA office.)
                                        (Offer transportation. Pickups are available at all locations, based on time
                                        of appointment.)<br>
                                        (Please advise them it is best to evaluate all Injuries as soon as possible.)</small>-->
                                            </td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <textarea name="form_injury" class="form-control border-0"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Who received the ticket?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_ticket">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Do you know what insurance they had?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_their_insurance">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">What’s the name of your vehicle insurance company?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_vehicle_insurance_company">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Do you know what type of car hit you? New car, old car, pickup truck, company truck?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_car_type">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                Was it an Uber or a Lyft?*
                                                <!--<small class="alert alert-warning p-0">(If not sure, tell them it’s ok, we can figure it out.)</small>-->
                                            </td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_car_company">
                                                        <option value="uber">Uber</option>
                                                        <option value="lyft">Lyft</option>
                                                        <option value="notsure">Not Sure</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Would you like to speak to an attorney?</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_attorney">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <template v-for="f in form">
                                            <tr>
                                                <td class="py-2">{{ f.label }}*</td>
                                                <td class="p-0">
                                                    <pre v-if="f.type == 'muted_text'" class="w-100 bg-light border-0 table-active m-0 py-2 px-3 muted-texts">
                                                        {{ selected_location[f.location_obj_key] }}
                                                    <textarea :name="'form_' + f.name" :id="'form_' + f.name" v-model="selected_location[f.location_obj_key]" class="d-none">{{ selected_location[f.location_obj_key] }}</textarea></pre>
                                                    <div v-else-if="f.type == 'select'">
                                                        <select v-model="selected_location" class="form-control w-100 border-0">
                                                            <option v-for="loc in locations" v-bind:value="loc">{{ loc.name }}</option>
                                                        </select>
                                                        <input name="form_apmt_loc_name" type="hidden" class="d-none" v-model="selected_location.name">
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr>
                                            <td class="py-2">
                                                Do you mind telling me how you heard about us?
                                                <small class="alert alert-warning p-0">Radio? Billboard? Bus? TV?</small>
                                            </td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_affiliate">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </template>
                            <template v-else-if="accident_type == 'sf'">
                                <div class="card-body">
                                    <h5 class="card-title">Accident Details</h5>
                                    <hr>
                                    <table class="table table-bordered mb-5 text-left">
                                        <tr>
                                            <th colspan="2" class="table-secondary text-center heading">Slip or Fall</th>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Where did it happen?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_where" placeholder="Did it happen in a store, or in some kind of business?">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Did the manager make a report of the incident?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_manager_report">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Was the rescue or ambulance called?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_rescue">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Did you go to the hospital?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_hospital">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">When did it occur?*</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" data-picker="time" class="form-control border-0" name="form_time">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">
                                                Do you mind telling me how you heard about us?
                                                <small class="alert alert-warning p-0">Radio? Billboard? Bus? TV?</small>
                                            </td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-0" name="form_affiliate">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2">Would you like to speak to an attorney?</td>
                                            <td class="p-0">
                                                <div class="input-group">
                                                    <select class="custom-select border-0" name="form_attorney">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <template v-for="f in form">
                                            <tr>
                                                <td class="py-2">{{ f.label }}*</td>
                                                <td class="p-0">
                                                    <pre v-if="f.type == 'muted_text'" class="w-100 bg-light border-0 table-active m-0 py-2 px-3 muted-texts">
                                                        {{ selected_location[f.location_obj_key] }}
                                                    <textarea :name="'form_' + f.name" :id="'form_' + f.name" v-model="selected_location[f.location_obj_key]" class="d-none">{{ selected_location[f.location_obj_key] }}</textarea></pre>
                                                    <div v-else-if="f.type == 'select'">
                                                        <select v-model="selected_location" class="form-control w-100 border-0">
                                                            <option v-for="loc in locations" v-bind:value="loc">{{ loc.name }}</option>
                                                        </select>
                                                        <input name="form_apmt_loc_name" type="hidden" class="d-none" v-model="selected_location.name">
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </table>
                                </div>
                            </template>
                            
                            <div class="card-footer">
                                <button class="btn btn-success" type="submit" id="submit-btn">
                                    <span>Send Mail</span>
                                    <img src="loading.gif" alt="loading.." class="d-none">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery-ui-timepicker.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>