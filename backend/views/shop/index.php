<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use backend\models\Shop;
use yii\db\Query;
use yii\web\session;

?>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular.min.js"></script>
<!-- Libraries -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular-route.min.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/angular-animate.min.js"></script>
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/custom.css" type="text/css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'> -->

<sction ng-cloak="" ng-app="shop" >
<!-- Shop owner app section starts here  -->
<div class="row">

	<div class="col-md-12">
	    <div class="page-content">
	      <div ng-view="" id="ng-view"></div>
	    </div>
	</div>
</div>
<!-- shop owner app ends here -->

</section>

<!-- AngularJS custom codes -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shop/app.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shop/data.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shop/directives.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shop/shopListCtrl.js"></script>
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/app/shop/shopCtrl.js"></script>
<!-- Some Bootstrap Helper Libraries -->

<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/underscore.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/ie10-viewport-bug-workaround.js"></script>

