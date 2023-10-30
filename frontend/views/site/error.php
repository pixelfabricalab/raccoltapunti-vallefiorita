<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <div style="max-width: 340px;">
        <div class="tenor-gif-embed" data-postid="12674712" data-share-method="host" data-aspect-ratio="1.78" data-width="100%"><a href="https://tenor.com/view/monkey-computer-not-working-computer-broken-computer-problems-computer-issues-gif-12674712">Monkey Computer Not Working GIF</a>from <a href="https://tenor.com/search/monkey-gifs">Monkey GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </div>

</div>
