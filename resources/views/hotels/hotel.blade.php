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

<body class="hotel-sec">
    <header>
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-3 col-md-3">
                    <a href="/">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="search-section">
        <div class="container">
            <div class="tabs-nav">
                <ul>
                    <li><a class="nav-link-flight" href="{{ route('home') }}">Flights</a></li>
                    <li><a class="active nav-link-hotel" href="{{ route('hotelView') }}">Hotels</a></li>
                    <li><a class="nav-link-car" href="{{ route('carView') }}">Harmain Transport</a></li>
                </ul>
            </div>
            <div class="form-main">
                <form action="{{ route('allHotelPage') }}" method="POST">
                    @csrf
                    <div class="row hotels-search-fields">
                        <div class="field location-field">
                            <label for="wheretostay">Where do you want to stay?</label>
                            <input type="text" class="from-place form-control" name="hotelname" id="wheretostay"
                                placeholder="Enter destination or hotel name" onkeyup="searchHotel(this)" list="hotelsearch">
                                <datalist id="hotelsearch">
                                </datalist>
                        </div>
                        <div class="field depart-field">
                            <div id="check-in" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="depart">Check-in</label>
                                <div>
                                    <input class="form-control" type="text" name="check_in" value="{{ date('Y-m-d') }}"/>
                                    
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field return-field">
                            <div id="check-out" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="check-out">Check-out</label>
                                <div>
                                    <input class="form-control" type="text" name="check_out" value="{{ date('Y-m-d') }}"/>
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="field cabin-class-field">
                            <label for="travellers">
                                Guest And Room
                            </label>
                            <button class="travellers-btn" data-placement="bottom" data-toggle="popover"
                                data-container="body" type="button" data-html="true" id="travellers">
                                <input type="text" readonly="readonly" name="total_room" value="1 Room">
                                <input type="text" readonly="readonly" name="total_adult" value="1 Adult">
                                <input type="text" readonly="readonly" name="total_child" value="1 Children">
                            </button>
                            <div id="popover-content" style="display:none">
                                <div class="room">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="room"><i class="fa fa-bed"></i>Rooms</label>
                                        <div>
                                            <input type='button' value='-' class='roomminus' field='roomquantity' />
                                            <input type='text' disabled name='roomquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='roomplus' field='roomquantity' />
                                        </div>
                                    </div>
                                </div>
                                <div class="adults">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="adults"><i class="fa fa-male"></i>Adults</label>
                                        <div>
                                            <input type='button' value='-' class='adultminus' field='adultquantity' />
                                            <input type='text' disabled name='adultquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='adultplus' field='adultquantity' />
                                        </div>
                                    </div>
                                </div>
                                <div class="child">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="children"><i class="fa fa-child"></i>Children</label>
                                        <div>
                                            <input type='button' value='-' class='childminus' field='childquantity' />
                                            <input type='text' disabled name='childquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='childplus' field='childquantity' />
                                        </div>
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
                        <div class="col-lg-3 offset-lg-9 d-flex justify-content-end p-0">
                            <button class="btn search-flight">
                                Search hotels
                                <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

    @include('_inc/home-sections')

    <script src="{{ asset('assets/js/lib.js') }}"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms&amp;libraries=places">
    </script>
    <script src="{{ asset('assets/js/script.js') }}">
    </script>
    <script>
         function searchHotel(to){
      to = to.value;
      $cLength = to.length;
      if($cLength > 2){
      $.ajax({
        url: "{{ route('hotelSearch') }}",
        type: "GET",
        dataType: "json",
        data: {cityCode:to},
        success: function($result){
          $("#hotelsearch").html('');
         $.each($result,function(item,value){
            $("#hotelsearch").append("<option value='"+value.locationName+" "+value.locationId+"'></option>");
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