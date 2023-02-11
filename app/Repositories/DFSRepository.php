<?php

namespace App\Repositories;

use App\Interfaces\DFSRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Result;

class DFSRepository implements DFSRepositoryInterface 
{
    public function getAllSearches() 
    {
        $user_id = auth()->user()->id;
        // die(config('app.DFS_AUTHORIZATION'));
        // echo \Config::get('app.DFS_AUTHORIZATION');
        // die;
        return Search::all()->where('user_id', $user_id);
    }

    public function getAllSearchesWithResults() 
    {
        return Search::all();
    }

    public function getSearchById($searchId) 
    {
        return Search::findOrFail($searchId);
    }
    
    public function getSearchByIdWithResults($searchId) 
    {
        $user_id = auth()->user()->id;
        return Search::with(['results'])->where('user_id', '=', $user_id)->findOrFail($searchId);
    }

    public function deleteSearch($searchId) 
    {
        Search::destroy($searchId);
    }

    public function createSearch(array $searchDetails) 
    {
        return Search::create($searchDetails);
    }

    public function searchDFS(Request $request) {
        //increase execution time to avoid connection time out
        ini_set('memory_limit', '1024M');
        set_time_limit(0);
        // prepare data from request
        $user_id = auth()->user()->id;
        $keyword = mb_convert_encoding($request->get('keyword'), "UTF-8");
        $location_code = $request->get('country_code');
        $device = $request->get('device');
        $repetitions = $request->get('repetitions');

        // setup post data for dataforseo
        $data = '[
            {"language_code":"en", "keyword":"'.$keyword.'", "location_code":"'.$location_code.'", "device":"'.$device.'", "depth": 100}
        ]';
        //initiate curl
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // api url for live endpoint
            CURLOPT_URL => 'https://api.dataforseo.com/v3/serp/google/organic/live/advanced',
            // sandbox url for live endpoint
            // CURLOPT_URL => 'https://sandbox.dataforseo.com/v3/serp/google/organic/live/advanced',
            // api url for regular endpoint
            // CURLOPT_URL => 'https://api.dataforseo.com/v3/serp/google/organic/task_post',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . config('app.DFS_AUTHORIZATION'),
                'Content-Type: application/json'
            ),
        ));
        // dump search records in database
        $result = $this->createSearch([
            "keyword" => $keyword,
            "location_code" => $location_code,
            "device"=> $device,
            "repetitions"=> $repetitions,
            "user_id"=> $user_id
        ]);
        $search_results = [];
        // iterate the api request as per repetitions entered by user
        for($i = 1; $i <= $repetitions; $i++) {
            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                return $error_msg = curl_error($curl);
            }
            $response_array = json_decode($response, true);
            if($response_array['status_code'] != 20000){
                return $response_array;
            }
            // dump api response data into database
            foreach($response_array['tasks'][0]['result'][0]['items'] as $item) {
                if($item['type'] == 'organic') {
                    $domain = isset($item['domain']) ? $item['domain'] : 'no domain data';
                    Result::create([
                        'domain' => $domain,
                        'rank' => $item['rank_group'],
                        'iteration' => $i,
                        'search_id' => $result->id,
                    ]);
                }
            }
        }
        curl_close($curl);
        return $result;
    }

}
