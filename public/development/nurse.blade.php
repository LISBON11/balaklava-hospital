<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script src="../bower_components/angular/angular.min.js"></script>
    <script src="../bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../development/app/nurse/Nurse.js"></script>

    <script src="../development/app/nurse/ReceivedPatients/ReceivedPatientsDirective.js"></script>
    <script src="../development/app/nurse/ReceivedPatients/ReceivedPatientsController.js"></script>
    <script src="../development/app/nurse/ReceivedPatients/ReceivedPatientsService.js"></script>

    <script src="../development/app/nurse/NewPatient/NewPatientController.js"></script>
    <script src="../development/app/nurse/NewPatient/NewPatientDirective.js"></script>
    <script src="../development/app/nurse/NewPatient/NewPatientService.js"></script>


    <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,300,700" media="all" />
    <link rel="stylesheet" href="../development/fonts/themify/themify-icons.css">
    <link rel="stylesheet" href="../development/css/font-awesome.css">


    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../development/css/style.css">
</head>

<body ng-app="nurseApp">
    @include('components.emergency_header')
    {{--<div class='wrapper' ng-include src="'/development/components/emergency_header.html'"></div>--}}
    <div class="main-content">
        <ui-view></ui-view>
    </div>
</body>
</html>