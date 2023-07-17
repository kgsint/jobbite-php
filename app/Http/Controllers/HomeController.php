<?php 

namespace App\Http\Controllers;

use Core\Database\MySQL;
use Core\Database\Tables\JobsTable;

class HomeController 
{
    public function index()
    {
        $jobTable = new JobsTable(new MySQL());
        
        if(!empty($_GET['title'])) {
            $jobs = $jobTable->search($_GET['title']);
        }else {
            $jobs = $jobTable->latest();
        }
        return view('home', ['jobs' => $jobs]);
    }
}