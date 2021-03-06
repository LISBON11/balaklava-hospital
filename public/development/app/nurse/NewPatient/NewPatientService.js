angular
    .module('nurseApp')
    .service('NewPatientService', function($http, $q) {

        function postGeneralEmergInfo(patientInfo) {
            var defer=$q.defer();

            $http.post('medial_nurse/addNewInpatient',patientInfo)
                .success(function(response) {
                    defer.resolve(response);
                })
                .error(function(err) {
                    defer.reject(err);
                });

            console.log(defer.promise);
            /*return defer.promise;*/
        }

        return {
            postGeneralEmergInfo: postGeneralEmergInfo
        };

    });


/*
 $http.get('/emergency/patients').success(function(patients) {
 $scope.patients_info = patients.data;
 console.log(patients);
 });

 $scope.save = function (patient, NewPatient){
 $scope.response={};
 if(NewPatient.$valid){
 $http.post("/emergency/addNewInpatient", patient).success(function (answ) {
 $scope.response=answ;
 });
 }
 };*/
