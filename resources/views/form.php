<?php view('blocks.head', [
    'title' => $title ?? ''
]); ?>

    <form class="" action="/<?= $action ?? 'create' ?>" method="post">
        <?php if($post['id'] ?? false): ?>

    <input type="hidden" name="Id" value="<?=$post['Id'] ?? '' ?>
    <?php endif?>
        <div class="form-group">
            <input type="text" name="Title" placeholder="Title: " value="<?=$post['Title'] ?? '' ?>">
        </div>
        <div class="form-group">
            <textarea name="Content" placeholder="Content..."><?=$post['Content'] ?? '' ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

<?php view('blocks.footer');
