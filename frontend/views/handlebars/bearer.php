<?php

// header('Authorization: Bearer vb0CRZfENb8C-FWBBBSvQVa_Aka1pMXu');
?>
<div class="row">
    <div class="col-sm-6">
        <h1>Bearer</h1>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
    $.ajax({
        url: '/api/v1/statuses',
        type: 'get',
        headers: {
            "Authorization": "Bearer <?= Yii::$app->user->identity->auth_key ?>" 
        }
    }).done(function (data) {
        console.log(data);
    });
</script>