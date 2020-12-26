var app = angular.module('linkedlists', []);

app.controller('regionsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.regions = response.data.regions;
    });
});