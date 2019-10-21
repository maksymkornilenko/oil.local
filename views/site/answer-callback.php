<?php
if (Yii::$app->session->hasFlash('successAnswer')): ?>
    <div>
        <h3>
            <div class="js-successbox t-form__successbox t-text t-text_md"><?php echo Yii::$app->session->getFlash('successAnswer')?></div>
        </h3>
    </div>
<?php elseif (Yii::$app->session->hasFlash('errorAnswer')): ?>
    <div>
        <h3>
            <div class="js-successbox t-form__errorbox t-text t-text_md"><?php echo Yii::$app->session->getFlash('errorAnswer')?></div>
        </h3>
    </div>
<?php endif; ?>