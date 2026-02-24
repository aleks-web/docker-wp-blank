<?php

$videos = get_field('videos');
$images = get_field('photos');


outputAcfStart();
echo 'Видеоматериалы: <br>';

echo '<div style="display: flex; gap: 20px;">';
foreach ($videos as $video) {
    echo '<div class="videomaterials" style="width: 200px; height: 100px;overflow: hidden;">' . $video['rutube'] . '</div>';
}
echo '</div>';

echo 'Фотоматериалы: <br>';
echo '<div style="display: flex; gap: 20px;">';
foreach ($images as $image) {
    echo '<img style="width: 200px; height:100px;" src="' . $image['image']['url'] . '" />';
}
echo '</div>';

ob_start(); ?>
<style>
    .videomaterials iframe {
        width: 100%;
        height: 100%;
    }
</style>
<?php
$result = ob_get_clean();
echo $result;
outputAcfEnd();