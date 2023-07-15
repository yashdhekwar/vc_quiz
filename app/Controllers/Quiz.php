<?php

namespace App\Controllers;

use App\Models\QuizListModel;
use App\Models\QuestionModel;
use App\Models\Users;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


class Quiz extends BaseController
{
    protected $helpers = ['url', 'form'];                

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
    //    date_default_timezone_set('Asia/Kolkata');
    }    
    public function index(int $id=0)
    {   
        if($id==1){
            unset(
               $_SESSION['uname'],
               $_SESSION['role']
           );

       } 
        return $this->showPage(0);
    }
    public function showPage(int $pflag=0)
    {
        $user['uname'] = "Guest";
        $user['role'] = "G";
        if(isset($_SESSION['uname'])){
            $user['uname'] = $_SESSION['uname'];
            $user['role'] = $_SESSION['role'];
        }
        $data['header'] = view('header',$user);
        $data['footer'] = view('footer',$user);

        if($pflag ==0){
            $data['main']= view('homePage');
        }//elseif($pflag == 1){
        //      $data['main']=view('testPage');
            // }      
            elseif($pflag == 2){
            $model = new QuestionModel();
            $fields = $model->getFieldData('questions');
            foreach($fields as $field){
              $fld[$field->name] = $field->default;
            }
            $pages['questionEntry']=view('questionEntry',$fld);
            $data['main']=view('questionList',$pages);
        }elseif($pflag == 3){
            $model = new QuizListModel();
            $fields = $model->getFieldData('modules');
            foreach($fields as $field){
              $fld[$field->name] = $field->default;
            }
            $pages['quizEntry']=view('quizEntry',$fld);
            $data['main'] = view('quizList', $pages);
        }
        
        return view('landingPage',$data);
    }

    public function chkLogin(){
        $json = file_get_contents('php://input');
        $idata = json_decode($json);
  
//        print_r($data);
     //   $st="test";
        $model = new Users();
        $st = $model->find($idata->email);
        if(is_null($st)){
            $data['status'] = 1;
        } else if($st['pass']===$idata->pass){
            $data['status'] = 0;
            $data['uname'] = $_SESSION['uname']  = $st['uname'];
            $data['role'] = $_SESSION['role'] = $st['role'];
            $data['header'] = view('header',$data);
         } else {
            $data['status'] = 2;
        }
        echo json_encode($data);
    }
}