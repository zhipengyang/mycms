<?php
use \dmstr\widgets\Menu;
?>
<aside class="main-sidebar">

	<section class="sidebar">

		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= empty(Yii::$app->user->identity->avatar) ? $directoryAsset . '/img/user2-160x160.jpg' : Yii::$app->user->identity->avatar ?>" class="img-circle" alt="User Image"/>
			</div>
			<div class="pull-left info">
				<p><?= empty(Yii::$app->user->identity->fullname) ? Yii::$app->user->identity->username : Yii::$app->user->identity->fullname ?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
			</div>
		</form>
		<!-- /.search form -->
		<?= Menu::widget([
			'options' => ['class' => 'sidebar-menu'],
			'items'   => mdm\admin\components\MenuHelper::getAssignedMenu(Yii::$app->user->id, null, function($menu) {
				return [
					'label' => $menu['name'],
					'url'   => [$menu['route']],
					'icon'  => !isset($menu['data'])? '' :$menu['data'],
					'items' => $menu['children']
				];
			}),
		]) ?>
		?>

	</section>

</aside>
