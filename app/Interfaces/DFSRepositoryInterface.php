<?php
// Interface for Data for SEO repository
namespace App\Interfaces;
use Illuminate\Http\Request;

interface DFSRepositoryInterface 
{
    public function getAllSearches();
    public function getAllSearchesWithResults();
    public function getSearchById($orderId);
    public function getSearchByIdWithResults($orderId);
    public function deleteSearch($orderId);
    public function createSearch(array $orderDetails);
    public function searchDFS(Request $request);
}
