var app = angular.module('app', []);

app.controller('RegionCRUDCtrl', ['$scope', 'RegionCRUDService', function ($scope, RegionCRUDService) {

        $scope.updateRegion = function () {
            RegionCRUDService.updateRegion($scope.region.id, $scope.region.name)
                    .then(function success(response) {
                        $scope.message = 'Region data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating region!';
                                $scope.message = '';
                            });
        }

        $scope.getRegion = function () {
            var id = $scope.region.id;
            RegionCRUDService.getRegion($scope.region.id)
                    .then(function success(response) {
                        $scope.region = response.data.region;
                        $scope.region.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Region not found!';
                                } else {
                                    $scope.errorMessage = "Error getting region!";
                                }
                            });
        }

        $scope.addRegion = function () {
            if ($scope.region != null && $scope.region.name) {
                RegionCRUDService.addRegion($scope.region.name)
                        .then(function success(response) {
                            $scope.message = 'Region added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding region!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteRegion = function () {
            RegionCRUDService.deleteRegion($scope.region.id)
                    .then(function success(response) {
                        $scope.message = 'Region deleted!';
                        $scope.region = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting region!';
                                $scope.message = '';
                            })
        }

        $scope.getAllRegions = function () {
            RegionCRUDService.getAllRegions()
                    .then(function success(response) {
                        $scope.regions = response.data.regions;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting regions!';
                            });
        }

    }]);

app.service('RegionCRUDService', ['$http', function ($http) {

        this.getRegion = function getRegion(regionId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + regionId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.addRegion = function addRegion(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.deleteRegion = function deleteRegion(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateRegion = function updateRegion(id, name) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.getAllRegions = function getAllRegions() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

    }]);