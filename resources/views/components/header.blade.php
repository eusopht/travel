<header class="header-section col-md-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <img src="assets/images/logo.png" alt="">
            </div>
        </div>
    </div>
</header>

<section class="search-section">
    <div class="container-fluid">
        <div class="tabs-nav">
            <ul>
                <li><a class="@routeis('home') active @endrouteis nav-link-flight" href="{{ route('home') }}">Flights</a></li>
                <li><a class="@routeis('hotelView') active @endrouteis nav-link-hotel" href="{{ route('hotelView') }}">Hotels</a></li>
                <li><a class="@routeis('carView') active @endrouteis nav-link-car" href="{{ route('carView') }}">Harmain Transport</a></li>
            </ul>
        </div>
        <div class="form-main">
            @routeis('home')
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
                    <div class="col-md-2 p-md-0">
                        <div class="field">
                            <label for="locationfrom">From</label>
                            <input type="text" name="from" class="from-place form-control" id="locationfrom" value="{{ $request->from ?? '' }}" placeholder="Country, city or airport">
                            <div data-value="" style="display:none !important;"></div>
                            <button class="switch" id="switch" type="button" value="Swap">
                                <i class="fa fa-exchange"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2 p-md-0">
                        <div class="field">
                            <label for="locationto">To</label>
                            <input type="text" name="to" class="form-control" id="locationto" value="{{ $request->to ?? '' }}" placeholder="Country, city or airport">
                            <div data-value="" style="display:none !important;"></div>
                        </div>
                    </div>
                    <div class="col-md-2 p-md-0">
                        <div class="field depart-field">
                            <div id="depart" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="depart">Depart</label>
                                <div>
                                    <input class="form-control" type="text" value="{{ $request->depart ?? '' }}" name="depart" id="depart-input" />
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 p-md-0">
                        <div class="field return-field">
                            <div id="return" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="return">Return</label>
                                <div>
                                    <input value="" class="form-control" type="text" value="{{ $request->return ?? '' }}" name="return" id="return-input" />
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-md-0">
                        <div class="field cabin-class-field">
                            <label for="travellers">
                                Cabin Class & Travellers
                            </label>
                            <button class="travellers-btn" data-placement="top" data-toggle="popover" data-container="body" type="button" data-html="true" id="travellers">
                                <input type="text" readonly="readonly" name="total_adult" value=" {{ $request->total_adult ?? '1 Adult' }} ">
                                <input type="text" readonly="readonly" name="total_child" value=" {{ $request->total_child ?? '1 Children' }} ">
                                <input type="text" readonly="readonly" name="cabin_class" id="cabin-class" value=" {{ $request->cabin_class ?? 'Economy' }} ">
                            </button>
                            <div id="popover-content" style="display:none">
                                <label for="cabin-class">Cabin Class</label>
                                <select id="cabin-class">
                                    <option data-cabin-value="Economy" value="Economy">Economy</option>
                                    <option data-cabin-value="Premium Economy" value="Premium Economy">Premium Economy</option>
                                    <option data-cabin-value="Business Class" value="Business Class">Business Class</option>
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
                        </div>
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
                        <button class="btn search-flight">Search flights <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </form>
            @endrouteis

            @routeis('hotelView')
            <form action="{{ route('allHotelPage') }}" method="POST">
                @csrf
                <div class="row m-0">
                    <div class="col-md-4 p-md-0">
                        <div class="field">
                            <label for="wheretostay">Where do you want to stay?</label>
                            <input type="text" class="from-place form-control" name="hotelname" id="wheretostay" placeholder="Enter destination or hotel name">
                            <div data-value="" style="display:none !important;"></div>
                            <input type="hidden" name="locationId" id="locationId" value="">
                        </div>
                    </div>

                    <div class="col-md-2 p-md-0">
                        <div class="field depart-field">
                            <div id="check-in" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="check-in">Check-In</label>
                                <div>
                                    <input class="form-control" type="text" name="check_in" value="{{ date('Y-m-d') }}">
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 p-md-0">
                        <div class="field return-field">
                            <div id="check-out" class="input-group date field-c" data-date-format="yyyy-mm-dd">
                                <label for="check-out">Check-out</label>
                                <div>
                                    <input class="form-control" type="text" name="check_out" value="{{ date('Y-m-d') }}"/>
                                    <span class="input-group-addon icon-calendar"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-md-0">
                        <div class="field cabin-class-field">
                            <label for="travellers">
                                Guest And Room
                            </label>
                            <button class="travellers-btn" data-placement="bottom" data-toggle="popover" data-container="body" type="button" data-html="true" id="travellers">
                                <input type="text" readonly="readonly" name="total_room" value="1 Room">
                                <input type="text" readonly="readonly" name="total_adult" value="1 Adult">
                                <input type="text" readonly="readonly" name="total_child" value="1 Children">
                            </button>
                            <div id="popover-content" style="display:none">
                                <div class="room">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="room"><i class="fa fa-bed"></i> Rooms</label>
                                        <div>
                                            <input type='button' value='-' class='roomminus' field='roomquantity' />
                                            <input type='text' disabled name='roomquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='roomplus' field='roomquantity' />
                                        </div>
                                    </div>
                                </div>
                                <div class="adults">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="adults"><i class="fa fa-male"></i> Adults</label>
                                        <div>
                                            <input type='button' value='-' class='adultminus' field='adultquantity' />
                                            <input type='text' disabled name='adultquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='adultplus' field='adultquantity' />
                                        </div>
                                    </div>
                                </div>
                                <div class="child">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label for="children"><i class="fa fa-child"></i> Children</label>
                                        <div>
                                            <input type='button' value='-' class='childminus' field='childquantity' />
                                            <input type='text' disabled name='childquantity' value='1' class='qty' />
                                            <input type='button' value='+' class='childplus' field='childquantity' />
                                        </div>
                                    </div>
                                </div>
                                <div class='child-inputs'>

                                </div>
                                <button type="button" id="close" class="closed-pop"> Done </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row main-from-bottom">
                    <div class="col-lg-12 d-flex justify-content-end mbl-check-main-submit">
                        <button class="btn search-flight">Search Hotels <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </form>
            @endrouteis
        </div>
    </div>
</section>
