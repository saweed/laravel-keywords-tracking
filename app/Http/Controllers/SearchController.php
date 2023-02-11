<?php

namespace App\Http\Controllers;

use App\Interfaces\DFSRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Search;
use App\Models\User;
use App\Models\Result;
use Illuminate\Support\Facades\Log;


class SearchController extends Controller
{

    private DFSRepositoryInterface $dfsRepository;

    public function __construct(DFSRepositoryInterface $dfsRepository) 
    {
        $this->dfsRepository = $dfsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->dfsRepository->getAllSearches();
        return view('search/list', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('search/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // //increase execution time to avoid connection time out
        // ini_set('memory_limit', '1024M');
        // set_time_limit(0);
        // // prepare data from request
        // $user_id = auth()->user()->id;
        // $keyword = mb_convert_encoding($request->get('keyword'), "UTF-8");
        // $location_code = $request->get('country_code');
        // $device = $request->get('device');
        // $repetitions = $request->get('repetitions');

        // // setup post data for dataforseo
        // $data = '[
        //     {"language_code":"en", "keyword":"'.$keyword.'", "location_code":"'.$location_code.'", "device":"'.$device.'", "depth": 100}
        // ]';
        // $data = '[
        //     {
        //         "language_code": "en",
        //         "location_code": 2840,
        //         "keyword": "cake receipe"
        //     },
        //     {
        //         "language_name": "English",
        //         "location_name": "United States",
        //         "keyword": "albert einstein",
        //         "priority": 2,
        //         "tag": "some_string_123",
        //         "pingback_url": "http://keyword-demo.waqas.info/search/result?id=$id&tag=$tag"
        //     },
        //     {
        //         "postback_data": "json",
        //         "postback_url": "http://keyword-demo.waqas.info/search/result"
        //     }
        // ]';
        // //initiate curl
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     // api url for live endpoint
        //     // CURLOPT_URL => 'https://api.dataforseo.com/v3/serp/google/organic/live/advanced',
        //     // sandbox url for live endpoint
        //     // CURLOPT_URL => 'https://sandbox.dataforseo.com/v3/serp/google/organic/live/advanced',
        //     // api url for regular endpoint
        //     CURLOPT_URL => 'https://api.dataforseo.com/v3/serp/google/organic/task_post',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => $data,
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: ' . env('DFS_AUTHORIZATION'),
        //         'Content-Type: application/json'
        //     ),
        // ));
        // // dump search records in database
        // // $result = $this->createSearch([
        // //     "keyword" => $keyword,
        // //     "location_code" => $location_code,
        // //     "device"=> $device,
        // //     "repetitions"=> $repetitions,
        // //     "user_id"=> $user_id
        // // ]);

        // $response = curl_exec($curl);
        // dd($response);
        // $search_results = [];
        // // iterate the api request as per repetitions entered by user
        // // for($i = 1; $i <= $repetitions; $i++) {
        // //     $response = curl_exec($curl);
        // //     $response_array = json_decode($response, true);
        // //     // dump api response data into database
        // //     foreach($response_array['tasks'][0]['result'][0]['items'] as $item) {
        // //         if($item['type'] == 'organic') {
        // //             $domain = isset($item['domain']) ? $item['domain'] : 'no domain data';
        // //             Result::create([
        // //                 'domain' => $domain,
        // //                 'rank' => $item['rank_group'],
        // //                 'iteration' => $i,
        // //                 'search_id' => $result->id,
        // //             ]);
        // //         }
        // //     }
        // // }
        // curl_close($curl);
        // dd($result);
    
        // Form validation
        $this->validate($request, [
            'keyword' => 'required',
            'repetitions' => 'required|numeric',
         ]);
        $result = $this->dfsRepository->searchDFS($request);
        if($result['status_code'] != 20000){
            return \Redirect::back()->withErrors(['message' => $result['status_message']]);
        }
        return redirect()->route('show', ['id' => $result->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $queryResults = $this->dfsRepository->getSearchByIdWithResults($id)->toArray();
        // dd($queryResults);
        $title = $queryResults['keyword'];
        $repetitions = $queryResults['repetitions'];
        $result = $queryResults['results'];
        return view('search/index', compact('result', 'title', 'repetitions'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->dfsRepository->deleteSearch($id);
        return redirect()->route('home');
    }

    public function taskNotification(Request $request, $id=null, $tag=null){
        Log::info($id . ' -- ' . $tag);
    }
    public function taskResult(Request $request){
        Log::info(print_r($request, true));
    }


}
