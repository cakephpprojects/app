<!DOCTYPE html>
<html ng-app>
    <head>
        <title>AngularJs Post Example: DevZone.co.in </title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
        <style>
            #dv1{
                border:1px solid #DBDCE9; margin-left:auto;
                margin-right:auto;width:220px;
                border-radius:7px;padding: 25px;
            }

            .info{
                border: 1px solid;margin: 10px 0px;
                padding:10px;color: #00529B;
                background-color: #BDE5F8;list-style: none;
            }
            .err{
                border: 1px solid;  margin: 10px 0px;
                padding:10px;  color: #D8000C;
                background-color: #FFBABA;   list-style: none;
            }
        </style>
    </head>
    <body>
        <div id='dv1'>
            <form ng-controller="FrmController">
                <ul>
                    <li class="err" ng-repeat="error in errors"> {{ error}} </li>
                </ul>
                <ul>
                    <li class="info" ng-repeat="msg in msgs"> {{ msg}} </li>
                </ul>
                <h2>Sigup Form</h2>
                <div>
                    <label>Name</label> 
                    <input type="text" ng-model="username" placeholder="User Name" style='margin-left: 22px;'> 
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" ng-model="email" placeholder="Email" style='margin-left: 22px;'> 
                </div>
                <div>
                    <label>Password</label>
                    <input type="password" ng-model="password" placeholder="Password">
                </div>
                <button ng-click='SignUp();' style='margin-left: 63px;margin-top:10px'>SignUp</button>
            </form>
        </div>

        <script type="text/javascript">
           app.controller("FrmController",function($scope){
			var app=angular.module("myapp",[]);
                $scope.errors = [];
                $scope.msgs = [];

                $scope.SignUp = function() {

                    $scope.errors.splice(0, $scope.errors.length); // remove all error messages
                    $scope.msgs.splice(0, $scope.msgs.length);

                    $http.post('http://localhost/myan/users/add', {'uname': $scope.username, 'pswd': $scope.password, 'email': $scope.email}
                    ).success(function(data, status, headers, config) {
                        if (data.msg != '')
                        {
                            $scope.msgs.push(data.msg);
                        }
                        else
                        {
                            $scope.errors.push(data.error);
                        }
                    }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
                        $scope.errors.push(status);
                    });
                }
            }
        </script>