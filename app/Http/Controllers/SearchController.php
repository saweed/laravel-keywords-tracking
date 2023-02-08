<?php

namespace App\Http\Controllers;

use App\Interfaces\DFSRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Search;
use App\Models\User;
use App\Models\Result;


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
        // Form validation
        $this->validate($request, [
            'keyword' => 'required',
            'repetitions' => 'required|numeric',
         ]);
        $result = $this->dfsRepository->searchDFS($request);
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
        $result = $this->dfsRepository->getSearchByIdWithResults($id)->toArray();
        return view('search/index', compact('result'));
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
        //
    }
}
