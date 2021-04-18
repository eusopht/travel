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
        <div class="row">
            <div class="col-md-6">
                <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=303490&campaign_id=100&trs=5784&target_host=www.aviasales.com%2Fsearch&locale=en&limit=6&powered_by=true&destination=JED" charset="utf-8"></script>
            </div>
            <div class="col-md-6">
                <script src="//tp.media/content?currency=usd&promo_id=4044&shmarker=303490&campaign_id=100&trs=5784&target_host=www.aviasales.com%2Fsearch&locale=en&limit=6&powered_by=true&destination=MED" charset="utf-8"></script>
            </div>
        </div>
    </div>
</section>
@endsection
