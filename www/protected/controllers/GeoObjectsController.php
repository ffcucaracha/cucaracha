<?php

class GeoObjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
            'ajaxOnly + getCoord',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
            array('allow',
                'actions'=>array('showy','shows','getcoord'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','delete','admin'),
                'roles'=>array('creator'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','view'),
                'roles'=>array('usual'),
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionCreate()
	{
		$model=new GeoObjects;

		if(isset($_POST['GeoObjects']))
		{
			$model->attributes=$_POST['GeoObjects'];
			if($model->save())
                $this->redirect('admin');
        }
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['GeoObjects']))
		{
			$model->attributes=$_POST['GeoObjects'];
			if($model->save())
                return $this->actionAdmin();
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    public function actionGetcoord()
    {
        $points = GeoObjects::Getcoord();
        echo json_encode($points);
    }

    public function actionShowG()
    {
        $this->render('viewG');
    }

    public function actionShowY()
    {
        $this->render('viewY');
    }

    public function actionShowS()
    {
        $this->render('viewS');
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('GeoObjects');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	public function actionAdmin()
	{
		$model=new GeoObjects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GeoObjects'])) {
            $model->attributes = $_GET['GeoObjects'];
        }

        $this->render('admin',array(
			'model'=>$model,
		));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GeoObjects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GeoObjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}
