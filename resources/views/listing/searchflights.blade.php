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
   <body class="listing-page result-page">

   @include('_inc/header')


      <section class="listing-sec">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-9">
                  <div class="header-sec">
                     <div class="accordion" id="exampleAccordion">
                        <div class="card">
                           <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                              data-target="#header-search-list" aria-expanded="false"
                              aria-controls="header-search-list">
                              <div class="row">
                                 <div class="col-md-6 d-flex align-items-center">
                                    <div class="search-icon"><i class="fa fa-search"></i></div>
                                    <div class="d-flex flex-column list-header">
                                       <div>
                                          <span class="from-place">{{ $fromController }}</span> -
                                          <span class="from-place">{{ $toController }}</span>
                                       </div>
                                       <div>
                                          <span class="pessenger-count">{{ $adultController }}</span> |
                                          <span class="class-type">{{ $flightClassController }}</span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3 d-flex align-items-center">
                                    <div id="depart-list" class="input-group date field-c"
                                       data-date-format="yyyy-mm-dd">
                                       <div>
                                          <input class="form-control" type="text" name="departs" value="{{ $depDateController }}"/>
                                          <span class="input-group-addon icon-calendar"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-3 d-flex align-items-center">
                                    <div id="return-list" class="input-group date field-c"
                                       data-date-format="yyyy-mm-dd">
                                       <div>
                                          <input class="form-control" type="text" name="returns" value="{{ $retDateController }}"/>
                                          <span class="input-group-addon icon-calendar"></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </button>
                           <div id="header-search-list" class="collapse" aria-labelledby="exItem1Header"
                              data-parent="#exampleAccordion">
                              <div class="card-body ">
                                 <div class="form-main">
                                    <form action="{{ route('searchFlights') }}" method="GET">
                                       <div class="type-flight">
                                          <div class="field ">
                                             <input type="radio" name="trip-type" value="return"
                                                id="return-radio" />
                                             <label for="return">Return</label>
                                             <input type="radio" name="trip-type" value="one-way"
                                                id="one-way" />
                                             <label for="one-way">One Way</label>
                                             <input type="radio" name="trip-type" value="multi-city"
                                                id="multi-city" />
                                             <label for="multi-city">Multi City</label>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class=" col-md-6">
                                             <label for="locationfrom">From</label>
                                             <input type="text" list="froms" name="from" value="{{ $fromController }}" class="from-place form-control"
                                                id="locationfrom" placeholder="Country, city or airport" onkeyup="searchAirportsFrom(this)">
                                             <datalist id="froms" >
                                             </datalist>
                                             <button class="switch" id="switch" type="button" value="Swap">
                                             <i class="fa fa-exchange"></i>
                                             </button> 
                                          </div>
                                          <div class=" col-md-6">
                                             <label for="locationto">To</label>
                                             <input type="text" list="tos" name="to" value="{{ $toController }}" class="form-control" id="locationto"
                                                placeholder="Country, city or airport" onkeyup="searchAirportsTo(this)">
                                             <datalist id="tos">
                                             </datalist> 
                                          </div>
                                          <div class="  col-md-3">
                                             <div id="depart" class="input-group date field-c"
                                                data-date-format="yyyy-mm-dd">
                                                <label for="depart">Depart</label>
                                                <div>
                                                   <input class="form-control" type="text" name="depart" value="{{ $depDateController }}"/>
                                                   <span class="input-group-addon icon-calendar"><i
                                                      class="fa fa-calendar"></i></span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="  col-md-3">
                                             <div id="return" class="input-group date field-c"
                                                data-date-format="yyyy-mm-dd">
                                                <label for="return">Return</label>
                                                <div>
                                                   <input class="form-control" type="text" name="return" value="{{ $retDateController }}" />
                                                   <span class="input-group-addon icon-calendar"><i
                                                      class="fa fa-calendar"></i></span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="  col-md-6">
                                             <label for="travellers">
                                             Cabin Class & Travellers
                                             </label>
                                             <button class="travellers-btn" data-placement="top"
                                                data-toggle="popover" data-container="body" type="button"
                                                data-html="true" id="travellers">
                                             <input type="text" name="total_adult" value="{{ $adultController }}">
                                             <input type="text" name="total_child" value="{{ $childController }}">
                                             <input type="text" name="cabin_class" value="{{ $flightClassController }}" id="cabin-type" value="Economy">
                                             </button>
                                             <div id="popover-content" style="display:none">
                                                <label for="cabin-class">Cabin Class</label>
                                                <select id="cabin-class" name="cabin-class">
                                                   <option data-cabin-value="Economy" value="Economy">
                                                      Economy
                                                   </option>
                                                   <option data-cabin-value="Premium Economy"
                                                      value="Premium Economy">Premium
                                                      Economy
                                                   </option>
                                                   <option data-cabin-value="Business Class"
                                                      value="Business Class">Business Class
                                                   </option>
                                                   <option data-cabin-value="First Class"
                                                      value="First Class">First Class</option>
                                                </select>
                                                <div class="adults">
                                                   <label for="adults">Adults</label>
                                                   <div class="d-flex align-items-center">
                                                      <input type='button' value='-' class='adultminus'
                                                         field='adultquantity' />
                                                      <input type='text' disabled name='adultquantity'
                                                         value='0' class='qty' />
                                                      <input type='button' value='+' class='adultplus'
                                                         field='adultquantity' />
                                                      <span class="ml-2">16+ years</span>
                                                   </div>
                                                </div>
                                                <div class="child">
                                                   <label for="children">Children</label>
                                                   <div>
                                                      <input type='button' value='-' class='childminus'
                                                         field='childquantity' />
                                                      <input type='text' disabled name='childquantity'
                                                         value='0' class='qty' />
                                                      <input type='button' value='+' class='childplus'
                                                         field='childquantity' />
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
                        </div>
                     </div>
                  </div>
                  <div class="filter-top">
                     <div class="filter-links">
                        <a href="">Show whole month
                        </a>
                        <a href="">Additional bag fees may apply</a>
                     </div>
                     <div class="d-flex0 justify-content-between row">
                        <div class="btnss col-md-6 p-0">
                           <button><i class="fa fa-bell"></i>Get Price Alert</button>
                           <button class="list-result">1 Result</button>
                        </div>
                        <div class="sort-list col-md-6">
                           <span>Sort by</span>
                           <select id="cabin-class" name="cabin-class">
                              <option data-cabin-value="Best" value="Best">Best</option>
                              <option data-cabin-value="Cheapest First" value="Cheapest First">Cheapest First</option>
                              <option data-cabin-value="Fastest First" value="Fastest First">Fastest First</option>
                              <option data-cabin-value="Outbound: Departure Time"
                                 value="Outbound: Departure Time">
                                 Outbound: Departure Time
                              </option>
                              <option data-cabin-value="Return: Departure Time" value="Return: Departure Time">
                                 Return: Departure Time
                              </option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="filter-left">
                           <div class="accordion" id="exampleAccordion">
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem1" aria-expanded="false" aria-controls="exItem1">Stops
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem1" class="collapse show" aria-labelledby="exItem1Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body card-check">
                                       <label for="direct">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="direct" name="direct" checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">Direct</span>
                                                <span>None</span>
                                             </div>
                                          </div>
                                       </label>
                                       <label for="oneStop">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="oneStop" name="oneStop" checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">1 stop</span>
                                                <span>Rs 191,533</span>
                                             </div>
                                          </div>
                                       </label>
                                       <label for="twoStop">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="twoStop" name="twoStop" checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">2+ stops</span>
                                                <span>None</span>
                                             </div>
                                          </div>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#exItem2" aria-expanded="true" aria-controls="exItem2">
                                 <i class="fa fa-ticket"> <span>Flexible Tickets<span></i>
                                 <i class="fa fa-chevron-down"></i></button>
                                 <div id="exItem2" class="collapse " aria-labelledby="exItem2Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body">
                                       <label for="flexibleTicket">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="flexibleTicket"
                                                name="flexibleTicket">
                                             <div class="stop-checks">
                                                <span>Only show airlines with flexible tickets </span>
                                             </div>
                                          </div>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem3" aria-expanded="false" aria-controls="exItem3">
                                 <i class="fa fa-shield">
                                 <span>
                                 COVID-19 safety rating
                                 </span>
                                 </i>
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem3" class="collapse" aria-labelledby="exItem3Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body card-check">
                                       <label for="5/5">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="5/5" name="5/5">
                                             <div class="stop-checks">
                                                <span>5/5</span>
                                             </div>
                                          </div>
                                       </label>
                                       <label for="4/5">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="4/5" name="4/5">
                                             <div class="stop-checks">
                                                <span>4/5</span>
                                             </div>
                                          </div>
                                       </label>
                                       <label for="3-below">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="3-below" name="3-below">
                                             <div class="stop-checks">
                                                <span>3/5 or below</span>
                                             </div>
                                          </div>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem4" aria-expanded="false" aria-controls="exItem4">
                                 Departure Times
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem4" class="collapse" aria-labelledby="exItem3Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body">
                                       <div id="outbound-slider" class="outbound-slider">
                                          <div class="slider-content">
                                             <p>Outbound</p>
                                             <div>
                                                <span class="outbound-min">10:00 AM</span>
                                                -
                                                <span class="outbound-max">12:00 PM</span>
                                             </div>
                                          </div>
                                          <div class="sliders_step1">
                                             <div id="slider-outbound"></div>
                                          </div>
                                       </div>
                                       <div id="return-time" class="return-slider">
                                          <div class="slider-content">
                                             <p>Return </p>
                                             <div>
                                                <span class="return-min">10:00 AM</span>
                                                -
                                                <span class="return-max">12:00 PM</span>
                                             </div>
                                          </div>
                                          <div class="sliders_step1">
                                             <div id="slider-return"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem5" aria-expanded="false" aria-controls="exItem5">
                                 Journey Duration
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem5" class="collapse" aria-labelledby="exItem3Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body">
                                       <div id="journey-time">
                                          <div class="slider-content">
                                             <div>
                                                <span class="journey-max">12:00 PM</span> -
                                                <span class="journey-min">10:00 AM</span>
                                             </div>
                                          </div>
                                          <div class="sliders_step1">
                                             <div id="slider-journey"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem6" aria-expanded="false" aria-controls="exItem6">
                                 Airlines
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem6" class="collapse" aria-labelledby="exItem3Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body">
                                       <div class="d-flex justify-content-around">
                                          <input type="button" onclick='selectAll()' value="Select All" />
                                          <input type="button" onclick='UnSelectAll()' value="Unselect All" />
                                       </div>
                                       <div class="checkbox-group">
                                          <label class="checkbox-label" for="Emirates">
                                             <input type="checkbox" id="Emirates" name="airline-check"
                                                checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">Emirates</span>
                                                <p>
                                                   <span class="currency-airlines">
                                                   Rs
                                                   </span>
                                                   <span class="price-airlines">
                                                   48,000
                                                   </span>
                                                </p>
                                             </div>
                                          </label>
                                       </div>
                                       <div class="checkbox-group">
                                          <label class="checkbox-label" for="flydubai">
                                             <input type="checkbox" id="flydubai" name="airline-check"
                                                checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">flydubai</span>
                                                <p>
                                                   <span class="currency-airlines">
                                                   Rs
                                                   </span>
                                                   <span class="price-airlines">
                                                   48,000
                                                   </span>
                                                </p>
                                             </div>
                                          </label>
                                       </div>
                                       <div class="checkbox-group">
                                          <label class="checkbox-label" for="Qatar Airways">
                                             <input type="checkbox" id="Qatar Airways" name="airline-check"
                                                checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">Qatar Airways</span>
                                                <p>
                                                   <span class="currency-airlines">
                                                   Rs
                                                   </span>
                                                   <span class="price-airlines">
                                                   48,000
                                                   </span>
                                                </p>
                                             </div>
                                          </label>
                                       </div>
                                       <div class="checkbox-group">
                                          <label class="checkbox-label" for="Turkish Airline">
                                             <input type="checkbox" id="Turkish Airline" name="airline-check"
                                                checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">Turkish Airline</span>
                                                <p>
                                                   <span class="currency-airlines">
                                                   Rs
                                                   </span>
                                                   <span class="price-airlines">
                                                   48,000
                                                   </span>
                                                </p>
                                             </div>
                                          </label>
                                       </div>
                                       <div class="checkbox-group">
                                          <label class="checkbox-label" for="Airline Combination">
                                             <input type="checkbox" id="Airline Combination"
                                                name="airline-check" checked="">
                                             <div class="stop-checks">
                                                <span aria-hidden="true">Airline Combination</span>
                                                <p>
                                                   <span class="currency-airlines">
                                                   Rs
                                                   </span>
                                                   <span class="price-airlines">
                                                   48,000
                                                   </span>
                                                </p>
                                             </div>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card">
                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#exItem7" aria-expanded="false" aria-controls="exItem7">
                                 Greener Flights
                                 <i class="fa fa-chevron-down"></i>
                                 </button>
                                 <div id="exItem7" class="collapse" aria-labelledby="exItem3Header"
                                    data-parent="#exampleAccordion">
                                    <div class="card-body">
                                       <label for="greenerflight">
                                          <div class="checkbox-group">
                                             <input type="checkbox" id="greenerflight" name="greenerflight">
                                             <div class="stop-checks">
                                                <span>Only show flights with lower CO₂ emissions </span>
                                             </div>
                                          </div>
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-9">
                        <div class="travel-info">
                           <i class="fa fa-info-circle"></i>
                           <p>Want to know the latest travel restrictions for United Arab Emirates</p>
                           <button>See Travel Info</button>
                        </div>
                        <div class="price-filter-list">
                           <button class="best active">
                              <span>Best</span>
                              <div class="price-container">
                                 <span class="currency">Rs</span>
                                 <span class="price">
                                 48,000
                                 </span>
                              </div>
                              <span class="duration-flight">
                              2h 15 (average)
                              </span>
                           </button>
                           <button class="cheapest">
                              <span>Cheapest</span>
                              <div class="price-container">
                                 <span class="currency">Rs</span>
                                 <span class="price">
                                 48,000
                                 </span>
                              </div>
                              <span class="duration-flight">
                              2h 15 (average)
                              </span>
                           </button>
                           <button class="fastest">
                              <span>Fastest</span>
                              <div class="price-container">
                                 <span class="currency">Rs</span>
                                 <span class="price">
                                 48,000
                                 </span>
                              </div>
                              <span class="duration-flight">
                              2h 15 (average)
                              </span>
                           </button>
                        </div>
                        <div class="listing-main">
                           <div class="row">
                              @if (count($res) > 0)
                              @php
                              $search_id = '';
                              $count = 0;
                              @endphp
                              @foreach ($res as $item)
                              @php
                              $search_id = $item->search_id;
                              @endphp
                              @if(isset($item->proposals) && count($item->proposals) > 0)
                              @foreach ($item->proposals as $key => $proposals)
                              @php
                              $count++;
                              $direct = $proposals->is_direct == true ? 'directyes' : 'directno';
                              $max_stop = $proposals->max_stops == 1 ? 'maxstop1': ($proposals->max_stops > 1 ? 'maxstop2' : '');
                              @endphp
                              <div class="card-direct-left {{ $direct }} {{ $max_stop }} rs" id="w{{ $count }}" style="display: {{ $count >5 ? 'none':'' }}">
                                 @if(isset($proposals->segment) && count($proposals->segment) > 0)
                                 @foreach ($proposals->segment as $key => $segments)
                                 @if(isset($segments->flight) && count($segments->flight) > 0)
                                 @foreach ($segments->flight as $key => $flights)
                                 <div class="flight-one">
                                    {{-- <span class="flight-tag">Emirates</span> --}}
                                    <img src="http://pics.avs.io/70/70/{{ $flights->operated_by }}.png" alt="">
                                    <div class="flight-time">
                                       <div class="dest-time">
                                          <h2>{{ date('h:i', strtotime($flights->departure_time)) }}</h2>
                                          <span>{{ $flights->departure }}</span>
                                       </div>
                                       @php
                                       $minuts = $flights->duration;
                                       $hours = floor($minuts / 60);
                                       $min = $minuts - ($hours * 60);
                                       @endphp
                                       <div class="type-stops">
                                          <span>{{ $hours.'h : '.$min.'m'}}</span>
                                          <span class="flight-plane">
                                          @if($proposals->is_direct == true)
                                          <i class="fa fa-plane"></i>
                                          @else
                                          <span class="one-stop"></span>
                                          <span class="two-stop"></span>
                                          <i class="fa fa-plane"></i>
                                          @endif
                                          </span>
                                          <span class="flight-type">Direct</span>
                                       </div>
                                       <div>
                                          <h2>{{ date('h:i', strtotime($flights->arrival_time)) }}</h2>
                                          <span>{{ $flights->arrival }}</span>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                                 @endif
                                 @endforeach
                                 @endif
                                 <span class="operated-by">{{ $flights->operated_by }}</span>
                                 <div class="card-flight-footer">
                                    <span class="flexible-check">
                                    <i class="fa fa-ticket"></i>
                                    Flexible Ticket
                                    </span>
                                    <span class="covid-check">
                                    <i class="fa fa-shield"> </i>
                                    5/5 rating for COVID - 19 safety<br>
                                    measures
                                    </span>
                                 </div>
                              </div>
                              <div class="card-direct-right {{ $direct }} {{ $max_stop }}" id="r{{ $count }}" style="display: {{ $count >5 ? 'none':'' }}">
                                 <form id="bookingForm" action="{{ route('bookingRequest') }}" method="post" target="_blanck">
                                    @csrf
                                    @foreach ($proposals->terms as $key => $term)
                                    <span class="deals">
                                    6 deal from
                                    </span>
                                    <h3>
                                       <span class="currency">{{ $term->currency }}</span>
                                       <span class="price">
                                       {{ $term->price }}
                                       </span>
                                    </h3>
                                    {{-- @foreach ($proposals->terms as $key => $term) --}}
                                    <p>
                                       <span class="currency">$</span>
                                       <span class="price">
                                       {{ $term->price }}
                                       </span>
                                       <span>total</span>
                                       <input type="hidden" name="termUrl" value="{{ $term->url }}">
                                    </p>
                                    @endforeach
                                    <button>
                                    Select
                                    <i class="fa fa-arrow-right"></i>
                                    </button>
                                    <input type="hidden" name="search_id" value="{{ $search_id }}">
                                 </form>
                              </div>
                              @endforeach
                              @endif
                              @endforeach
                              @endif
                              <button  class="btn btn-primary form-control" id="loadMore" style="display:none;margin: 0px 30px 30px 17px;font-weight: bold;font-size: 20px;">Load More</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
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
                           <div class="d-flex justify-content-end">
                              <button type="button"> Visit Site</button>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>


   @include('_inc/footer')

      <script src="{{ asset('assets/js/lib.js') }}"></script>
      <script type="text/javascript"
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms&amp;libraries=places"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
      <script src="{{ asset('assets/js/script.js') }}"></script>
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
      <script>
         $(document).ready(function(){
          // event.preventDefault();
          var idArr = [];
          var x = 10;
          $(".rs").each(function(){
            idArr.push($(this).attr("id"));
          });
          var cL = idArr.length;
          if(cL == x || cL <= x){$("#loadMore").hide();}
          if(cL > x){
           $("#loadMore").show();
          }else{
           $("#loadMore").hide();
          }
          $("#loadMore").click(function(){
         	 if(cL > x){
         x += 10;
           for(i = 1; i<= x; i++){
          $('#w'+i).show();
          $('#r'+i).show();
          if('#direct'.checked) {
        $('.directyes').show();
         }else{
         $('.directyes').hide();
    }
   //  if('#oneStop'.checked) {
   //      $('.maxstop1').show();
   //       }else{
   //       $('.maxstop1').hide();
   //  }
  
         }
         x += 10; 
           }
           if(cL == x || cL <= x){$("#loadMore").hide();}
           
          });
         });
           
      </script>
      <script>
         $("#direct").change(function() {
    if(this.checked) {
        $('.directyes').show();
    }else{
      $('.directyes').hide();
    }
});
      </script> 
      <script>
         $("#oneStop").change(function() {
    if(this.checked) {
        $('.maxstop1').show();
    }else{
      $('.maxstop1').hide();
    }
});
      </script>
   </body>
</html>