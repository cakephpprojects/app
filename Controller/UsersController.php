<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array( 'Session');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow(array('login', 'add','index','edit','useradd','api_index'));
        }
        
        public function login() {
		if ($this->request->is('post')) {
                        if ($this->Auth->login()) {
				$this->Session->setFlash(__('LoggedIn Successfully'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('SomeThing Went Wrong Please Try Again!!!'));
			}
		}
	} 
        
        public function useradd(){
            
        }
		
		
		
		
		public function add (){
		$data = file_get_contents("php://input");
        $objData = json_decode($data);
        print_r($objData);
       $pwd = $objData -> pwd;
        $user = $objData -> name; 
		
		}
        
       // public function add() {
		
                       
             // $dat =  $this->params['url'];
              
              //$username = $dat['data']['User']['username'];
             // $email = $dat['data']['User']['email'];
              // $password = $dat['data']['User']['password'];

           // $data = array(
    //'User' => array(
       // 'username' => $username,
       //  'email' => $email,
      //  'password' => $password
  //  )
//);

//$this->User->save($data);
              
                
	//}
        
         public function edit($id=NULL){

       $loggedid=$this->Auth->user('id');

       $dataAbout = $this->User->find('first',array('conditions'=>array('User.id'=>$loggedid)));
       debug($dataAbout);exit;
       $this->set('userAbout',$dataAbout);      

     }
     
     public function index() {}
     
     
        
        
        
        
        
        
         public function api_index() {
		$this->User->recursive = -1;
                $users = $this->User->find('all',array(
           "contain" => array(
               "User" )));
                $new_array = array();
      foreach($users as $array)
    {
    foreach($array as $val)
    {
        array_push($new_array, $val);
    }    
    }

  $this->set(array(
                'data' => $new_array,
                '_serialize' => array('data')
            ));
                
	}
        
        
        
        


}
