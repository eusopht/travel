@extends('layouts.front')

@section('content')
    <section class="listing-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="filter-left">
                                <div class="accordion" id="exampleAccordion">
                                    <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem1" aria-expanded="false" aria-controls="exItem1">Stops
                                            <i class="fa fa-chevron-down"></i>
                                        </button>

                                        <div id="exItem1" class="collapse show" aria-labelledby="exItem1Header" data-parent="#exampleAccordion">
                                            <div class="card-body card-check">
                                                <label for="direct">
                                                    <div class="checkbox-group">
                                                        <input type="checkbox" class="stops" id="direct" name="stops[]" value=".maxstop0">
                                                        <label class="stop-checks" id="direct">
                                                            <span aria-hidden="true">Direct</span>
                                                            {{-- <span>None</span> --}}
                                                        </label>
                                                    </div>
                                                </label>
                                                <label for="oneStop">
                                                    <div class="checkbox-group">
                                                        <input type="checkbox" class="stops" id="oneStop" name="stops[]" value=".maxstop1">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">1 stop</span>
                                                            {{-- <span>Rs 191,533</span> --}}
                                                        </div>
                                                    </div>
                                                </label>
                                                <label for="twoStop">
                                                    <div class="checkbox-group">
                                                        <input type="checkbox" class="stops" id="twoStop" name="stops[]" value=".maxstop2">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">2+ stops</span>
                                                            {{-- <span>None</span> --}}
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#exItem2" aria-expanded="true" aria-controls="exItem2">
                                            <i class="fa fa-ticket"> <span>Flexible Tickets<span></i>
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem2" class="collapse " aria-labelledby="exItem2Header" data-parent="#exampleAccordion">
                                            <div class="card-body">
                                                <label for="flexibleTicket">
                                                    <div class="checkbox-group">
                                                        <input type="checkbox" id="flexibleTicket" name="flexibleTicket">
                                                        <div class="stop-checks">
                                                            <span>Only show airlines with flexible tickets </span>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem3" aria-expanded="false" aria-controls="exItem3">
                                            <i class="fa fa-shield"></i>
                                            <span>COVID-19 safety rating</span>
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem3" class="collapse" aria-labelledby="exItem3Header" data-parent="#exampleAccordion">
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
                                    </div> --}}
                                    {{-- <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem4" aria-expanded="false" aria-controls="exItem4">
                                            Departure Times <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem4" class="collapse" aria-labelledby="exItem3Header" data-parent="#exampleAccordion">
                                            <div class="card-body">
                                                <div id="outbound-slider" class="outbound-slider">
                                                    <div class="slider-content">
                                                        <p>Outbound</p>
                                                        <div>
                                                            <span class="outbound-min">12:00 AM</span>
                                                            -
                                                            <span class="outbound-max">11:30 PM</span>
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
                                                            <span class="return-min">12:00 AM</span>
                                                            -
                                                            <span class="return-max">11:30 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="sliders_step1">
                                                        <div id="slider-return"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem5" aria-expanded="false" aria-controls="exItem5">
                                            Journey Duration <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem5" class="collapse" aria-labelledby="exItem3Header" data-parent="#exampleAccordion">
                                            <div class="card-body">
                                                <div id="journey-time">
                                                    <div class="slider-content">
                                                        <div>
                                                            <span class="journey-max">12:00 AM</span> -
                                                            <span class="journey-min">11:30 PM</span>
                                                        </div>
                                                    </div>
                                                    <div class="sliders_step1">
                                                        <div id="slider-journey"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem6" aria-expanded="false" aria-controls="exItem6">
                                            Airlines <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem6" class="collapse" aria-labelledby="exItem3Header" data-parent="#exampleAccordion">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-around">
                                                    <input type="button" onclick='selectAll()' value="Select All" />
                                                    <input type="button" onclick='UnSelectAll()' value="Unselect All" />
                                                </div>
                                                <div class="checkbox-group">
                                                    <label class="checkbox-label" for="Emirates">
                                                        <input type="checkbox" id="Emirates" name="airline-check">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">Emirates</span>
                                                            <p>
                                                                <span class="currency-airlines">Rs</span>
                                                                <span class="price-airlines">48,000</span>
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="checkbox-group">
                                                    <label class="checkbox-label" for="flydubai">
                                                        <input type="checkbox" id="flydubai" name="airline-check">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">flydubai</span>
                                                            <p>
                                                                <span class="currency-airlines">Rs</span>
                                                                <span class="price-airlines">48,000</span>
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="checkbox-group">
                                                    <label class="checkbox-label" for="Qatar Airways">
                                                        <input type="checkbox" id="Qatar Airways" name="airline-check">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">Qatar Airways</span>
                                                            <p>
                                                                <span class="currency-airlines">Rs</span>
                                                                <span class="price-airlines">48,000</span>
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="checkbox-group">
                                                    <label class="checkbox-label" for="Turkish Airline">
                                                        <input type="checkbox" id="Turkish Airline" name="airline-check">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">Turkish Airline</span>
                                                            <p>
                                                                <span class="currency-airlines">Rs</span>
                                                                <span class="price-airlines">48,000</span>
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="checkbox-group">
                                                    <label class="checkbox-label" for="Airline Combination">
                                                        <input type="checkbox" id="Airline Combination" name="airline-check">
                                                        <div class="stop-checks">
                                                            <span aria-hidden="true">Airline Combination</span>
                                                            <p>
                                                                <span class="currency-airlines">Rs</span>
                                                                <span class="price-airlines">48,000</span>
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="card">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#exItem7" aria-expanded="false" aria-controls="exItem7">
                                            Greener Flights <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <div id="exItem7" class="collapse" aria-labelledby="exItem3Header" data-parent="#exampleAccordion">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="listing-main">
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
                                                    $max_stop = $proposals->max_stops == 1 ? 'maxstop1': ($proposals->max_stops > 1 ? 'maxstop2' : 'maxstop0');
                                                @endphp
                                                <div data-index="{{ $count }}" class="row rs {{ $direct }} {{ $max_stop }}" id="w{{ $count }}" style="display: {{ $count >5 ? 'none':'' }}">
                                                    <div class="col-sm-8 col-12 pr-sm-0 mb-sm-4">
                                                        <div class="card-direct-left">
                                                            @if(isset($proposals->segment) && count($proposals->segment) > 0)
                                                                @foreach ($proposals->segment as $key => $segments)
                                                                    @if(isset($segments->flight) && count($segments->flight) > 0)
                                                                        @foreach ($segments->flight as $key => $flights)
                                                                            <div class="flight-one">
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
                                                                <span class="flexible-check"><i class="fa fa-ticket"></i>Flexible Ticket</span>
                                                                <span class="covid-check"><i class="fa fa-shield"> </i>5/5 rating for COVID - 19 safety<br>measures</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-12 pl-sm-0 mb-4">
                                                            <div class="card-direct-right d-flex">
                                                                <form id="bookingForm" action="{{ route('bookingRequest') }}" method="post" target="_blanck">
                                                                    @csrf
                                                                    <div class="row m-auto">
                                                                        <div class="col-sm-12 col-5">
                                                                            @foreach ($proposals->terms as $key => $term)
                                                                                <span class="deals">6 deal from</span>
                                                                                <h3>
                                                                                    <span class="currency">USD</span>
                                                                                    @php
                                                                                        $rate = \DB::table('currencies')->where('currency_code', 'USD')->first()->rate;
                                                                                    @endphp
                                                                                    <span class="price">
                                                                                        {{ $term->price * $rate }}
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
                                                                        </div>
                                                                        <div class="col-sm-12 col-7">
                                                                            <button> Select <i class="fa fa-arrow-right"></i> </button>
                                                                            <input type="hidden" name="search_id" value="{{ $search_id }}">
                                                                            <p class="mt-2"><i class="fa fa-users"></i> {{ $request->total_adult.', '. $request->total_child }}</p>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                                <button class="btn btn-primary form-control" id="loadMore" style="display:none;margin: 0px 0px 30px 0px;font-weight: bold;font-size: 20px;">Load More</button>
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
                                        <span>Free cancellation</span>
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
                                <button type="button">hotels</button>
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
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var idArr = [];
            var x = 5;
            var cL = 0;

            filter(".rs");

            function filter(class_name) {
                $(".rs").hide();

                $(class_name).each(function (index, element) {
                    idArr.push($(element).attr("id"));
                });

                console.log(idArr);

                cL = idArr.length;

                if(cL == x || cL <= x) {$("#loadMore").hide();}

                for (i = 1; i <= x; i++) {
                    $('#'+idArr[i]).show();
                }

                if(cL > x) {
                    $("#loadMore").show();
                } else {
                    $("#loadMore").hide();
                }
            }



            $("#loadMore").click(function() {

                if(cL > x) {
                    x += 10;
                    for(i = 1; i<= x; i++){
                        $('#'+idArr[i]).show();
                    }
                    x += 10;
                }
                if(cL == x || cL <= x) {$("#loadMore").hide();}
            });


            $('.stops').change(function (e) {
                e.preventDefault();
                let c = [];
                let val = $(this).val();
                x = 5
                cL = 0;
                idArr = [];

                $("[name='stops[]']:checked").each( function () {
                    c.push($(this).val());
                });

                if (c.join(', ').length == 0) {
                    alert('df');
                } else {
                    filter(c.join(', '));
                }

            });
        });
    </script>
@endsection
