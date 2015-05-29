<div class="entry-meta">
    <p class="published"><?= __('entryMeta.published', 'ripples'); ?>
        <time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date('j.m.Y \k\l. H:i'); ?></time>
    </p>
    <p class="byline"><?= __('entryMeta.writtenBy', 'ripples'); ?> <?= get_the_author(); ?></p>
</div>
