<?php foreach ($articles as $article) : ?>
    <p>post: <?= $article->id ?>  
        code: <?= $article->symbol_code ?>
    </p>
    <h2><?= $article->name ?></h2>
    <p><?= $article->content ?></p>
    <p><?= $article->creation_time." ".$article->author?></p>
    <span>tags: </span>
    <?php foreach ($article->tags as $tag) : ?>
        <span><?= $tag->name ?></span>
    <?php endforeach; ?>
    <?php echo '<br>'.'<br>'.'<br>'?>
<?php endforeach; ?>