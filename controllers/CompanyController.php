<?php

namespace app\controllers;

use Yii;
use app\models\CompanyIndex;
use app\models\CompanyPhylogeny;
use app\models\CompanyIdea;
use yii\web\UploadedFile;

class CompanyController extends BaseController
{    
    //公司简介
    public function actionIndex()
    {
        $model = new CompanyIndex();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $file = UploadedFile::getInstance($model,'picture');
            if ($file) {
                $model->picture = date('Y-m-d') . '-' .uniqid() . '.' . $file->extension;  
                $file->saveAs('uploads/' . $model->picture);
            }
            
            $model->save();
        }
        
        return $this->render('index',[
            'model' => $model,
        ]);
    }
    
    //发展史和公司文化
    public function actionPhylogeny(){
        $model = new CompanyPhylogeny();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
        }
        
        return $this->render('phylogeny',[
            'model' => $model,
        ]);
    }
    
    //经营理念
    public function actionIdea(){
        $model = new CompanyIdea();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $file1 = UploadedFile::getInstance($model,'picture1');
            if ($file1) {
                $model->picture1 = date('Y-m-d') . '-' .uniqid() . '.' . $file1->extension;  
                $file1->saveAs('uploads/' . $model->picture1);
            }
            
            $file2 = UploadedFile::getInstance($model,'picture2');
            if ($file2) {
                $model->picture2 = date('Y-m-d') . '-' .uniqid() . '.' . $file2->extension;  
                $file2->saveAs('uploads/' . $model->picture2);
            }
            
            $file3 = UploadedFile::getInstance($model,'picture3');
            if ($file3) {
                $model->picture3 = date('Y-m-d') . '-' .uniqid() . '.' . $file3->extension;  
                $file3->saveAs('uploads/' . $model->picture3);
            }
            
            $model->save();
        }
        
        return $this->render('idea',[
            'model' => $model,
        ]);
    }
    
}