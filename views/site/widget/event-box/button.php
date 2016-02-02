<?php
use yii\helpers\Url;
?>
<p class="btn-add">
    <i class="fa fa-eye"></i>
    <a href="<?=Url::toRoute('event/'.$data->id)?>" class="hidden-sm">View</a>
</p>
<p class="btn-details">
    <i class="fa fa-users"></i>
    <a href="http://www.jquery2dotnet.com" class="hidden-sm">Join</a>
</p>
