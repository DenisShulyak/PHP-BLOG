<?php view('blocks.head',[
    'title'=>$post['Title'] ?? ''
]); ?>
<div class="card">
    <h1><?= $post['Title'] ?? '' ?></h1>
    <p><?=$post['Content'] ?? ''?></p>
    <p><?=$post['CreatedDate'] ?? ''?>
    </p>
    <a href="/update?Id=<?=$post['Id'] ?? 0?>">Change</a>
    <a href="/delete?Id=<?=$post['Id'] ?? 0?>">Delete</a>
</div>


<?php view('blocks.footer');