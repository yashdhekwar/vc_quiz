<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\QuizListModel;

class QuizList extends BaseController
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
  public function saveQuiz()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $model = new QuizListModel();
    if (is_numeric($data['moduleid'])) {
      $st = $model->update($data['moduleid'], $data);
    } else {
      if ($model->insert($data, false)) {
        $data['moduleid'] = $model->getInsertID();
      }
    }
    echo json_encode($data);
  }
  public function getQuizList()
  {
    $model = new QuizListModel();
    $list = $model->findAll();

    echo json_encode($list);
  }
  public function delQuiz()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $model = new QuizListModel();
    if ($model->delete($data->mid))
      echo "Deleted";
  }
  public function editQuiz()
  {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $model = new QuizListModel();
    $st =  $model->find($data->moduleid);

  //  echo json_encode($st);
     return view('quizEntry', $st);
  }

}
