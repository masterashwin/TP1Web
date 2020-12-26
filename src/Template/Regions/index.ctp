<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Regions'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Regions/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="RegionCRUDCtrl">
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="region.id" /></td>
        </tr>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="region.name" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <a ng-click="getRegion(region.id)">Get Region</a> 
    <a ng-click="updateRegion(region.id, region.name)">Update Region</a> 
    <a ng-click="addRegion(region.name)">Add Region</a> 
    <a ng-click="deleteRegion(region.id)">Delete Region</a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br /> 
    <a ng-click="getAllRegions()">Get all Regions</a><br /> 
    <br /> <br />
    <div ng-repeat="region in regions">
        {{region.id}} {{region.name}}
    </div>
    <!-- pre ng-show='regions'>{{regions | json }}</pre-->
</div>