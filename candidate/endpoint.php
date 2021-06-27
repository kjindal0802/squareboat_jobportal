<?php
session_start();
require "../vendor/autoload.php";

ini_set('max_execution_time', 0); // for infinite time of execution
ini_set('default_socket_timeout', 0);
ini_set('memory_limit', '1028M');

$app = new Slim\App();

$app->get('/fetchNonAppliedJobs', 'fetchNonAppliedJobs');
$app->get('/fetchAppliedJobs', 'fetchAppliedJobs');
$app->post('/applyJob', 'applyJob');

$app->run();



function applyJob()
{
    require '../config.php';
    $data = json_decode(file_get_contents("php://input"));
    $sql = "insert into applications (job_id, applied_by, applied_date) 
    values(:jobid,:appliedBy,NOW())";
    try {
        $handle = $pdo->prepare($sql);
        $params = [
            ':jobid' => $data->jobid,
            ':appliedBy' => $_SESSION['id'],
        ];
        $handle->execute($params);
        $success = 'You have successfully applied to this job.';
        print json_encode($success);
    } catch (PDOException $e) {
        print json_encode($e->getMessage());
    }
}

function fetchNonAppliedJobs()
{
    require '../config.php';
    $stmt = $pdo->prepare("SELECT a.* , b.name FROM `jobs` a, user b  where a.job_id not in (select job_id from applications where applied_by  = :appliedBy) and a.posted_by = b.sno order by posted_date desc");
    $stmt->execute(['appliedBy' => $_SESSION['id']]);
    $data = $stmt->fetchAll();
    print json_encode($data);
}


function fetchAppliedJobs()
{
    require '../config.php';
    $stmt = $pdo->prepare("SELECT * FROM `jobs` where job_id in (select job_id from applications where applied_by  = :appliedBy) order by posted_date desc");
    $stmt->execute(['appliedBy' => $_SESSION['id']]);
    $data = $stmt->fetchAll();
    print json_encode($data);
}
