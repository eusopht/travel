<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\airports;
use App\logs;
use App\cities;
use App\carbooking;
use Illuminate\Support\Facades\Redirect;
use stdClass;
// use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function autocompleteAirports(Request $req)
    {
        $arr = array();

        $code = $req->keyword;
        $result = airports::where('airports.code','like',"%".$code."%")
            ->orWhere('airports.name','like',"%".$code."%")
            ->orWhere('airports.city_name','like',"%".$code."%")
            ->get()->take(30);

        foreach($result as $item){
            $obj = new stdClass();
            $obj->value = $item->city_name." (".$item->code.")";
            $obj->data = array(
                'name' => $item->name,
                'code' => $item->code,
                'city_name' => $item->city_name,
            );
            $arr[]  = $obj;
        }

        return $arr;
    }

    public function searchAirports(Request $request)
    {
        $code = $request->cityCode;
        $result = airports::where('airports.code','like',"%".$code."%")
            ->orWhere('airports.name','like',"%".$code."%")
            ->orWhere('airports.city_name','like',"%".$code."%")
            ->get()->take(30);
        // dd($result);
        return response()->json($result);
    }

    public function searchFlights(Request $request)
    {

        $from = $request->from;
        $from = substr($from, -4);
        $from = str_replace(str_split(')'), '', $from);
        $to = $request->to;
        $to = substr($to, -4);
        $to = str_replace(str_split(')'), '', $to);
        $depDate = date('Y-m-d',strtotime($request->depart));
        $retDate = date('Y-m-d',strtotime($request->return));
        $adult = $request->total_adult;
        $child = $request->total_child;
        $child = explode(' ',$child);
        $adult = explode(' ',$adult);
        $flightClass = $request->cabin_class;
        // dd($request->retDate);
        $token = '2790fedf9337eb612505374a7957dcc8';
        $marker = '303490';
        $ip = $_SERVER['REMOTE_ADDR'];
        //$ip = '127.0.0.1';
        if(!empty($request->retDate)){
            $string = $token . ':beta.aviasales.ru:en:' .$marker. ':'.$adult[0].':'.$child[0].':'.$child[0].':'.$depDate.':'.$to.':'.$from.':'.$retDate.':'.$from.':'.$to.':Y:' . $ip;
            $signature = md5($string);
            $json = '{"signature":"' .$signature. '","marker":"' .$marker. '","host":"beta.aviasales.ru","user_ip":"' .$ip. '","locale":"en","trip_class":"Y","passengers":{"adults":'.$adult[0].',"children":'.$child[0].',"infants":'.$child[0].'},"segments":[{"origin":"'.$from.'","destination":"'.$to.'","date":"'.$depDate.'"},{"origin":"'.$to.'","destination":"'.$from.'","date":"'.$retDate.'"}]}';

            $c = curl_init();
            curl_setopt($c,CURLOPT_URL,'http://api.travelpayouts.com/v1/flight_search');
            curl_setopt($c,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($c,CURLOPT_POST,1);
            curl_setopt($c,CURLOPT_POSTFIELDS,$json);
            curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
            $answer = curl_exec($c);
            curl_close($c);

            $res = json_decode($answer);
            // dd($res);
            sleep(15);
            $s = curl_init();
            curl_setopt($s,CURLOPT_URL,'http://api.travelpayouts.com/v1/flight_search_results?uuid='.$res->search_id);
            curl_setopt($s,CURLOPT_RETURNTRANSFER,1);
            $answer_oj = curl_exec($s);
            curl_close($s);
            $res = json_decode($answer_oj);
            $logs = new logs();
            $logs->origin = $from;
            $logs->destination = $to;
            $logs->departdate =  date('Y-m-d', strtotime($depDate));
            $logs->returndate = date('Y-m-d', strtotime($retDate));
            $logs->adult = $adult[0];
            $logs->child = $child[0];
            $logs->ip = $request->ip();
            $logs->account = NULl;
            $logs->save();
            return view('listing.searchflights',
            [
                'res' => $res,
                'fromController' => $request->from,
                'toController' => $request->to,
                'depDateController' => $request->depart,
                'retDateController' => $request->return,
                'childController' => $request->total_child,
                'adultController' => $request->total_adult,
                'flightClassController' => $request->cabin_class

            ]);
        } else {
            $string = $token . ':beta.aviasales.ru:en:' .$marker. ':'.$adult[0].':'.$child[0].':'.$child[0].':'.$depDate.':'.$to.':'.$from.':Y:' . $ip;

            $signature = md5($string);

            $json = '{"signature":"' .$signature. '","marker":"' .$marker. '","host":"beta.aviasales.ru","user_ip":"' .$ip. '","locale":"en","trip_class":"Y","passengers":{"adults":'.$adult[0].',"children":'.$child[0].',"infants":'.$child[0].'},"segments":[{"origin":"'.$from.'","destination":"'.$to.'","date":"'.$depDate.'"}]}';
            // echo $json."</br>";
            // dd($json);
            $c = curl_init();
            curl_setopt($c,CURLOPT_URL,'http://api.travelpayouts.com/v1/flight_search');
            curl_setopt($c,CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($c,CURLOPT_POST,1);
            curl_setopt($c,CURLOPT_POSTFIELDS,$json);
            curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
            $answer = curl_exec($c);
            curl_close($c);
            $res = json_decode($answer);
            // dd($res);
            sleep(15);
            $s = curl_init();
            curl_setopt($s,CURLOPT_URL,'http://api.travelpayouts.com/v1/flight_search_results?uuid='.$res->search_id);
            curl_setopt($s,CURLOPT_RETURNTRANSFER,1);
            $answer_oj = curl_exec($s);
            curl_close($s);
            $res = json_decode($answer_oj);
            $logs = new logs();
            $logs->origin = $from;
            $logs->destination = $to;
            $logs->departdate =  date('Y-m-d', strtotime($depDate));
            $logs->returndate = date('Y-m-d', strtotime($retDate));
            $logs->adult = $adult[0];
            $logs->child = $child[0];
            $logs->ip = $request->ip();
            $logs->account = NULl;
            $logs->save();
            // dd($res);
            return view('listing.searchflights', get_defined_vars());
        }
    }

    public function updateCity()
    {
        $cities = cities::select('city_name','city_code')->get();
    }

    public function hotelView()
    {
        return view('hotels.hotel');
    }

    public function autocompleteHotels(Request $req)
    {

        $response = Http::get('http://engine.hotellook.com/api/v2/lookup.json?query='.$req->keyword.'&lang=en&lookFor=both&limit=10&token=9088db24c5925ff35a32091c93fee41b');
        $result = json_decode($response->getBody());

        if(!empty($result->results)){
            $res = $result->results->hotels;
        } else {
            $res = [];
        }

        // return $res;
        $arr = array();
        foreach($res as $item){
            $obj = new stdClass();
            $obj->value = $item->locationName;
            $obj->data = array(
                'id' => $item->locationId,
            );
            $arr[]  = $obj;
        }

        return $arr;
    }

    public function hotelSearch(Request $request)
    {
        $name = $request->cityCode;
        $str = explode(", ",$name);
        $strr1 = strtolower($str[0]);
        // dd($name);
        $response = Http::get('http://engine.hotellook.com/api/v2/lookup.json?query='.$strr1.'&lang=en&lookFor=both&limit=10&token=9088db24c5925ff35a32091c93fee41b');

        $result = json_decode($response->getBody());
        if(!empty($result->results)){
        $res = $result->results->hotels;
        }else{
            $res = [];
        }
        //  dd($res);
        return response()->json($res);

    }

    public function allHotelPage(Request $request)
    {
        $locationId = $request->locationId;
        // $locationId = explode(' ',$locationId);
        // $locationId = end($locationId);
        $response = Http::get('http://engine.hotellook.com/api/v2/static/hotels.json?locationId='.$locationId.'&token=9088db24c5925ff35a32091c93fee41b');
        $result = json_decode($response->getBody(),true);
        $count = count($result['hotels']);

        return view('hotel-listing.hotel_list',['res' => $result,'count' => $count]);
    }

    public function bookingRequest(Request $request)
    {
        $termUrl = $request->termUrl;
        $search_id = $request->search_id;
        // dd($search_id);
        $s = curl_init();
        curl_setopt($s,CURLOPT_URL,'https://api.travelpayouts.com/v1/flight_searches/'.$search_id.'/clicks/'.$termUrl.'.json');
        curl_setopt($s,CURLOPT_RETURNTRANSFER,1);
        $answer_oj = curl_exec($s);
        curl_close($s);
        $res = json_decode($answer_oj);
        // dd($res);
      return view('redirectUrlPage',['url' => $res->url]);
    }

    public function carView()
    {
        return view('car-hire.car');
    }

    public function carBooking(Request $request)
    {
        $person = $request->person;
        $dept = $request->dept;
        $arivaldatetime = $request->arivaldatetime;
        $arival = $request->arival;
        $specialrequest = $request->specialrequest;
        $depdatetime = $request->depdatetime;
        $email = $request->email;

        $carbooking = new carbooking();
        $carbooking->insert([
            "person" => $person,
            "dept" => $dept,
            "arival" => $arival,
            "specialrequest" =>$specialrequest,
            "arivaldatetime" =>date('Y-m-d h:i:s',strtotime($arivaldatetime)),
            "deptdatetime" =>date('Y-m-d h:i:s',strtotime($depdatetime)),
            "email" => $email
        ]);
        $frontEmails = 'Support@harmain.com';
        $Details['data'] = 'Car Booked Successfully';

                if($frontEmails != null)
                {
                    try {
                        $emails = explode(" ",preg_replace("/\r|\n/", "", $frontEmails));
                        $this->sendContactDetail(implode(',',$emails),$Details);
                        $subject = 'Car Booking';
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: Support@harmain.com";
                    $message = "Thank You for using our services";
                    mail($email,$subject,$message,$headers);
                    } catch (\Throwable $th) {
                    //    dd($th);
                // return response()->json(['messageType' =>'error','message' => $th]);
                    }
                }
                return response()->json(['messageType' =>'success','message' => 'Your Car Booked Successfully']);
    }
    private function sendContactDetail($to,$details)
    {
        $subject = 'Car Booking';
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Support@harmain.com";
        $message = view('email.email',['Details'=>$details])->render();
        mail($to,$subject,$message,$headers);
    }
}
