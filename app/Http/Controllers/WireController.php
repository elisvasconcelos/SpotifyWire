<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WireController extends Controller
{
  //abrir página de busca
    public function index()
    {
        return view('search');
    }

    //realizar busca na API
    public function search()
    {
    	/*$auth = Http::get('https://accounts.spotify.com/authorize', [
	        'client_id' => 'a5b4340160134aefa13b31e340975eb0',
	        'response_type' => 'token',
	        'redirect_uri' => 'http://127.0.0.1:8000/search?',
	        'scope' => 'user-read-private%20user-read-email',
	        'state' => '34fFs29kd09',
	        'show_dialog' => 'false',
	    ]);*/

      	$busca = Request::get('busca');
      	$response = Http::withHeaders([
        	'Authorization' => 'Bearer BQCrC3W8EWWUtvhP5Dn71Glt1pXWKlEoucHqSLuXwml3l1umNpOkvCPLjc6glJclWtMQ2W1gL12UvQesdyREGCQHppuiHXyrCGBp374t4SqdlVDuvm1pV7DH0_kQwWmxp_6p13X-2IjrNLnyusN9zHTPKEVbIsjSviWVCIuvLchQPGFtvxwUkbNoIt2_J0lb7VcrDi92qWnKLtDRgMi0uSCQ3I0eMRTAjwNm5ekn7hSvSC0JHGN41S2xBvwZTqJ4NUND2_89msj4'
    	])->get('https://api.spotify.com/v1/search?', [
        	'q' => $busca,
        	'type' => 'track',
    	]);

    	$resp = $response->json();

    	return $resp;
    }
}

