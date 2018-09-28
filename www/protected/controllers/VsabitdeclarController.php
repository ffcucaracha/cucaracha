<?php
class VsabitdeclarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
	{
		return array(
     /* array('allow',  // allow roles to perform 'index' and 'view' actions
        'actions'=>array('create', ),
        'roles'=>array('Admin'),
      ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	protected function afterAction($action)
	{
	    $time = sprintf('%0.5f', Yii::getLogger()->getExecutionTime());
        $memory = round(memory_get_peak_usage()/(1024*1024),2)."MB";
        
        echo "Time: $time, memory: $memory";
        parent::afterAction($action);
	}   
     

    public function actionIndex2($id, $cod, $title, $date_out, $date_priv, $type_search)  
    {
        $model = new VSABITDECLAR();
        
 
        $model->unsetAttributes();
 
        if(isset($_GET['Vsabitdeclar'])) {
            $model->attributes = $_GET['Vsabitdeclar'];
        }
                 
        $this->render('index', array('model'=>$model,
                                     'id_abit'=>$id,
                                     'cod_abit'=>$cod,
                                     'title_abit'=>$title,  
                                     'date_out_abit'=>$date_out,
                                     'date_priv'=>$date_priv,
                                     'type_search'=>$type_search                                    
                                     )
                     );
        
    }
    
    public function actionCreate()
    {
          
          
          $this->render('create',array(
              'model'=>'aaa',
          ));
    }
}
?>
