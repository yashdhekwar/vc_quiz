<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\QuestionModel;

class QuestionList extends BaseController
{
  protected $helpers = ['url', 'form'];
  public function initController(
    RequestInterface $request,
    ResponseInterface $response,
    LoggerInterface $logger
  ) {
    parent::initController($request, $response, $logger);
  }
  //--------------------------------------------------
  public function getQuestionList()
  {
    $model = new QuestionModel();
    $list = $model->findAll();
    
    echo json_encode($list);
   // return view('questionList',$list);
  }
  public function saveQuestion(){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $model = new QuestionModel();
    if (is_numeric($data['qid'])) {
      $st = $model->update($data['qid'], $data);
    } else {
      if ($model->insert($data, false)) {
        $data['qid'] = $model->getInsertID();
      }
    }
    echo json_encode($data);
  }
  public function delQuestion(){
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $model = new QuestionModel();
    if ($model->delete($data->qid))
      echo "Deleted";
  }
    public function editQuestion()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $model = new QuestionModel();
    $st =  $model->find($data->qid);

  //  echo json_encode($st);
     return view('questionEntry', $st);
  }
   
    public function getTest(){
      $json = file_get_contents('php://input');
      $data = json_decode($json);
      $model = new QuestionModel();
      $st = $model->where('moduleid',$data->mid)->paginate(1000, 20);
      $arr=array();
        while(count($arr)<10)
        {
            $n = rand(0,count($st)-1);
            for($i=0;$i<count($arr);$i++){
                if($arr[$i] == $st[$n]['qid']) break;
            }
            if($i==count($arr)){
                array_push($arr,$st[$n]['qid']);
            }
        }
        $vdata['ques'] = $model->find($arr);
        
        $vdata['testPage'] = view('testPage');

        return json_encode($vdata);
    
       //   return view('testPage',$st);
    }

 
}
