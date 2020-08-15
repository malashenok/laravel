<?php include dirname(__DIR__) . "/menu.php";?>
<h1>Новости</h1>
<?php foreach($news as $key => $value): ?>
    <a href="<?=route('NewsOne', $key)?>"><?=$value['title']?></a><br>
<?php endforeach;?>
