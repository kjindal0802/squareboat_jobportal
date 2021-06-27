<?php session_start(); 

if($_SESSION['user_type'] != 1){
    header("Location: logout.php");
}    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SquareJob</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/index.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" ng-app="myApp" ng-controller="customersCtrl">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#myPage">SquareJob</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#openjobs">Available Jobs</a></li>
                    <li><a href="#appliedjobs">Applied Jobs</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>Hi <?php echo $_SESSION['name']; ?> !!!<br>Looking for an job ?</h1>
        <p>We have made finding jobs easy.</p>
        <a href='#openjobs'><button style="margin-top:20px" type="button" class="btn btn-danger">Search Jobs</button></a>
        <a href='#appliedjobs'><button style="margin-top:20px" type="button" class="btn btn-danger">View Applied Jobs</button></a>

    </div>


    <div id="openjobs" class="container-fluid" style='padding-top:80px;padding-bottom:15px'>
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" ng-model='filterSearch' class="form-control" size="50" placeholder="Search by Job Title/Description /Recruiter's Name" required>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>


    <!-- Container (Services Section) -->
    <div id="services" class="container-fluid text-center" style='padding-top:20px'>
        <h2>Available Jobs</h2>
        <h4>What we offer</h4>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="panel panel-default text-center" ng-repeat='job in newJobs | filter: filterSearch'>
                    <div class="panel-heading" style="padding:10px">
                        <h3>Job Title : {{job.job_title | uppercase}}</h3>
                        <p>Posted by <b>{{job.name}}</b> for <b>{{job.company}}</b> on <b>{{job.posted_date}}</b></p>
                    </div>
                    <div class="panel-body">
                        <p><strong>{{job.job_description}}</strong></p>
                        <button class="btn btn-success" ng-click="applyJob(job.job_id)">Apply</button>
                    </div>
                </div>

            </div>
            <div class="col-sm-2"></div>
        </div>
        <div id="notFoundDiv" ng-show="(newJobs | filter: filterSearch).length==0" style="color: black; font-weight: bold">
            <h2>No Records Found !!</h2>
        </div>
        <br><br>
    </div>

    <hr>

    <!-- Container (Services Section) -->
    <div id="appliedjobs" class="container-fluid text-center" style='padding-top:20px'>
        <h2>Applied Jobs</h2>
        <h4>View previously applied jobs.</h4>


        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <input type="text" ng-model='filterSearch1' class="form-control" size="50" placeholder="Search by Job Title/Description /Recruiter's Name" required>
                <br>
                <div class="panel panel-default text-center" ng-repeat='job in appliedJobs | filter: filterSearch1'>
                    <div class="panel-heading" style="padding:10px">
                        <h3>Job Title : {{job.job_title | uppercase}}</h3>
                        <p>Posted for <b>{{job.company}}</b> on <b>{{job.posted_date}}</b></p>
                    </div>
                    <div class="panel-body">
                        <p><strong>{{job.job_description}}</strong></p>
                    </div>
                </div>

            </div>
            <div class="col-sm-2"></div>
        </div>
        <div id="notFoundDiv" ng-show="(appliedJobs | filter: filterSearch1).length==0" style="color: black; font-weight: bold">
            <h2>No Records Found !!</h2>
        </div>
        <br><br>
    </div>



    <footer class="container-fluid text-center" style='background-color:#f6f6f6'>
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Developed By <a href="https://www.linkedin.com/in/gokaran-jindal-62600810b/" title=" Gokaran Jindal Linkedin">Gokaran Jindal</a></p>
    </footer>


</body>
<script src='./asset.js'></script>

</html>