<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .dropdown-menu {
            top: 325.54px !important;
        }

        @media (max-width: 567px) {
            .tabs-nav {
                margin-top: 1rem;
            }

            .tabs-nav li {
                min-width: auto !important;
            }

            .tabs-nav li a {
                font-size: 16px !important;
            }
        }
    </style>

    @yield('css')
</head>

<body>

    @include('components.header')

    @yield('content')

    @include('components.footer')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('assets/js/lib.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0qe-Nm-I-wRVSHg__FQmbIIE9WNpbqms&amp;libraries=places"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.autocomplete.js') }}"></script>
    <script>
        var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
        $from_location = $("#locationfrom");
        $to_location = $("#locationto");
        $hotel_where = $("#wheretostay");

        $flight_url = "{{ route('autocomplete.airports') }}";
        $hotel_url = "{{ route('autocomplete.hotels') }}";

        $(document).ready(function () {
            $from_location.autocomplete({
                serviceUrl: function (query) {
                    query = $from_location.val();
                    q = encodeURIComponent(query);
                    return $flight_url+"?keyword=" + q;
                },
                delimiter: /;/,
                minChars: 1,
        		triggerSelectOnValidInput: false,
        		showNoSuggestionNotice: true,
        		zIndex: 100,
        		noCache: true,
        		preventBadQueries: false,

                transformResult: function(response) {
                    return {
                        suggestions: JSON.parse(response)
                    };
                },
                beforeRender: function (container, suggestions) {
        			if ($from_location.val().length) {
        				if ( $from_location.val().length >= 1 && $(container).find(".autocomplete-no-suggestion").length ) {
                            var retval =
        						'<div class="add" data-index="0" data-catid="0" data-toggle="modal" style="cursor:pointer">'+
                                    '<div class="truncate" style="padding: 5px; overflow:hidden;" data-toggle="modal" data-target="#addGroupModal">' +
        						        '<div style="margin-left: 10px">' +
        						        '<div style="font-weight: bold; color: #333; font-size: 12px; line-height: 11px">No Results Found.</div>' +
        						    '</div>'+
                                '</div>';
        					$(container).find(".autocomplete-no-suggestion").html(retval);
        				}
        				$(container).find(".autocomplete-suggestion").each(function (index) {
        					$(this).attr("data-index", index);
        					$(this).css('width','100% !important');
        				});
        			}
        		},
                formatResult: function (suggestion, currentValue) {

                    var retval = '<div class="truncate" style="padding: 5px;width:100% !important; overflow:hidden;">';

                        retval += '<div class="" style="margin-left: 10px" data-id="' +suggestion["value"]+'">' +
                                    '<div class="name" style="font-weight: bold; color: #333; font-size: 15px;">' +suggestion["value"]+'</div>' +
                                    '<div class="name" style="font-weight: normal; color: #333; font-size: 12px;">' +suggestion["data"]["name"] +'</div>'+
                                "</div>" +
                            "</div>";

                    return retval;
                }
            });

            $to_location.autocomplete({
                serviceUrl: function (query) {
                    query = $to_location.val();
                    q = encodeURIComponent(query);
                    return $flight_url+"?keyword=" + q;
                },
                delimiter: /;/,
                minChars: 1,
        		triggerSelectOnValidInput: false,
        		showNoSuggestionNotice: true,
        		zIndex: 100,
        		noCache: true,
        		preventBadQueries: false,

                transformResult: function(response) {
                    return {
                        suggestions: JSON.parse(response)
                    };
                },
                beforeRender: function (container, suggestions) {
        			if ($to_location.val().length) {
        				if ( $to_location.val().length >= 1 && $(container).find(".autocomplete-no-suggestion").length ) {
                            var retval =
        						'<div class="add" data-index="0" data-catid="0" data-toggle="modal" style="cursor:pointer">'+
                                    '<div class="truncate" style="padding: 5px; overflow:hidden;" data-toggle="modal" data-target="#addGroupModal">' +
        						        '<div style="margin-left: 10px">' +
        						        '<div style="font-weight: bold; color: #333; font-size: 12px; line-height: 11px">No Results Found.</div>' +
        						    '</div>'+
                                '</div>';
        					$(container).find(".autocomplete-no-suggestion").html(retval);
        				}
        				$(container).find(".autocomplete-suggestion").each(function (index) {
        					$(this).attr("data-index", index);
        					$(this).css('width','100% !important');
        				});
        			}
        		},
                formatResult: function (suggestion, currentValue) {

                    var retval = '<div class="truncate" style="padding: 5px;width:100% !important; overflow:hidden;">';

                        retval += '<div class="" style="margin-left: 10px" data-id="' +suggestion["value"]+'">' +
                                    '<div class="name" style="font-weight: bold; color: #333; font-size: 15px;">' +suggestion["value"]+'</div>' +
                                    '<div class="name" style="font-weight: normal; color: #333; font-size: 12px;">' +suggestion["data"]["name"] +'</div>'+
                                "</div>" +
                            "</div>";

                    return retval;
                },
            });

            $hotel_where.autocomplete({
                serviceUrl: function (query) {
                    query = $hotel_where.val();
                    q = encodeURIComponent(query);
                    return $hotel_url+"?keyword=" + q;
                },
                delimiter: /;/,
                minChars: 1,
        		triggerSelectOnValidInput: false,
        		showNoSuggestionNotice: true,
        		zIndex: 100,
        		noCache: true,
        		preventBadQueries: false,

                transformResult: function(response) {
                    return {
                        suggestions: JSON.parse(response)
                    };
                },
                beforeRender: function (container, suggestions) {
        			if ($hotel_where.val().length) {
        				if ( $hotel_where.val().length >= 1 && $(container).find(".autocomplete-no-suggestion").length ) {
                            var retval =
        						'<div class="add" data-index="0" data-catid="0" data-toggle="modal" style="cursor:pointer">'+
                                    '<div class="truncate" style="padding: 5px; overflow:hidden;" data-toggle="modal" data-target="#addGroupModal">' +
        						        '<div style="margin-left: 10px">' +
        						        '<div style="font-weight: bold; color: #333; font-size: 12px; line-height: 11px">No Results Found.</div>' +
        						    '</div>'+
                                '</div>';
        					$(container).find(".autocomplete-no-suggestion").html(retval);
        				}
        				$(container).find(".autocomplete-suggestion").each(function (index) {
        					$(this).attr("data-index", index);
        					$(this).css('width','100% !important');
        				});
        			}
        		},
                formatResult: function (suggestion, currentValue) {
                    var retval = '<div class="truncate" style="padding: 5px;width:100% !important; overflow:hidden;">';

                        retval += '<div class="" style="margin-left: 10px" data-id="' +suggestion["value"]+'">' +
                                    '<div class="name" style="font-weight: normal; color: #333; font-size: 15px;">' +suggestion["value"]+'</div>' +
                                    // '<div class="name" style="font-weight: normal; color: #333; font-size: 12px;">' +suggestion.locationName +'</div>'+
                                "</div>" +
                            "</div>";

                    return retval;
                },
                onSelect: function(suggestion) {
                    $("#locationId").val(suggestion["data"]["id"]);
                }
            });
        });
    </script>
    @yield('js')

    {{-- function searchHotel(to){
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
    } --}}
    {{-- <script>
        function searchAirportsFrom(froms){
            froms = froms.value;
            $cLength = froms.length;
            var keFired = false;
            if($cLength > 2){
                $.ajax({
                    url: "{{ route('getAirports') }}",
                    type: "GET",
                    dataType: "json",
                    data: { cityCode:froms },
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
                    data: { cityCode:to },
                    success: function($result){
                        $("#tos").html('');
                        $.each($result,function(item,value){
                            $("#tos").append("<option value='"+value.city_name+' ('+value.code+")'>"+value.name+"</option>");
                        });
                    }
                });
            } else{
                $("#tos").html('');
            }
        }
    </script> --}}
</body>

</html>
