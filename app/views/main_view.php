<?php
include 'app/views/header.php';
?>

<form action="/main/createpost" method="post">
    <div class="row my-3">

        <div class="col-12">
            <a  data-bs-toggle="collapse" href="#createform" role="button" aria-expanded="false" aria-controls="collapseExample">
                Создать пост
            </a>
            <div class="collapse" id="createform">
                <input required minlength="3" class="form-control mt-3" type="text" name="caption" placeholder="Заголовок">
                <textarea required minlength="10" class="form-control mt-3" name="post" placeholder="текст поста"></textarea>
                <div class="text-end mt-3">
                    <button class="btn btn-primary" type="submit">Создать</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
</form>

<? if(!empty($posts) && is_array($posts)) foreach ($posts as $post): ?>
<div class="row my-3">
    <div class="col-12 mb-2">
        <span class="me-3">Автор: <strong><?=$users[$post['user_id']]; ?></strong></span>
        <span class="me-3">Создан <? echo date('d.m.Y', strtotime($post['created_at'])) . ' ' .
                date('H:i', strtotime($post['created_at'])); ?></span>
        <span class="me-3">Изменён <? echo date('d.m.Y', strtotime($post['updated_at'])) . ' ' .
                date('H:i', strtotime($post['updated_at'])); ?></span>
    </div>
    <div class="col-12 mb-5 pb-2 border-bottom">
        <h5><a href="/main/post/<?=$post['id']; ?>"><? echo $post['caption']; ?></a></h5>
        <? echo mb_substr($post['post'], 0, 50); ?>
    </div>


</div>

<? endforeach; ?>
<?php
//var_dump($users);
?>