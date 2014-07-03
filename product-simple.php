<?php
$block->open();
$block->document->tag('img', 'image', ['class'=>'img-responsive']);
?>
<div class="info">
    <?php

    $block->document->tag('h1', 'name');
    $block->document->tag('h2', 'description');

    $hasRating = !empty($block->document['aggregateRating']) &&
        $block->document['aggregateRating']->offsetExists('ratingValue');

    if ($hasRating) {
        $rating = $block->document['aggregateRating']['ratingValue'];

        $block->document['aggregateRating']->open('div', ['class'=>'rating']);
            for ($i = 0; $i < 5; $i++) {
                echo '<span class="glyphicon glyphicon-star' . ($i >= $rating ? ' dark' : '') . '"></span>';
            }
            $block->document['aggregateRating']->meta(['ratingValue', 'reviewCount']);
        $block->document['aggregateRating']->close();
    }

    ?>
    <div class="price">£<?php $block->document['offers']->tag('span', 'price'); ?></div>
</div>
<?php

$block->close();
