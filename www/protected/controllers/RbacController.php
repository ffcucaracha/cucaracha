<?php
class RbacController extends CController //role based access controller
{
    public function filters()
    {
        return array('accessControl');
    }

    public function accessRules()
    {
        return array(
           array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('init'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionInit()
    {
        $auth = Yii::app()->authManager;

        $role=$auth->createRole('usual');

        $role=$auth->createRole('creator');
        $role->addChild('usual');

        $role=$auth->createRole('admin');
        $role->addChild('creator');

        $auth->assign('admin','admin');

        //echo "Выполнено";
        $this->redirect('/site/index');
    }
}
?>