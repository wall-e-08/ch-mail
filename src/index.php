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
                <!--<form action="mail.php" id="cedahealth-form" class="text-center" method="POST" v-on:submit="before_form_submition">
                    
                    
                    <button class="btn btn-lg btn-success border-0" type="submit" id="submit-btn">
                        <span>Send Mail</span>
                        <img src="loading.gif" alt="loading.." class="d-none">
                    </button>
                </form>-->

                <div id="indicator" class="d-flex justify-content-center py-3">
                    <div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.lang"></div>
                    <div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.intro"></div>
                    <div class="mx-1 rounded-circle border border-secondary bg-secondary bg-transparent" :id="'indicator-' + stage.main"></div>
                </div>

                <form class="form-inline">
                    <div :id="stage.lang" class="w-100" :style="{display: current_stage === stage.lang ? 'block' : 'none'}">
                        <div class="card bg-light mb-3">
                            <div class="card-header">Select Language</div>
                            <div class="card-body">
                                <h5 class="card-title">Would you like to speak in English o en Espanol?</h5>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="form_lang1" name="form_lang" class="custom-control-input" checked="checked">
                                    <label class="custom-control-label" for="form_lang1">English</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="form_lang2" name="form_lang" class="custom-control-input">
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
                            <div class="card-header">Intro</div>
                            <div class="card-body">
                                <h5 class="card-title">Who do I have the pleasure of speaking to?</h5>
                                <hr>
                                <div class="form-group mb-4">
                                    <label for="form_name">1. My name is</label>
                                    <input type="text" name="form_name" id="form_name" class="form-control form-control-sm mx-3">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="form_phn">2. What is the best contact number to reach you?</label>
                                    <input type="text" name="form_phn" id="form_phn" class="form-control form-control-sm mx-3">
                                </div>

                                <div class="form-group">
                                    <p class="mb-0 mr-3">3. Were you injured in a Car Accident or a “Slip & Fall”?</p>
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
                            <div class="card-header">Questions</div>
                            <template v-if="accident_type == 'ca'">
                                <div class="card-body">
                                    <h5 class="card-title">Car Accident</h5>
                                    <hr>
                                    Voila
                                </div>
                            </template>
                            <template v-else-if="accident_type == 'sf'">
                                <div class="card-body">
                                    <h5 class="card-title">poira gesi ga</h5>
                                    <hr>
                                    gg
                                </div>
                            </template>
                            <template v-else>
                                <div class="card-body">
                                    <div class="alert alert-warning">Please select Accident Type</div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-info" type="button" @click="current_stage = stage.intro">Go Back</button>
                                </div>
                            </template>
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