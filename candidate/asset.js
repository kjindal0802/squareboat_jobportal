var app = angular.module('myApp', []);
app.controller('customersCtrl', function ($scope, $http, $filter) {

    $scope.newJobs = [];
    $scope.appliedJobs = [];

    $scope.fetchNonAppliedJobs = () => {
        console.log('hi');
        $http.get("endpoint.php/fetchNonAppliedJobs")
            .success(function (data) {
                $scope.newJobs = data;

            })
    }
    $scope.fetchNonAppliedJobs();

    $scope.fetchAppliedJobs = () => {
        console.log('hi');
        $http.get("endpoint.php/fetchAppliedJobs")
            .success(function (data) {
                $scope.appliedJobs = data;

            })
    }
    $scope.fetchAppliedJobs();

    $scope.applyJob = (jobId) => {
        console.log(jobId);
        $http.post("endpoint.php/applyJob", {
            'jobid': jobId,
        })
            .success(function (data) {
                alert(data);
                $scope.fetchNonAppliedJobs();
                $scope.fetchAppliedJobs();
            })
    }
});