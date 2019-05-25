<table class="table table-striped" id="request_tab">
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
	$class = array(array('blue','bleuclair','red','violet','white'),array('blue_i','bleuclair_i','red_i','violet_i','white_i'));
?>
			<?php
			$i = 0;
				if(isset($_SESSION['User']->prefs->builds)&&($_SESSION['User']->prefs->builds<2)){
					if($v->solo == 1 || $v->sol == 1){
						$classe = $v->role.' solo';
					}else{
						$classe = $v->role;
					}
				}else{
					$classe = $v->classe;
				}
				echo '<tr class="builds '.$classe.'" onclick="redirect('.$v->id_build.')" style="cursor: pointer;">';
				echo '<td>'.$v->nom.'</td>';
				echo '<td>'.$v->type.'</td>';
				echo $this->Talent->talent(1,$v->talents1,$i,$v->id,$v->talent1);
				echo $this->Talent->talent(4,$v->talents4,$i,$v->id,$v->talent4);
				echo $this->Talent->talent(7,$v->talents7,$i,$v->id,$v->talent7);
				echo $this->Talent->talent(10,$v->talents10,$i,$v->id,$v->talent10);
				echo $this->Talent->talent(13,$v->talents13,$i,$v->id,$v->talent13);
				echo $this->Talent->talent(16,$v->talents16,$i,$v->id,$v->talent16);
				echo $this->Talent->talent(20,$v->talents20,$i,$v->id,$v->talent20);
				echo '<td>'.$users[$v->id_user-1]->login.'</td>';
				if(in_array($v->id, unserialize($maj->heros_modif))){
					if(strtotime($v->lastup_h) < strtotime($maj->date_maj)){
						$ajour = False;
					}
					else if(strtotime($v->lastup) < strtotime($v->lastup_h)){
						$ajour = False;
					}else{
						$ajour = True;
					}
				}else if(strtotime($v->lastup) < strtotime($v->lastup_h)){
					$ajour = False;
				}else{
					$ajour = True;
				}
				echo '<td>';
				if($ajour){
					echo '<span class="oi oi-check h2" aria-hidden="true" style="color:green"></span>';
				}else{
					echo '<span class="oi oi-x h2" aria-hidden="true" style="color:red"></span>';
				}
				echo '</td><td>';
				if($user->id == $v->id_user){
					echo '<a href="/builds/user_edit/'.$v->id.'/'.$v->id_build.'"><span class="oi oi-pencil h2" aria-hidden="true"></span></a>';
				}
				echo '</td>';
				echo '<td>';
				if($user->id == $v->id_user){
					echo '<a onclick="return confirm(\'Voulez vous vraiment supprimer ce build ?\');" href="'.Router::url('builds/user_delete/'.$v->id_build).'"><span class="oi oi-trash h2" aria-hidden="true" style="color:red"></span></a>';
				}
				echo '</td></tr>';
				$i++;
		?>
<?php endforeach ?>
</table>