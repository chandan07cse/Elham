<?php
namespace Elham\Model;

use config\PDO;//For PDO Queries
use Illuminate\Database\Eloquent\Model as Eloquent;//For Eloquent Queries
use Illuminate\Database\Capsule\Manager as Capsule;//For Query Builder
class Article extends Eloquent{
    //use PDO;//uncomment this line if you wanna use pdo queries
    /**
     * The attributes that are mass assignable to table
     *
     * @var array
     */
    protected $fillable=[
        'user_id','caption','description'
    ];
    public $timestamps = false;//uncomment this line if you wanna use created_at & updated_at fields
    protected $userId,$caption,$description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    public function insert()
    {
        $insert = Article::create([
            'user_id'=>$this->getUserId(),
            'caption'=>$this->getCaption(),
            'description'=>$this->getDescription(),
        ]);
        return $insert ? true : false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getArticle($id)
    {
        return Article::where('id',$id)->first();
    }

    public function edit($articleId)
    {
        $update = Article::where('id',$articleId)
            ->update([
                    'caption' => $this->getCaption(),
                    'description' => $this->getDescription()
                    ]
            );
        return $update ? true : false;
    }

    public function remove($id)
    {
        return Article::find($id)->delete();
    }
}