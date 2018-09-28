<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Ты сейчас на <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php //echo Yii::app().gethostname() ; ?>
<?php echo Yii::app()->db->connectionString; ?>


<p><em>здесь находится список пользователей <a href="http://cucaracha/index.php?r=user/index">щелк</a> </em></p>
<h2>Ссылка работает при закомменченном урле в маине</h2>