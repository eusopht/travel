@extends('layouts.front')

@section('content')
<section class="cities-section">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="hed  text-center">
                <h2>Trending Cities</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa.</p>
            </div>

            <div class="body col-md-12">
                <div class="row">
                    <div class="cities-box col-md-4">
                        <a href="#">
                            <img src="{{ asset('assets/images/cities/1.jpg') }}" alt="">
                        </a>
                    </div>

                    <div class="col-md-4 cities-box cities--2">
                        <a href="#">
                            <img src="{{ asset('assets/images/cities/2.jpg') }}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/images/cities/3.jpg') }}" alt="">
                        </a>
                    </div>

                    <div class="col-md-4 cities-box">
                        <a href="#">
                            <img src="{{ asset('assets/images/cities/4.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="destinations-area">
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
                <li>Karachi Flights</li>
                <li>Multan Flights</li>
                <li>Lahore Flights</li>
                <li>Multan Flights</li>
            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
</section>
@endsection
  @include('action_loader')
    {{-- <script src="{{ asset('assets/js/lib.js') }}"></script> --}}
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms">
    </script>
    <script src="{{ asset('assets/js/script.js') }}">
    </script>
    <script>
        function loader(){
            $("#action_loader").modal('show');
        }
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
          if($result.locations){
            $.each($result.locations,function(item,value){
            $("#hotelsearch").append("<option value='"+value.fullName+" "+value.id+"'></option>");
         });
          }
         if($result.hotels){
            $.each($result.hotels,function(item,value){
            $("#hotelsearch").append("<option value='"+value.fullName+" "+value.id+"'></option>");
         });
         }
        }
      });
      }else{
        $("#tos").html('');
      }
    }
    </script>
