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
    <header>
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-3 col-md-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
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
                <form action="">
                    <div class="type-flight">
                        <div class="field">
                            <input type="radio" name="trip-type" value="return" id="return-radio" />
                            <label for="return">Return</label>
                            <input type="radio" name="trip-type" value="one-way" id="one-way" />
                            <label for="one-way">One Way</label>
                            <input type="radio" name="trip-type" value="multi-city" id="multi-city" />
                            <label for="multi-city">Multi City</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <label for="locationfrom">From</label>
                            <input type="text" class="from-place form-control" id="locationfrom"
                                placeholder="Country, city or airport">
                            <button class="switch" id="switch" type="button" value="Swap">
                                <i class="fa fa-exchange"></i>
                            </button>
                            <div class="airport-check">
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Add nearby
                                    airports</span>
                            </div>
                        </div>
                        <div class="field">
                            <label for="locationto">To</label>
                            <input type="text" class="form-control" id="locationto"
                                placeholder="Country, city or airport">
                            <div class="airport-check">
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Add nearby
                                    airports</span>
                            </div>
                        </div>
                        <div class="field depart-field">
                            <div id="depart" class="input-group date field-c" data-date-format="mm-dd-yyyy">
                                <label for="depart">Depart</label>
                                <div>
                                    <input class="form-control" type="text" name="depart" />
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field return-field">
                            <div id="return" class="input-group date field-c" data-date-format="mm-dd-yyyy">
                                <label for="return">Return</label>
                                <div>
                                    <input class="form-control" type="text" name="return" />
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field cabin-class-field">
                            <label for="travellers">
                                Cabin Class & Travellers
                            </label>
                            <button class="travellers-btn" data-placement="top" data-toggle="popover"
                                data-container="body" type="button" data-html="true" id="travellers">
                                <input type="text" name="total_adult" value="1 Adult">
                                <input type="text" name="total_child" value="1 Children">

                                <input type="text" name="cabin_class" id="cabin-class" value="Economy">
                            </button>
                            <div id="popover-content" style="display:none">
                                <label for="cabin-class">Cabin Class</label>
                                <select id="cabin-class" name="cabin-class">
                                    <option data-cabin-value="Economy" value="Economy">Economy</option>
                                    <option data-cabin-value="Premium Economy" value="Premium Economy">Premium
                                        Economy</option>
                                    <option data-cabin-value="Business Class" value="Business Class">Business Class
                                    </option>
                                    <option data-cabin-value="First Class" value="First Class">First Class</option>
                                </select>
                                <div class="adults">
                                    <label for="adults">Adults</label>
                                    <div class="d-flex align-items-center">
                                        <input type='button' value='-' class='adultminus' field='adultquantity' />
                                        <input type='text' disabled name='adultquantity' value='0' class='qty' />
                                        <input type='button' value='+' class='adultplus' field='adultquantity' />
                                        <span class="ml-2">16+ years</span>
                                    </div>
                                </div>
                                <div class="child">
                                    <label for="children">Children</label>
                                    <div>
                                        <input type='button' value='-' class='childminus' field='childquantity' />
                                        <input type='text' disabled name='childquantity' value='0' class='qty' />
                                        <input type='button' value='+' class='childplus' field='childquantity' />
                                        <span class="ml-2"> 0-15 years</span>
                                    </div>
                                </div>
                                <div class='child-inputs'>

                                </div>
                                <button type="button" id="close" class="closed-pop">
                                    Done
                                </button>
                            </div>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 d-flex align-items-center ">
                            <div>
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Direct Flight Only</span>
                            </div>
                            <div>
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Flexible Ticket only</span>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1 d-flex justify-content-end">
                            <button class="btn search-flight">
                                Search flights
                                <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
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