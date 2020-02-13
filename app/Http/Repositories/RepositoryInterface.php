<?php 
namespace App\Http\Repositories;

interface RepositoryInterface
{
    public function create($request);

    public function update($request, $task);

    public function status($id);
}