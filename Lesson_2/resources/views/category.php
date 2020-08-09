<?php include "menu.php";?>
<h1>Категории новостей</h1>
<?php foreach($categories as $key => $value): ?>
    <a category_id="<?=$key?>" href="<?=route('CategoryOne', $value['slug'])?>"><?=$value['text']?></a><br>
<?php endforeach;?>
