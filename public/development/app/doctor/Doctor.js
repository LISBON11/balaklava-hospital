angular
    .module('doctorApp', ['ui.router'])
    .constant('PATHDIR', 'development/app/doctor')
    .config(function($stateProvider) { //Because $stateProvider is an Angular Provider, you must inject it into a .config() block using Angular 1 Dependency Injection.
        $stateProvider
            /*.state('inpatients',{
                url: '/inpatients',
                template: '<inpatients></inpatients>'
            })*/
            .state('inpatients',{
                url: '/inpatients',
                template: '<inpatients></inpatients>'
            })
            .state('inpatient_treatment',{
                url: '/inpatient_treatment/:id',
                template: '<inpatient-treatment></inpatient-treatment>'
            })
                .state('inpatient_treatment.general',{
                    url: '/general',
                    template: '<general></general>'
                })
                .state('inpatient_treatment.analyzes',{
                    url: '/analyzes',
                    template: '<analyzes></analyzes>'
                })
                .state('inpatient_treatment.dynamic',{
                    url: '/dynamic',
                    template: '<dynamic></dynamic>'
                })
                .state('inpatient_treatment.prescriptions',{
                    url: '/prescriptions',
                    template: '<prescriptions></prescriptions>'
                })
                .state('inpatient_treatment.first_inspect',{
                    url: '/inspections',
                    template: '<first-inspect></first-inspect>'
                })

            .state('emergency',{
                url: '/emergency',
                template: '<emergency></emergency>'
            })
            .state('emergency_person',{
                url: '/emergency_person/:id',
                template: '<emergency-person></emergency-person>'
            });
    });

    


