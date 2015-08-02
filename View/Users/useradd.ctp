<div ng-controller="RegisterCtrl">
    <h1 class="page-header">Register <small>all fields are required.</small></h1>
    <form name="change_password_form" ng-controller="usersController" ng-submit="changePasswordForm()">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input id="emailAddress" type="text" class="input-block-level"
                           name="data[User][username]" ng-model="data.User.username" required="true"></input>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input id="username" type="text" class="input-block-level"
                          name="data[User][email]" ng-model="data.User.email" required="true"></input>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input id="password" type="password" class="input-block-level"
                           name="data[User][password]" ng-model="data.User.password" required="true"></input>
                </div>
            </div>
        </fieldset>
        <div class=form-actions>   
            <input type="submit" class="btn btn-primary btn-block" ng-click="debug()" value="Register"/>
        </div>
    </form>
</div>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
        <script type="text/javascript">
       angular.module("myApp", [])
.controller('usersController', function($scope, $http) {
  $scope.changePasswordForm = function() {
    console.log('add');
    //note: use full url, not partial....
    $http({
        method  : 'POST',
        url     : '/users/add',
        data    : $.param($scope.data),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded',
        'X-Requested-With' : 'XMLHttpRequest'
        }  // set the headers so angular passing info as form data (not request payload)
    })
    .success(function(data, status, headers, config) {
        //do anything when it success..
        console.log('works!');
      })
    .error(function(data, status, headers, config){
        //do anything when errors...
        console.log('errors!');
    });
  }
  $scope.debug = function () {
   console.log($scope);
  }
});
        </script>
       
  