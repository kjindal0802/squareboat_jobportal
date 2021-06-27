var app = angular.module('myApp', []);
app.controller('customersCtrl', function ($scope, $http, $filter) {

    $scope.postedJobs = [];
    $scope.fetchAllJobs = () => {
        $http.get("endpoint.php/fetchAllJobs")
            .success(function (data) {
                $scope.postedJobs = data;
            })
    }
    $scope.fetchAllJobs();

    $scope.candidateList = [];

    $scope.fetchCandidateList = (jobid) => {
        $http.post("endpoint.php/fetchCandidateList", { 'jobid': jobid })
            .success(function (data) {
                $scope.candidateList = data;
            })
    }

    $scope.action = () => {
        if (!$scope.jobTitle) {
            alert('Job Title can not be empty');
        } else if (!$scope.jobCompany) {
            alert('Job Company can not be empty');
        } else if (!$scope.jobDescription) {
            alert('Job Description can not be empty');
        } else {
            $http.post("endpoint.php/postNewJob", {
                'title': $scope.jobTitle,
                'description': $scope.jobDescription,
                'company': $scope.jobCompany
            })
                .success(function (data) {
                    $scope.fetchAllJobs();
                    alert(data);
                    $scope.jobTitle = '';
                    $scope.jobCompany = '';
                    $scope.jobDescription = '';

                })
        }
    }
});