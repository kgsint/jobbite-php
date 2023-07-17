<?php 

namespace App\Http\Controllers;

use Core\Database\MySQL;
use Core\Database\Tables\JobsTable;

class HomeController 
{
    public function index()
    {
        $jobTable = new JobsTable(new MySQL());
        $jobs = $jobTable->latest();
        return view('home', ['jobs' => $jobs]);
    }
}