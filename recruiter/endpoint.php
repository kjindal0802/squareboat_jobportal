<?php
session_start();
require "../vendor/autoload.php";

ini_set('max_execution_time', 0); // for infinite time of execution
ini_set('default_socket_timeout', 0);
ini_set('memory_limit', '1028M');

$app = new Slim\App();


$app->post('/postNewJob', 'postNewJob');
$app->get('/fetchAllJobs', 'fetchAllJobs');
$app->post('/fetchCandidateList', 'fetchCandidateList');

$app->run();



function postNewJob()
{
    require '../config.php';
    $data = json_decode(file_get_contents("php://input"));
    $sql = "insert into jobs (job_title, job_description, posted_by, posted_date,company) 
    values(:title,:jd,:postedBy,NOW(),:company)";
    try {
        $handle = $pdo->prepare($sql);
        $params = [
            ':title' => $data->title,
            ':jd' => $data->description,
            ':postedBy' => $_SESSION['id'],
            ':company' => $data->company
        ];

        $handle->execute($params);

        $success = 'Job has been posted successfully . You can view posted jobs in posted jobs section.';
        print json_encode($success);
    } catch (PDOException $e) {
        print json_encode($e->getMessage());
    }
}

function fetchAllJobs()
{
    require '../config.php';
    $stmt = $pdo->prepare("SELECT * FROM `jobs` where posted_by = :postedBy order by posted_date desc");
    $stmt->execute(['postedBy' => $_SESSION['id']]);
    $data = $stmt->fetchAll();
    // and somewhere later:
    print json_encode($data);
}

function fetchCandidateList()
{
    require '../config.php';
    $data = json_decode(file_get_contents("php://input"));
    $stmt = $pdo->prepare("SELECT a.* FROM `user` a  where sno in (select applied_by from applications where job_id =:jobId)");
    $stmt->execute(['jobId' => $data->jobid]);
    $data = $stmt->fetchAll();
    // // and somewhere later:
    print json_encode($data);
}
