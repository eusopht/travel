<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

</head>

<body>
    
    <header class="header-section col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <img src="assets/images/logo.png" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="search-section">
        <div class="container">
            <div class="tabs-nav">
                <ul>
                    <li><a class="nav-link-flight" href="{{ route('home') }}">Flights</a></li>
                    <li><a class=" nav-link-hotel" href="{{ route('hotelView') }}">Hotels</a></li>
                    <li><a class="active nav-link-car" href="{{ route('carView') }}">Car Hire</a></li>
                </ul>
            </div>
            <div class="form-main">

                <div id ="form" class="col-md-12">
                    <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">Enter Location</li>
                                <li>Personal & Contact Details</li>
                                <li>Booking Summary</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Enter Location Details</h2>
                                <div class="row">
                            <div class="form-group col-md-4">
                                <select id="pickup" name="pickup" required >
                                            <option value="Please Select">Please Select Pick Up </option>
                                            <option value="Jeddah Airport">Jeddah Airport</option>
                                            <option value="Makkah Airport">Makkah Airport</option>
                                            <option value="Medinah Airport">Medinah Airport</option>
                                            <option value="Medinah Hotel">Medinah Hotel</option>
                                </select>
                            </div><div class="form-group col-md-4">
                                <select   id="dropoff" name="dropoff" required >
                                            <option value="PleaseSelect">Please Select Drop Off</option>
                                            <option value="JeddahAirport">Jeddah Airport</option>
                                            <option value="MakkahAirport">Makkah Airport</option>
                                            <option value="MedinahAirport">Medinah Airport</option>
                                            <option value="MedinahHotel">Medinah Hotel</option>
                                </select>
                            </div><div class="form-group col-md-4">
                                <input   type="text" id="pickupdate" name="Pickupdate" placeholder="PickUp Date" required />
                            </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Personal and Contact Details</h2>
                                <div class="row">
                                    
                                <div class="form-group col-md-4">
                                <input type="text" id="name" name="name" placeholder="Name" required />
                                </div><div class="form-group col-md-4">
                                <input type="text" id="contactnumber" name="contactnumber" placeholder="Contact Number" required />
                                </div><div class="form-group col-md-4">
                                <input type="text" id="whatsappnumber" name="whatsappnumber" placeholder="Whatsapp Number"/>
                                </div><div class="form-group col-md-4">
                                <input type="text" id="pickuptime" name="pickuptime" placeholder="Pick Up Time" required />
                                </div><div class="form-group col-md-4">
                                <input type="email" id="email" name="email" placeholder="Email" pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                    required/>
                    </div><div class="form-group col-md-4">
                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                            
                                
                                <input type="button" name="next" class="next action-button" value="Next"/>
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Booking Summary</h2>
                                <div id="pickup_d"></div>
                                <div id="dropoff_d"></div>
                                <div id="pcikupdate_d"></div>
                                <div id="name_d"></div>
                                <div id="contactnumber_d"></div>
                                <div id="whatsappnumber_d"></div>
                                <div id="pickuptime_d"></div>
                                <div id="email_d"></div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                            </fieldset>
                        </form>
                    <li id="thanks"></li>
                    </div>
            
                
                        <div id="thanks"></div>

                    </div>
                    <!-- /.MultiStep Form -->

                </div>
        </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/lib.js') }}"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms&amp;libraries=places">
    </script>
    <script src="{{ asset('assets/js/script.js') }}">
    </script>

</body>

</html>