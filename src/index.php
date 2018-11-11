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
                    <div class="indicator mx-1 rounded-circle border border-secondary bg-secondary"></div>
                    <div class="indicator mx-1 rounded-circle border border-secondary bg-secondary bg-transparent"></div>
                    <div class="indicator mx-1 rounded-circle border border-secondary bg-secondary bg-transparent"></div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Select Language</div>
                    <div class="card-body">
                        <h5 class="card-title">Would you like to speak in English o en Espanol?</h5>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">English</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                   class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Spanish</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Next</button>
                    </div>
                </div>
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