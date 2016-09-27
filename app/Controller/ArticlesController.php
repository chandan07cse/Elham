<?php

namespace Elham\Controller;
use Elham\Model\Article;
use Symfony\Component\HttpFoundation\Request;
use Elham\Validation\ArticleValidation;
class ArticlesController extends BaseController{

    protected $article,$validator;

    public function __construct()
    {
        $this->article = new Article();
        $this->validator = new ArticleValidation();
    }

    public function create()
    {
        $this->bladeView('InputArticle');
    }
    public function store(Request $request)
    {
        $user_id = AuthController::userId();
        $caption = $request->get('caption');
        $description = $request->get('description');

        $inputs = $request->request->all();
        $this->validator->validate($inputs);
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();
            echo json_encode(['errorBag'=>json_encode($errorBag),'oldInputs'=>json_encode($inputs)]);
//            $this->redirect('/articles/input')//sending errors to a route with error bag & old values
//            ->with(['errorBag'=>json_encode($errorBag),'oldInputs'=>json_encode($inputs)]);
        }
        else {
            $this->article->setUserId($user_id);
            $this->article->setCaption($caption);
            $this->article->setDescription($description);
            if ($this->article->insert())
                echo json_encode(['InputConfirmation'=>'Your Article Published Successfully']);
//                $this->redirect('/articles/input')
//                    ->setFlash('articleInput', 'Your Article Published Successfully', 'alert alert-success text-center');
        }
    }

    public function show($id)
    {
        if($_POST){
            $article = Article::where('id',$_POST['id'])->first();
            echo json_encode(['caption'=>$article->caption,'description'=>$article->description]);
        }
        else{
            $article = $this->article->getArticle($id);
            $this->bladeView('ShowArticle',compact('article'));
        }

    }

    public function edit($id)
    {
        $articleData = $this->article->getArticle($id);
        $this->bladeView('EditArticle',compact('articleData'));
    }

    public function update(Request $request)
    {
        $articleId = $request->get('id');
        $inputs = $request->request->all();//fetching all form fields
        $this->validator->validate($inputs);//validating the inputs
        $this->validator->validate($inputs);
        if($this->validator->errors())
        {
            $errorBag = $this->validator->errors();
            $this->redirect('/article/edit/'.$articleId)
                 ->with(['errorBag'=>json_encode($errorBag),'oldInputs'=>json_encode($inputs)]);
        }
        else
        {

            $caption = $request->get('caption');
            $description = $request->get('description');
            $this->article->setCaption($caption);
            $this->article->setDescription($description);
            if($this->article->edit($articleId))
                $this->redirect('/article/edit/'.$articleId)
                    ->setFlash('articleUpdateMsg','Article Updated Successfully','alert alert-success text-center');
        }
    }

    public function destroy($id)
    {
        if($this->article->remove($id))
            $this->redirect('/user/dashboard')
                 ->setFlash('deleteMsg','Article Deleted Successfully','alert alert-success text-center');

    }
}