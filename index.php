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
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

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
                    <li><a href="#services">SERVICES</a></li>
                    <li><a href="#portfolio">PORTFOLIO</a></li>
                    <li><a href="#about">ABOUT</a></li>
                    <li><a href="login.php">LOGIN</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>Looking for a job ?</h1>
        <p>Log in and Find your next dream Job.</p>
        <form class="form-inline">
            <div class="input-group">

                <div class="input-group-btn">
                    <a href="login.php"><button style='border: none;background-color: #252275;' type="button" class="btn btn-danger">Login</button></a>
                </div>
            </div>
        </form>
    </div>


    <div id="services" class="container-fluid text-center">
        <h2>SERVICES</h2>
        <h4>What we offer</h4>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-off logo-small"></span>
                <h4>Recuriters</h4>
                <p>Platform for recuriters...........</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-heart logo-small"></span>
                <h4>Candidates</h4>
                <p>Platform for candidates..........</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-lock logo-small"></span>
                <h4>JOB DONE</h4>
                <p>Finding jobs made easy.</p>
            </div>
        </div>
        <br><br>

    </div>


    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>What our customers say</h2>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h4>"This company is the best. I am so happy with the result!"<br><span>ABC, Student </span></h4>
                </div>
                <div class="item">
                    <h4>"One word... WOW!!"<br><span>DEF, Company pvt ltd.</span></h4>
                </div>
                <div class="item">
                    <h4>"Could I... BE any more happy with this company?"<br><span>GHI, Recuriter</span></h4>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>About SquareJob</h2>
                <p>The expression day job is often used for a job one works in order to make ends meet rather than working in their preferred vocation. Archetypal examples of this are the actor who works as a waiter (the day job) while looking for roles, and the professional athlete who works as a laborer in the offseason because the athlete's professional or semi-professional team does not pay a full living. The term is also applied to those who maintain a steady occupation while working as a day trader.[2]

                    While many people do hold a full-time occupation, "day job" specifically refers to those who hold the position solely to pay living expenses so they can pursue the job they really want (which may also be during the day). The phrase strongly implies that the day job would be quit, if only the real vocation paid a living wage.

                    The phrase "don't quit your day job" is a humorous response to a poor or mediocre performance not up to professional caliber. The phrase implies that the performer is not talented enough in that activity to be able to make a career out of it.</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-lock logo"></span>
            </div>
        </div>
    </div>


    <footer class="container-fluid text-center" style='background-color:#f6f6f6'>
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Developed By <a href="https://www.linkedin.com/in/gokaran-jindal-62600810b/" title=" Gokaran Jindal Linkedin">Gokaran Jindal</a></p>
    </footer>

</body>

</html>