<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        
        <link href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/mystyleadmin.css" rel="stylesheet" type="text/css" />
        
        <!-- jQuery 2.0.2 -->
        <script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.min.js"></script> 

    </head>
<body class="bg-black">
<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<br/>
<br/>
	<div class="row">
		<div class="col-md-6 col-md-offset-3" style="text-align: center">
			<img src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/img/adminlogo.png" alt="branch pic" width="277px"/>
			<div class="form-box my-label" id="login-box">
				<div class="header">Sign In</div>
				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
				<div class="body bg-gray">
					<div class="form-group">
						<?= $form->field($model, 'username')->textInput(['placeholder' => 'Username']) ?>
					</div>
					<div class="form-group">
						<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>
					</div>
					<div class="form-group my-chk">
						<?= $form->field($model, 'rememberMe')->checkbox() ?>
					</div>
				</div>	
				<div class="footer">
					<?= Html::submitButton('Sign me in', ['class' => 'btn bg-olive btn-block']) ?>
				</div>
				<?php ActiveForm::end(); ?>
			</div>
			<div class="margin text-center">
                <span class="footer_text">Developed by : &nbsp; &nbsp;<a href="http://www.arrowsoft.com.bd/" target="_blank"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/img/arrowbanner.png" alt="branch pic" width="250px" /></a></span>
            </div>
		</div>
	</div>
       
        <!-- Bootstrap -->
    <script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>
