<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */

class ApisController extends AppController {
        
	public $components = array('Paginator', 'Session');
        
        public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('index'));
	}
	public function index() {
		$indexInfo['description'] = "App User Registration(post method)(2-d array) ";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/registration.json";
		$indexInfo['parameters'] = 
                '<b>data[User][username] - </b>Username<br>
		<b>data[User][email] - </b> User email<br>
                <b>data[User][name] - </b>Name<br>
		<b>data[User][password] - </b>Password<br>
                <b>data[User][image] - </b>Image<br>
                <b>data[User][age] - </b>Age<br>
                <b>data[User][phone] - </b>Contact-No<br>
		<b>data[User][device_token] - </b>device token<br>
                <b>data[User][latitude] - </b>Latitude<br>
                <b>data[User][longitude] - </b>Longitude<br>';
                $indexarr[] = $indexInfo;

                $indexInfo['description'] = "App User Login(post method)(2-d array) ";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/login.json";
		$indexInfo['parameters'] = 
                '<b>data[User][username] - </b>Username<br>
		<b>data[User][password] - </b>Password<br
		<b>data[User][device_token] - </b>device token<br>';
                $indexarr[] = $indexInfo;

                $indexInfo['description'] = "App User Update(post method)(2-d array) ";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/edit/(user_id).json";
		$indexInfo['parameters'] = '
                <b>data[User][name] - </b>Name<br>
		<b>data[User][age] - </b>Age<br>
                <b>data[User][image] - </b>Image<br>
                <b>data[User][phone] - </b>Contact-No<br>
                <b>data[User][country] - </b>Country<br>';
                $indexarr[] = $indexInfo;

                $indexInfo['description'] = "App Single User Record";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/info/(user_id).json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App User Change Password(post method)(2-d array) ";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/changepass.json";
		$indexInfo['parameters'] = 
                '<b>data[User][id] - </b> UserId<br>
                <b>data[User][old_password] - </b> Old Password <br>
                <b>data[User][new_password] - </b> New Password <br>
                <b>data[User][cpassword] - </b> Confirm Password<br>';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App User Forget Password(post method)(2-d array) ";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/'users/forgetpwd.json";
		$indexInfo['parameters'] = 
                '<b>data[User][email] - </b> User email<br>';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App User Logout";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/users/logout.json";
		$indexInfo['parameters'] = 
                '<b>data[User][id] - </b> userId <br>';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Region List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/regions.json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Region Single List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/regions/view/(region_id).json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Commune List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/communes.json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Commune Single List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/communes/view/(commune_id).json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Wineries List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/wineries.json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;
                
                $indexInfo['description'] = "App Winery Single List";
		$indexInfo['url'] = FULL_BASE_URL.$this->webroot."api/wineries/view/(winery_id).json";
		$indexInfo['parameters'] = 
                '';
                $indexarr[] = $indexInfo;

                $this->set('IndexDetail',$indexarr);
	}
}