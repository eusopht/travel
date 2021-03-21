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

<body class="listing-page">
    <header>
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-3 col-md-3">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </header>

    <div class="hotel-listing-header-tab">
        <ul>
            <li><a class="nav-link-flight" href="{{ route('home') }}">Flights</a></li>
            <li><a class="active nav-link-hotel" href="{{ route('hotelView') }}">Hotels</a></li>
            <li><a class="nav-link-car" href="{{ route('carView') }}">Car Hire</a></li>
        </ul>
    </div>
    <div class="hotel-listing-header">
        <div class="form-main">
            <form action="{{ route('allHotelPage') }}" method="POST">
                @csrf
                <div class="row hotels-search-fields">
                    <div class="hotel-listing-field-location">
                        <div class="hotel-input-box">
                            <label for="wheretostaylisting">Where do you want to stay?</label>
                            <input type="text" class="from-place form-control" name="hotelname" id="wheretostaylisting"
                                placeholder="Enter destination or hotel name" value="{{ $hotelname }}" onkeyup="searchHotel(this)" list="hotelsearch">
                                <datalist id="hotelsearch">
                                </datalist>
                        </div>
                    </div>
                    <div class="hotel-listing-field-checkin">
                        <div id="check-in" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                            <div class="hotel-input-box">
                                <label for="depart">Check-in</label>
                                <div>
                                    <input class="form-control" type="text" name="check_in" value="{{ $checkin }}"/>
                                    <span class="input-group-addon icon-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-listing-field-checkout">
                        <div id="check-out" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                            <div class="hotel-input-box">
                                <label for="check-out">Check-out</label>
                                <div>
                                    <input class="form-control" type="text" name="check_out" value="{{ $checkout }}"/>
                                    <span class="input-group-addon icon-calendar"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hotel-listing-field-room">
                        <div class="hotel-input-box">
                            <label for="travellers">
                                Guest And Room
                            </label>
                            <button class="travellers-btn" data-placement="bottom" data-toggle="popover"
                                data-container="body" type="button" data-html="true" id="travellers">
                                <input type="text" readonly="readonly" name="total_room" value="1 Room">
                                <input type="text" readonly="readonly" name="total_adult" value="1 Adult">
                                <input type="text" readonly="readonly" name="total_child" value="1 Children">
                            </button>
                        </div>
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
                    <div class="hotel-listing-field-submit">
                        <button class="btn search-hotel-btn">
                            Search hotels
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="listing-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-left-hotel">
                        <div id="filters-container" class="">
                            <div class="">
                                <div class="">
                                    <span class="filter_head"><i class="fa fa-mobile"></i>Book with peace of mind</span>
                                </div>
                                <label for="free_cancellation">
                                    <div>
                                        <input type="checkbox" class="" name="free_cancellation" id="free_cancellation">
                                        <span class="">Free cancellation</span>
                                    </div>
                                    <span class="count_small">6</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">View price as</span>
                                </div>
                                <div class="">
                                    <select class="" id="priceType" name="priceType">
                                        <option value="total">Total stay</option>
                                        <option value="price-per-night">Per night</option>
                                    </select>
                                    <label for="PR_BK_0">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_0" id="PR_BK_0">
                                            <span class="">Rs 5,725 - Rs 6,800</span>
                                        </div>
                                        <span class="count_small">4</span>
                                    </label>
                                    <label for="PR_BK_1">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_1" id="PR_BK_1">
                                            <span class="">Rs 6,800 - Rs 7,875</span>
                                        </div>
                                        <span class="count_small">0</span>
                                    </label>
                                    <label for="PR_BK_2">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_2" id="PR_BK_2">
                                            <span class="">Rs 7,875 - Rs 8,950</span>
                                        </div>
                                        <span class="count_small">0</span>
                                    </label>
                                    <label for="PR_BK_3">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_3" id="PR_BK_3">
                                            <span class="">Rs 8,950 - Rs 10,025</span>
                                        </div>
                                        <span class="count_small">2</span>
                                    </label>
                                    <label for="PR_BK_4">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_4" id="PR_BK_4">
                                            <span class="">Rs 10,025 - Rs 11,100</span>
                                        </div>
                                        <span class="count_small">0</span>
                                    </label>
                                    <label for="PR_BK_5">
                                        <div>
                                            <input type="checkbox" class="" name="PR_BK_5" id="PR_BK_5">
                                            <span class="">Rs 11,100 +</span>
                                        </div>
                                        <span class="count_small">3</span>
                                    </label>
                                    <div class="price-cont-left">
                                        <input class="" name="price_min" id="price_min" type="number" placeholder="Rs "
                                            inputmode="numeric" value="">
                                        <span class=""> - </span>
                                        <input class="" name="price_max" id="price_max" type="number" placeholder="Rs "
                                            inputmode="numeric" value="">
                                        <button type="button" class="search-icon-btn">
                                            <span><i class="fa fa-search"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Star rating</span>
                                </div>
                                <label for="5">
                                    <div>
                                        <input type="checkbox" class="" name="5" id="5">
                                        <span class="">5 stars</span>
                                        <div class="rate_star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="4">
                                    <div>
                                        <input type="checkbox" class="" name="4" id="4">
                                        <span class="">4 stars</span>
                                        <div class="rate_star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="3">
                                    <div>
                                        <input type="checkbox" class="" name="3" id="3">
                                        <span class=" ">3 stars</span>
                                        <div class="rate_star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="count_small">3</span>
                                </label>
                                <label for="2">
                                    <div>
                                        <input type="checkbox" class="" name="2" id="2">
                                        <span class=" ">2 stars</span>
                                        <div class="rate_star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="count_small">2</span>
                                </label>
                                <label for="1">
                                    <div>
                                        <input type="checkbox" class="" name="1" id="1">
                                        <span class="">1 stars</span>
                                        <div class="rate_star">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="0">
                                    <div>
                                        <input type="checkbox" class="" name="0" id="0">
                                        <span class=" ">Unrated</span>
                                        <div class=""></div>
                                    </div>
                                    <span class="count_small">4</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Accommodation type</span>
                                </div>
                                <label for="Hotel">
                                    <div>
                                        <input type="checkbox" class="" name="Hotel" id="Hotel">
                                        <span class="">Hotel</span>
                                    </div>
                                    <span class="count_small">4</span>
                                </label>
                                <label for="ResidenceHotel">
                                    <div>
                                        <input type="checkbox" class="" name="ResidenceHotel" id="ResidenceHotel">
                                        <span class="">Residence hotel</span>
                                    </div>
                                    <span class="count_small">3</span>
                                </label>
                                <label for="GuestHouse">
                                    <div>
                                        <input type="checkbox" class="" name="GuestHouse" id="GuestHouse">
                                        <span class="">Guest house</span>
                                    </div>
                                    <span class="count_small">2</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Cancellation policy</span>
                                </div>
                                <label for="free_cancellation1">
                                    <div>
                                        <input type="checkbox" class="" name="free_cancellation1"
                                            id="free_cancellation1">
                                        <span class="">Free cancellation</span>
                                    </div>
                                    <span class="count_small">6</span>
                                </label>
                                <label for="non_refundable">
                                    <div>
                                        <input type="checkbox" class="" name="non_refundable" id="non_refundable">
                                        <span class="">Non refundable</span>
                                    </div>
                                    <span class="count_small">3</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Meal plan</span>
                                </div>
                                <label for="breakfast_included">
                                    <div>
                                        <input type="checkbox" class="" name="breakfast_included"
                                            id="breakfast_included">
                                        <span class="">Breakfast included</span>
                                    </div>
                                    <span class="count_small">2</span>
                                </label>
                                <label for="RoomRates_label_mealsNotIncluded">
                                    <div>
                                        <input type="checkbox" class="" name="RoomRates_label_mealsNotIncluded"
                                            id="RoomRates_label_mealsNotIncluded">
                                        <span class="">Meals not included</span>
                                    </div>
                                    <span class="count_small">6</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Guest rating</span>
                                </div>
                                <label for="5.0">
                                    <div>
                                        <input type="checkbox" class="" name="5.0" id="5.0">
                                        <span class="rating_guest">5.0+</span>
                                        <span class="">With honours</span>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="4.5">
                                    <div>
                                        <input type="checkbox" class="" name="4.5" id="4.5">
                                        <span class="rating_guest">4.5+</span>
                                        <span class="">Excellent</span>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="4.0">
                                    <div>
                                        <input type="checkbox" class="" name="4.0" id="4.0">
                                        <span class="rating_guest">4.0+</span>
                                        <span class="">Very good</span>
                                    </div>
                                    <span class="count_small">1</span>
                                </label>
                                <label for="3.5">
                                    <div>
                                        <input type="checkbox" class="" name="3.5" id="3.5">
                                        <span class="rating_guest_low">3.5+</span>
                                        <span class="">Good</span>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                                <label for="3.0">
                                    <div>
                                        <input type="checkbox" class="" name="3.0" id="3.0">
                                        <span class="rating_guest_low">3.0+</span>
                                        <span class="">Satisfactory</span>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Deals</span>
                                </div>
                                <label for="cug_exclusive">
                                    <div>
                                        <input type="checkbox" class="" name="cug_exclusive" id="cug_exclusive">
                                        <span class="">Only show discounts</span>
                                    </div>
                                    <span class="count_small">0</span>
                                </label>
                            </div>
                            <div class="amenties-main">
                                <div class="amenties">
                                    <span class="filter_head">Amenities</span>
                                    <button type="button" class="">
                                        <span class=" ">See more</span>
                                    </button>
                                </div>
                                <div class="">
                                    <label for="WifiService">
                                        <div>
                                            <input type="checkbox" class="" name="WifiService" id="WifiService">
                                            <span class=""><i class="fa fa-wifi"></i>WiFi</span>
                                        </div>
                                        <span class="count_small">7</span>
                                    </label>
                                    <label for="AirportShuttleService">
                                        <div>
                                            <input type="checkbox" class="" name="AirportShuttleService"
                                                id="AirportShuttleService">
                                            <span class=""><i class="fa fa-truck"></i>Airport shuttle</span>
                                        </div>
                                        <span class="count_small">5</span>
                                    </label>
                                    <label for="Parking">
                                        <div>
                                            <input type="checkbox" class="" name="Parking" id="Parking">
                                            <span class=""><i class="fa fa-parking">P</i>Parking</span>
                                        </div>
                                        <span class="count_small">8</span>
                                    </label>
                                    <label for="FrontDesk24hService">
                                        <div>
                                            <input type="checkbox" class="" name="FrontDesk24hService"
                                                id="FrontDesk24hService">
                                            <span class=""><i class="fa fa-female"></i>Front desk 24
                                                hour</span>
                                        </div>
                                        <span class="count_small">5</span>
                                    </label>
                                    <label for="Bar">
                                        <div>
                                            <input type="checkbox" class="" name="Bar" id="Bar">
                                            <span class=""><i class="fa fa-beer"></i>Bar</span>
                                        </div>
                                        <span class="count_small">1</span>
                                    </label>
                                    <label for="DisabledFacility">
                                        <div>
                                            <input type="checkbox" class="" name="DisabledFacility"
                                                id="DisabledFacility">
                                            <span class=""><i class="fa fa-wheelchair"></i>Disabled facilities</span>
                                        </div>
                                        <span class="count_small">1</span>
                                    </label>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="filter_head">Neighbourhoods</span>
                                </div>
                                <div class="">
                                    <label for="204209135">
                                        <div>
                                            <input type="checkbox" class="" name="204209135" id="204209135">
                                            <span class="">Gulshan-e-Iqbal</span>
                                        </div>
                                        <span class="count_small">1</span>
                                    </label>
                                    <label for="204210013">
                                        <div>
                                            <input type="checkbox" class="" name="204210013" id="204210013">
                                            <span class="">Defence Housing Authority</span>
                                        </div>
                                        <span class="count_small">1</span>
                                    </label>
                                </div>
                            </div>
                            {{-- <div class="fixed-footer-left">
                                <button type="button" class="clear-fixed">Clear</button>
                                <button type="button" class="result-fixed" id="btnShowResultButton">
                                    Show 9 results
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div>
                        <p class="head_text ">354 hotels found in Japan <i class="fa fa-info-circle custom_tooltip">
                                <span class="texttooltip">
                                    <strong>
                                        Where do we get our search results?<br>
                                    </strong>
                                    Some of our partners pay us a referral fee but this never affects how we rank
                                    hotels.<br>
                                    <br>
                                    We check millions of hotels around the world to give you the most relevant results
                                    for
                                    your
                                    search, but these don’t always include every room or offer available.
                                </span>
                            </i>

                        </p>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active tooltip-custom" data-toggle="tab" href="#tabs-1" role="tab">Best
                                <i class="fa fa-exclamation-circle"></i>
                                <span class="tooltiptext">
                                    <strong>
                                        What’s our idea of a 'Best' order?<br>
                                    </strong>
                                    We think these hotels offer the combination of factors you’ll find most important.
                                    These include customer reviews, price and location.<br>
                                    <br>
                                    We may personalise your results based on previous search activity, if your
                                    preferences allow.
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Guest rating</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">Stars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">Distance</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">      
                        @foreach ($res as $key => $items)
                        @foreach ($items->result as $key => $item)
                        @if (isset($item))
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="hotel_card">
                                <div class="hotel_card_left">
                                    <div class="img_hotel" style="background-image: url(https://photo.hotellook.com/image_v2/limit/h{{ $item->id }}/640/480.jpg);">
                                     {{-- <img src="" alt=""> --}}
                                    </div>
                                </div>
                                <div class="hotel_card_center">
                                    <div class="hotel_info_header">
                                        <div class="card_title">
                                            <h2>{{ $item->name }}</h2>
                                            <div class="star_container">
                                            @for ($i = 1; $i < $item->stars; $i++)
                                            <i class="fa fa-star"></i>
                                            @endfor
                                            </div>
                                        </div>
                                        <span><i class="fa fa-map-pin"></i>{{ $item->address }}</span>
                                    </div>
                                    <div class="hotel_card_main_content">
                                        <div class="hotel_card_rating">
                                            <span class="points_rating">{{ $item->rating }}</span>
                                            <div>
                                                <span class="green_dots"></span>
                                                <span>2 reviews</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="review_section">
                                        <span><i class="fa fa-thumbs-up"></i>Cleanliness 4.5/5</span>
                                        <span><i class="fa fa-thumbs-up"></i>Location 4.5/5</span>
                                    </div>
                                    <div class="hotel_info_footer">
                                        <a href="">
                                            <div class="company_sec">
                                                <span>Agoda<i class="fa fa-external-link"></i></span>
                                                <div class="price_container">
                                                    <span>Rs</span>
                                                    <span>
                                                        14,123
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="company_sec">
                                                <span>Agoda<i class="fa fa-external-link"></i></span>
                                                <div class="price_container">
                                                    <span>Rs</span>
                                                    <span>
                                                        14,123
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="company_sec">
                                                <span>Agoda<i class="fa fa-external-link"></i></span>
                                                <div class="price_container">
                                                    <span>Rs</span>
                                                    <span>
                                                        14,123
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="">
                                            <div class="company_sec">
                                                <span>Agoda<i class="fa fa-external-link"></i></span>
                                                <div class="price_container">
                                                    <span>Rs</span>
                                                    <span>
                                                        14,123
                                                    </span>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="hotel_card_right">
                                    {{-- @foreach ($res[0]->result as $key => $item)
                                @foreach ($item->rooms as $key => $rooms) --}}
                                    <div>
                                        <span>
                                            <strong>Lowest Price</strong>
                                            <p> we found for this hotel</p>
                                        </span>
                                        <img src="../assets/images/company_logo.png" alt="">
                                        <div class="price-container">
                                            <div>
                                                <span class="currency">Rs</span>
                                                <span class="price">{{ $item->price }}</span>
                                            </div>
                                        </div>
                                        <span class="stay_duration">a night</span>
                                        <p>
                                            <strong>
                                                <span class="currency">Rs</span>
                                                <span class="price">{{ $item->price }}</span>
                                            </strong>
                                            <span>
                                                total stay
                                            </span>
                                        <p>
                                            All taxes and fees included, except local tax if applicable
                                        </p>
                                        </p>
                                    </div>
                                    {{-- @endforeach
                                    @endforeach --}}
                                  <a class="go_to_site" href="{{ $item->fullUrl }}" target="_blank">Go to site</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="right-sidebar">
                        <a>
                            <div class="hotel-ads">
                                <span>Fri, 19 Mar Sat, 20 Mar</span>
                                <span>More than just a room</span>
                                <ul>
                                    <li>
                                        <span><i class="fa fa-check"></i></span>
                                        <span>
                                            Free cancellation
                                        </span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-check"></i></span>
                                        <span>Cleanliness 5/5</span>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-check"></i></span>
                                        <span>Central location</span>
                                    </li>
                                </ul>
                                <button type="button"> hotels</button>
                            </div>
                        </a>
                        <a>
                            <div class="car-hire-ads">
                                <div class="car-hire">
                                    <h3>Need car hire in Gilgit?</h3>
                                </div>
                                <div class="footer-cont">
                                    <img src="" alt="" class="logo-ad">
                                    <button type="button"> Find a car</button>
                                </div>
                            </div>
                        </a>
                        <a>
                            <div class="flight-ads">
                                <div class="ad-header">
                                    <span class="ad-title">faremaker.com</span>
                                    <span class="ad-tag">Ad</span>
                                </div>
                                <span>0311 12312112</span>
                                <span class="city-ad">Karachi</span>
                                <h3>Cheap Flights From Lahore - 24/7 Travel Services</h3>
                                <p> Buy Online Air Tickets On Cheap Rates. Try Faremakers For Great Deals. </p>
                                <div class="d-flex justify-content-center">

                                    <button type="button"> Visit Site</button>
                                </div>
                            </div>
                        </a>

                    </div>
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
       $("#hotelsearch").append("<option value='"+value.fullName+"'>"+value.locationName+"</option>");
       $('#id').val(value.id);


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