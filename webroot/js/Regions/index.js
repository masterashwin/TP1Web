/*var app = angular.module('app', []);

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

    }]);*/
var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);
// Construction de l'url vars l'api Rest de Users
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('RegionCrudJwtCtrl', ['$scope', 'RegionCrudJwtService', function ($scope, RegionCrudJwtService) {

        $scope.updateRegion = function () {
            RegionCrudJwtService.updateRegion($scope.region.id, $scope.region.name)
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
            RegionCrudJwtService.getRegion($scope.region.id)
                    .then(function success(response) {
                        $scope.region = response.data.region;
//                        $scope.region.id = id;
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
                RegionCrudJwtService.addRegion($scope.region.name)
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
            RegionCrudJwtService.deleteRegion($scope.region.id)
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
            RegionCrudJwtService.getAllRegions()
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
        $scope.login = function () {
            if (grecaptcha.getResponse(widgetId1) == '') {
                $scope.captcha_status = 'Please verify captha.';
                return;
            }
            if ($scope.user != null && $scope.user.username) {
                RegionCrudJwtService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.username + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }
        $scope.changePassword = function () {
            RegionCrudJwtService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
                            });
        }
    }]);

app.service('RegionCrudJwtService', ['$http', function ($http) {

        this.getRegion = function getRegion(regionId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + regionId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }

        this.addRegion = function addRegion(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            });
        }

        this.deleteRegion = function deleteRegion(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.updateRegion = function updateRegion(id, name) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {name: name},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.getAllRegions = function getAllRegions() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }
    }]);


