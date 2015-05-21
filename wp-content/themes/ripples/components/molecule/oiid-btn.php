<?php
$text = !empty($value->text) ? $value->text : 'No text';
$url = !empty($value->url) ? $value->url : home_url();
?>
<a href="<?php echo $url; ?>" class="oiid-btn">
      <span class="oiid-btn-inside">
            <?php echo $text; ?>
      </span>
</a>