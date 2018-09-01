<div class="row">

    <h2>Фото</h2>
    <a href="/photo/add" title="Добавить новое фото" class="btn btn-success">Добавить</a>
</div>
<hr>
  <?php
 // foreach($model as $photo ){
?>
<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="#" class="thumbnail">
            <img src="/photos/<?=$model->link?>" alt="no">
        </a>
    </div>
</div>
<?// }
?>

