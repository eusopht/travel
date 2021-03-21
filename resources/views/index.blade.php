<!DOCTYPE html>

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
                    <li><a class="active nav-link-flight" href="{{ route('home') }}">Flights</a></li>
                    <li><a class=" nav-link-hotel" href="{{ route('hotelView') }}">Hotels</a></li>
                    <li><a class=" nav-link-car" href="{{ route('carView') }}">Harmain Transport</a></li>
                </ul>
            </div>
            <div class="form-main">
            <form action="{{ route('searchFlights') }}" method="GET">
                    <div class="type-flight">
                        <div class="field trip-type">
                            <input type="radio" checked="checked" name="trip-type" value="return" id="return-radio" />
                            <label for="return">Return</label>
                            <input type="radio" name="trip-type" value="One Way" id="one-way" />
                            <label for="one-way">One Way</label>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="field">
                            <label for="locationfrom">From</label>
                            <input type="text" list="froms" name="from" class="from-place form-control" id="locationfrom"
                                placeholder="Country, city or airport" onkeyup="searchAirportsFrom(this)">
                                <datalist id="froms" >
                                </datalist>
                            <button class="switch" id="switch" type="button" value="Swap">
                                <i class="fa fa-exchange"></i>
                            </button>
                           
                        </div>
                        <div class="field">
                            <label for="locationto">To</label>
                            <input type="text" list="tos" name="to" class="form-control" id="locationto"
                                placeholder="Country, city or airport" onkeyup="searchAirportsTo(this)">
                                <datalist id="tos">
                                </datalist>
                            
                        </div>
                        <div class="field depart-field">
                            <div id="depart" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="depart">Depart</label>
                                <div>
                                    <input class="form-control" type="text" name="depart" id="depart-input" />
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field return-field">
                            <div id="return" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="return">Return</label>
                                <div>
                                    <input value="" class="form-control" type="text" name="return" id="return-input" />
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
                                <input type="text" readonly="readonly" name="total_adult" value="1 Adult">
                                <input type="text" readonly="readonly" name="total_child" value="1 Children">
                                <input type="text" readonly="readonly" name="cabin_class" id="cabin-class"
                                    value="Economy">
                            </button>
                            <div id="popover-content" style="display:none">
                                <label for="cabin-class">Cabin Class</label>
                                <select id="cabin-class">
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
                                        <input type='text' disabled name='adultquantity' value='1' class='qty' />
                                        <input type='button' value='+' class='adultplus' field='adultquantity' />
                                        <span class="ml-2">16+ years</span>
                                    </div>
                                </div>
                                <div class="child">
                                    <label for="children">Children</label>
                                    <div>
                                        <input type='button' value='-' class='childminus' field='childquantity' />
                                        <input type='text' disabled name='childquantity' value='1' class='qty' />
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
                    <div class="row main-from-bottom">
                        <div class="col-lg-7 d-flex align-items-center mbl-check-main-form">
                            <div class="direct-flight-check">
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Direct Flight Only</span>
                            </div>
                            <div class="direct-flight-check">
                                <input type="checkbox" name="near-by">
                                <span class="check-span">Flexible Ticket only</span>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-end mbl-check-main-submit">
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

    <?php // incude('./_inc/home-sections.blade.php') ?>

    <section class="cities-section">
        <div class="container">
            <div class="col-md-12">
                <div class="hed  text-center">
                    <h2>Trending Cities</h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa.</p>
                </div>

                <div class="body col-md-12">
                    <div class="row">
                        <div class="cities-box col-md-4">
                            <a href="#">
                                <img src="assets/images/cities/1.jpg" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-4 cities-box cities--2">
                            <a href="#">
                                <img src="assets/images/cities/2.jpg" alt="">
                            </a>
                            <a href="#">
                                <img src="assets/images/cities/3.jpg" alt="">
                            </a>
                        </div>
                        
                        <div class="col-md-4 cities-box">
                            <a href="#">
                                <img src="assets/images/cities/4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--section class="destinations-area">
        <div class="container">
                <div class="hed text-center">
                    <h2>Flights Deals by Destination</h2>
                    <p>Find and compare flights</p>
                </div>

                <p class="lead">
                We search and compared billions of real-times on plane tickets so you can easily find the cheapest, quickest and best flights deals for you.
                </p>

            <div class="body">
                <ul>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                    <li>Lahore Flights</li>
                    <li>Karachi Flights</li>
                    <li>Multan Flights</li>
                </ul>
            </div>
        </div>
    </section-->


    <script src="{{ asset('assets/js/lib.js') }}"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms&amp;libraries=places">
    </script>
    <script src="{{ asset('assets/js/script.js') }}">
    </script>
<script>
    function searchAirportsFrom(froms){
      froms = froms.value;
      $cLength = froms.length;
      var keFired = false;
      if($cLength > 2){
       $.ajax({
        url: "{{ route('getAirports') }}",
        type: "GET",
        dataType: "json",
        data: {cityCode:froms},
        success: function($result){
          $("#froms").html('');
         $.each($result,function(item,value){
            $("#froms").append("<option value='"+value.city_name+' ('+value.code+")'>"+value.name+"</option>");
         });
         
        }
      });
    }
    }
function searchAirportsTo(to){
  to = to.value;
  $cLength = to.length;
  if($cLength > 2){
  $.ajax({
    url: "{{ route('getAirports') }}",
    type: "GET",
    dataType: "json",
    data: {cityCode:to},
    success: function($result){
      $("#tos").html('');
     $.each($result,function(item,value){
        $("#tos").append("<option value='"+value.city_name+' ('+value.code+")'>"+value.name+"</option>");
     });
    }
  });
  }else{
    $("#tos").html('');
  }
}
  </script>
</body>

</html>