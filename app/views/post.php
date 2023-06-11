<?php
include 'app/views/header.php';
?>
<div class="col-12">
    <h2><?=$post['caption']; ?></h2>
    <div class="col-12 mb-2">
        <span class="me-3">Автор: <strong><?=$users[$post['user_id']]; ?></strong></span>
        <span class="me-3">Создан <? echo date('d.m.Y', strtotime($post['created_at'])) . ' ' .
                date('H:i', strtotime($post['created_at'])); ?></span>
        <span class="me-3">Изменён <? echo date('d.m.Y', strtotime($post['updated_at'])) . ' ' .
                date('H:i', strtotime($post['updated_at'])); ?></span>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <? echo nl2br($post['post']); ?>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <h5>Комментарии</h5>
    </div>
    <? if (empty($comments)): ?>
    <div class="col-12 fs-3 my-5 text-center">
        Комментариев пока нет...
    </div>
    <? else:
        foreach ($comments as $comment): ?>
        <div class="col-12 my-3 border-bottom">
            <span class="me-3">Автор: <strong><?=$users[$comment['user_id']]; ?></strong></span>
            <span class="me-3">Создан <? echo date('d.m.Y', strtotime($comment['created_at'])) . ' ' .
                    date('H:i', strtotime($comment['created_at'])); ?></span><br>
            <p><? echo nl2br($comment['comment']); ?></p>
        </div>

    <?
        endforeach;
    endif; ?>
    <form action="/main/add_comment/<? echo $post['id']; ?>" method="post">
        <div class="row">
        <div class="col-10">
            <textarea required class="form-control" name="comment" placeholder="оставьте свой комментарий к посту"></textarea>
        </div>
        <div class="col-2  mt-2">
            <button class="btn btn-primary">Сохранить</button>
        </div>
        </div>
    </form>
</div>