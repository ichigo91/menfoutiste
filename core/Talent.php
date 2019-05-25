<?php
class Talent{

	public $controller;
	public $errors;

	public function __construct($controller){
		$this->controller = $controller;
	}

	public function talent($lvl,$talent,$i,$id,$id_talent){
		$talent = unserialize($talent);
		$html = '<td scope="row"><span data-toggle="tooltip" data-placement="top" title="'.$talent[$id_talent-1]['nom'].'"><img id="'.$lvl.'-'.$id.'-'.$id_talent.'" src="'.Router::webroot('img/heros/'.$id.'/'.$talent[$id_talent-1]['image']).'" height="40" width="40" onclick="captureEvent(event,\''.$lvl.'-'.$id.'-'.$id_talent.'\');" data-toggle="modal" data-target="#modal-'.$lvl.'-'.$id.'-'.$id_talent.'"></span></td>';
		$html .= '<span id="nom'.$lvl.'-'.$id.'-'.$id_talent.'" class="nom" style="display:none">'.$talent[$id_talent-1]['nom'].'</span>';
			$html .= '<div class="modal fade" id="modal-'.$lvl.'-'.$id.'-'.$id_talent.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header">';
			$html .= '<h5 class="modal-title" id="exampleModalLongTitle">'.$talent[$id_talent-1]['nom'].'</h5>';
			$html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">';
			$html .= $talent[$id_talent-1]['description'];
			$html .= '</div></div></div></div>';
		return $html;
	}

	public function spell($touche,$spell,$id){
		$spell = unserialize($spell);
		if($spell['image'] != ""){
			$img = 'img/heros/'.$id."/".$spell['image'];
		}else{
			$img = "img/theme/nochoice.png";
		}
		$html = '<a href="#" id="'.$touche.'" onclick="event.preventDefault()" data-toggle="modal" data-target="#modal-'.$touche.'" class="talent"><img id="'.$touche.'" src="'.Router::webroot($img).'" height="64" width="64" class="stalent" data-toggle="tooltip" data-placement="top" title="'.$spell['nom'].'"></a><span id="nomA" class="nom" style="display:none">'.$spell['nom'].'</span>';
		//$html .= '<img id="touche'.$touche.'" class="touche" src="'.Router::webroot('img/theme/'.$touche.'.png').'">';
		$html .= '<div class="modal fade" id="modal-'.$touche.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header">';
		$html .= '<h5 class="modal-title" id="exampleModalLongTitle">'.$spell['nom'].'</h5>';
		$html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">';
		if($spell['mana']!=''){ 
    		$html .= '<p>Mana : '.$spell['mana'].'</p>';
    	}
    	if($spell['cd']!=''){
    		$html .= '<p>Temps de recharge : '.$spell['cd'].' secondes</p>';
    	}
		$html .= $spell['description'];
		$html .= '</div></div></div></div>';
    	return $html;
	}

	public function talents($params = array()){
		$talents = unserialize($params['talents']);
		$lvl = $params['lvl'];
		$id = $params['id'];
		$html = '<div class="d-flex justify-content-around"><span class="talent">'.$lvl.'</span>';
		for ($i=0; $i < sizeof($talents); $i++) { 
			$html .= '<a href="#" id="'.$lvl.'-'.($i+1).'" onclick="event.preventDefault();';
			if(isset($params['select'])){
				if($params['select'] == true){
					$html .= 'talent(this.id)';
				}
			}
			$html.= '" data-toggle="modal" data-target="#modal-'.$lvl.'-'.($i+1).'"';
			if(isset($params['choix'])){
				if($params['choix'] == $i+1){
					$html .= ' class="talent talent-active"';
				}
			}
			if(isset($params['select'])){
				if($params['select'] == true){
					if($params['value'] != '' && $params['value'] == $i+1){
						$html .= 'class="talent '.$lvl.' talent-active"';
					}else{
						$html .= 'class="talent '.$lvl.'"';
					}
				}else{
					$html .= 'class="talent"';
				}
			}else{
				$html .= 'class="talent"';
			}
			$html .= '><img id="t'.$lvl.'-'.($i+1).'" src="'.Router::webroot('img/heros/'.$id.'/'.$talents[$i]['image']).'" height="64" width="64" data-toggle="tooltip" data-placement="top" title="'.$talents[$i]['nom'].'"></a><span id="nomt'.$lvl.'-'.($i+1).'" class="nom" style="display:none">'.$talents[$i]['nom'].'</span>';
			if(!isset($params['select'])){
				$html .= '<div class="modal fade" id="modal-'.$lvl.'-'.($i+1).'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"><div class="modal-dialog modal-dialog-centered" role="document"><div class="modal-content"><div class="modal-header">';
				$html .= '<h5 class="modal-title" id="exampleModalLongTitle">'.$talents[$i]['nom'].'</h5>';
				$html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">';
				$html .= $talents[$i]['description'];
				$html .= '</div></div></div></div>';
			}
    	}
    	$html .= '</div><br>';
		return $html;
	}

	public function desc($talents,$lvl){
		$talents = unserialize($talents);
		$html = '';
		for ($i=0; $i < sizeof($talents); $i++) { 
    		$html .= '<span id="nomtd'.$lvl.'-'.$i.'" class="nomdesc" style="display: none;">'.$talents[$i]['description'].'</span>';
    	}
    	return $html;
	}
	
}
?>