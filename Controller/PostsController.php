<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PostsController extends AppController {

public $components = array('Paginator', 'Session');
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow(array('add', 'index','api_add','api_index'));
        }
    
    
    public function index() {

                $this->Paginator->settings = $this->paginate;
		$this->set('posts', $this->Paginator->paginate());
	}
        
        
        
        public function add() {
		if ($this->request->is('post')) {
                    //debug($this->request->data);
                    //debug($this->request->data['Post']['tittle']);exit;
                    $tittle = $this->request->data['Post']['tittle'];
                    $content = $this->request->data['Post']['content'];
                    
                   $this->request->data['Post']['user_id']= $this->Auth->user('id');
                    $this->request->data['Post']['tittle']= $tittle;
                    $this->request->data['Post']['content']= $content;
                    
                    $this->Post->create();
                    if ($this->Post->save($this->request->data)) {
                        $this->Session->setFlash(__('The post has been saved.'));
                        return $this->redirect(array('controller' => 'posts','action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
                        $this->redirect(array('controller' => 'posts','action' => 'add'));
			}
                  }
            }
            
            public function api_add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$response['error'] = '0';
                                $response['msg'] = "success";
			} else {
				$response['error'] = '1';
                                $response['msg'] = "sorry";
			}
		}
		$this->set(array(
                    'data' => $response,
                    '_serialize' => array('data')
                ));
	}
          public function api_index(){
           $dailyPosts = $this->Post->find('all');
           if($dailyPosts){
                $response['error'] = '0';
                $response['msg'] = 'success';
                $response['list'] = $dailyPosts;
            }else{
                $response['error'] = '1';
                $response['msg'] = 'sorry';
            }
            $this->set(array(
                    'data' => $response,
                    '_serialize' => array('data')
                ));
        }
        
        
        
        
            
            
            
            
            
}
