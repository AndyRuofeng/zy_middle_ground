<?php
/**
 * Created by  ruofeng
 * Date: 2019-08-07
 * Time: 15:35
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Countries</h1>
    <ul>
        <?php foreach ($countries as $country): ?>
            <li>
                <?= Html::encode("{$country->name} ({$country->code})") ?>:
                <?= $country->population ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>