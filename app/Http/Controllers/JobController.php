<?php 

namespace App\Http\Controllers;

use Core\Database\MySQL;
use Core\Database\Tables\JobsTable;
use App\Http\FormRequests\StoreJobFormRequest;

class JobController 
{
    public function index()
    {
        $jobTable = new JobsTable(new MySQL);
        $jobs = $jobTable->getAll();

        return view('jobs/index', ['jobs' => $jobs]);
    }

    // job details
    public function show()
    {
        $id = $_GET['id'] ?? false;

        $jobTable = new JobsTable(new MySQL);
        
        $job = $jobTable->findById($id);

        // 404 when there is no query string for id or can't find the matching job in database
        if(!$id || !$job) {
            abort(404);
        }

        return view('jobs/show', [ 'job' => $job ]);
    }
    
    // create view
    public function create()
    {
        return view('jobs/create');
    }

    // store job
    public function store()
    {
        StoreJobFormRequest::validate($_POST);

        $user = auth_user();

        $data = [
            'title'=> $_POST['title'],
            'location' => $_POST['location'],
            'job_status' => $_POST['job_status'],
            'salary_from' => $_POST['salary_from'],
            'salary_to' => $_POST['salary_to'],
            'description' => $_POST['description'],
            'company_name' => $_POST['company_name'],
            'company_email' => $_POST['company_email'],
            'company_logo' => null,
            'apply_url' => $_POST['apply_url'],
            'user_id' => $user->id
        ];

        if(!empty($_FILES) && $_FILES['company_logo']['error'] === 0) {
            $filename = uniqid() . $_FILES['company_logo']['name'] ;
            $tmp = $_FILES['company_logo']['tmp_name']; 
            
            $data['company_logo'] = $filename;
            move_uploaded_file($tmp, PUBLIC_PATH . "assets/images/$filename");

        }

        // store into db
        (new JobsTable(new MySQL))->insert($data);
        
        return redirect('/');
    }
}