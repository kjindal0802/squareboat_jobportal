<?php session_start(); 

if($_SESSION['user_type'] != 2){
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

    <link rel="stylesheet" href="./assets/index.css">
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
                    <li><a href="#about">VIEW POSTED JOBS</a></li>
                    <li><a href="logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>Hi <?php echo $_SESSION['name']; ?> !<br>Looking for an employee ?</h1>
        <p>Post a job right now.</p>
        <form class="form-inline">
            <div class="form-group">
                <input type="name" class="form-control" ng-model='jobTitle' placeholder="Job Title" required="required">
            </div>
            <div class="form-group">
                <input type="name" class="form-control" ng-model='jobCompany' placeholder="Company Name" required="required">
            </div><br><br>
            <div class="form-group">
                <textarea class="form-control" ng-model='jobDescription' rows="4" cols="50" placeholder=" Job Description" required="required"></textarea>
            </div><br>

            <div class="input-group-btn">
                <br>
                <button style="margin-top:20px" type="button" class="btn btn-danger" ng-click="action()">Post a Job</button>
            </div>
        </form>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style='margin-top:100px'>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Candidate List </h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Experience</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat='candidate in candidateList'>
                                <td>{{candidate.name}}</td>
                                <td>{{candidate.email}}</td>
                                <td>{{candidate.mobile}}</td>
                                <td>{{candidate.experience}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="notFoundDiv" ng-show="(candidateList).length==0" style="color: black; font-weight: bold">
                        <h2>No Records Found !!</h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div id="services" class="container-fluid text-center" style='padding-top:20px'>
        <h2>Previous Posted Jobs</h2>
        <br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h4><input class="form-control" ng-model="searchText" type='name' placeholder='Search through Job id , description, Title' /></h4>

                <div class="panel panel-default text-left" ng-repeat='job in postedJobs | filter: searchText'>
                    <div class="panel-heading" style="padding:10px">
                        <h3> Title : {{job.job_title | uppercase}}</h3>
                        <h5> Job Id: {{job.job_id}}</h5>
                        <p>Posted for <b>{{job.company | uppercase}}</b> on <b>{{job.posted_date}}</b></p>
                    </div>
                    <div class="panel-body text-left">
                        <p><strong>{{job.job_description}}</strong></p>
                        <button class="btn btn-primary" data-toggle="modal" ng-click="fetchCandidateList(job.job_id)" data-target="#myModal">View Candidate List</button>
                    </div>
                </div>

            </div>
            <div class="col-sm-2"></div>
        </div>
        <div id="notFoundDiv" ng-show="(postedJobs |filter: searchText).length==0" style="color: black; font-weight: bold">
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