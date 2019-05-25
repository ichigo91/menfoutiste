<div id="builds">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Héros</th>
        <th scope="col">Type de build</th>
        <th scope="col">niv 1</th>
        <th scope="col">niv 4</th>
        <th scope="col">niv 7</th>
        <th scope="col">niv 10</th>
        <th scope="col">niv 13</th>
        <th scope="col">niv 16</th>
        <th scope="col">niv 20</th>
        <th scope="col">Ajouté par</th>
        <th scope="col">A jour</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
<?php 
  foreach($builds as $k=>$v): 
?>

<?php endforeach ?>
</table>
</div><br>
<div class="row">
  <div class="col align-self-center text-center">
    <a class="btn btn-primary" href="<?php echo Router::url('games/user_edit'); ?>" role="button">Ajouter une game</a>
  </div>
</div><br>