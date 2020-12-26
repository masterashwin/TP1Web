var app = angular.module('linkedlists', []);

app.controller('regionsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.regions = response.data.regions;
        angular.forEach($scope.regions, function (region{
        if(region.id == $scope.regionID){
            $scope.region = region;
            angular.forEach($scope.region.counties, function(county){
                if(county.id == $scope.countyID){
                    $scope.county = county;
                   }
            })
        }                                           
        })
    });
});