<?php
class HerosController extends Controller{

	function index(){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->set($d);
	}

	function view($id){
		// Récupération du héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->findFirst(array(
			'fields' => array('Heros.id as id', 'Heros.classe as classe','Heros.img as img','Heros.img_min as img_min', 'Heros.caracteristiques as caracteristiques','Heros.solo as solo', 'Heros.nom as nom', 'Heros.last_update as lastup_h','Heros.A as A','Heros.Z as Z','Heros.E as E','Heros.D as D','Heros.autres as autres', 'Heros.talents1 as talents1', 'Heros.talents4 as talents4', 'Heros.talents7 as talents7', 'Heros.talents10 as talents10', 'Heros.talents13 as talents13', 'Heros.talents16 as talents16', 'Heros.talents20 as talents20'),
			'conditions' => array('id'=>$id)
		));
		if(empty($d['heros'])){
			$this->e404('Ce héros n\'existe pas');
		}else{
			$d['heros']->caracteristiques = unserialize($d['heros']->caracteristiques);
			$perPage = 9;
			$this->loadModel('Builds');
			$this->loadModel('Users');
			$this->loadModel('Majs');
			//$conditions = array('online' => 1);
			$d['builds'] = $this->Builds->find(array(
				'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
				'ordre' => array('champ' => 'id','sens' => 'DESC'),
				'jointure' => array('table' => 'heros', 'champs' => array('heros','id')),
				'conditions' => array('heros.id'=>$id),
				'limit' => ($perPage*($this->request->page-1)).','.$perPage
			));
			$d['users'] = $this->Users->find(array(
				'fields' => array('id', 'login')
			));
			$d['total'] = $this->Builds->findCount(array('conditions'=>array('Heros.id'=>$id)));
			$d['page'] = ceil($d['total'] / $perPage);
			$d['maj'] = $this->Majs->findFirst(array(
				'ordre' => array('champ' => 'id','sens' => 'DESC')
			));
			$this->set($d);
			if($this->Session->isLogged()){
				$e['user'] = $_SESSION['User'];
				$this->set($e);
			}	
		}

		$this->set($d);
	}

	function user_edit($id = null){
		$this->loadModel('Heros');
		if($id === null){
			$d['title'] = 'Ajouter un héros';
			$d['button'] = 'Ajouter';
			$d['nb'] = array(1,1,1,1,1,1,1,0);
			$id = $this->Heros->findFirst(array('ordre' => array('champ' => 'id','sens' => 'DESC')))->id;
			$id += 1;
		}else{
			$heros = $this->Heros->findFirst(array(
				'conditions' => array('id'=>$id)
			));
			$d['button'] = 'Modifier';
		}
		$d['id'] = $id;
		if($this->request->data){
			if($this->Heros->validates($this->request->data)){
				$this->request->data->last_update = date("Y-m-d H:i:s");
				$this->request->data->caracteristiques = serialize(array(
					'dps' => $this->request->data->dps,
					'aps' => $this->request->data->aps,
					'range' => $this->request->data->range,
					'mana' => $this->request->data->mana,
					'rmana' => $this->request->data->rmana,
					'lp' => $this->request->data->lp,
					'rlp' => $this->request->data->rlp,
					'aas' => 0,
					'ap' => 0,
					'speed' =>0
				));
				unset($this->request->data->dps);
				unset($this->request->data->aps);
				unset($this->request->data->range);
				unset($this->request->data->mana);
				unset($this->request->data->rmana);
				unset($this->request->data->lp);
				unset($this->request->data->rlp);

				$dir = WEBROOT.DS.'img'.DS.'heros'.DS.$id;
				if(!file_exists($dir)) mkdir($dir,0777);
				$dir .= DS;

				if(!empty($_FILES['img_min']['name'])){
					$this->request->data->img_min = $_FILES['img_min']['name'];
	        		$fichier = basename($_FILES['img_min']['name']);
	        		if(move_uploaded_file($_FILES['img_min']['tmp_name'], $dir.$fichier)){
	            		echo 'Upload effectué avec succès !';
	        		}
	        		else{
	            		echo 'Echec de l\'upload !';
	        		}
				}else{
					$this->request->data->img_min = $this->request->data->previmg_min;
				}
				unset($this->request->data->previmg_min);
				
				if(!empty($_FILES['img']['name'])){
					$this->request->data->img = $_FILES['img']['name'];
	        		$fichier = basename($_FILES['img']['name']);
	        		if(move_uploaded_file($_FILES['img']['tmp_name'], $dir.$fichier)){
	            		echo 'Upload effectué avec succès !';
	        		}
	        		else{
	            		echo 'Echec de l\'upload !';
	        		}
				}else{
					$this->request->data->img = $this->request->data->previmg;
				}
				unset($this->request->data->previmg);

				if(!empty($_FILES['imageA']['name'])){
					$img = $_FILES['imageA']['name'];
					$fichier = basename($_FILES['imageA']['name']);
					if(move_uploaded_file($_FILES['imageA']['tmp_name'], $dir . $fichier)){
					    echo 'Upload effectué avec succès !';
					}
					else{
					    echo 'Echec de l\'upload !';
					}
				}else{
					$img = $this->request->data->previmageA;
				}
				$this->request->data->A = serialize(array('nom'=>$this->request->data->nomA, 'mana'=>$this->request->data->manaA, 'cd'=>$this->request->data->cdA,'description'=>$this->request->data->descriptionA, 'image'=>$img));
				unset($this->request->data->nomA);
				unset($this->request->data->manaA);
				unset($this->request->data->cdA);
				unset($this->request->data->descriptionA);
				unset($this->request->data->previmageA);

				if(!empty($_FILES['imageZ']['name'])){
					$img = $_FILES['imageZ']['name'];
			        $fichier = basename($_FILES['imageZ']['name']);
			        if(move_uploaded_file($_FILES['imageZ']['tmp_name'], $dir . $fichier)){
			            echo 'Upload effectué avec succès !';
			        }
			        else{
			            echo 'Echec de l\'upload !';
			        }
				}else{
					$img = $this->request->data->previmageZ;
				}
				$this->request->data->Z = serialize(array('nom'=>$this->request->data->nomZ, 'mana'=>$this->request->data->manaZ, 'cd'=>$this->request->data->cdZ,'description'=>$this->request->data->descriptionZ, 'image'=>$img));
				unset($this->request->data->nomZ);
				unset($this->request->data->manaZ);
				unset($this->request->data->cdZ);
				unset($this->request->data->descriptionZ);
				unset($this->request->data->previmageZ);

				if(!empty($_FILES['imageE']['name'])){
					$img = $_FILES['imageE']['name'];
				        $fichier = basename($_FILES['imageE']['name']);
				        if(move_uploaded_file($_FILES['imageE']['tmp_name'], $dir . $fichier)){
				            echo 'Upload effectué avec succès !';
				        }
				        else{
				            echo 'Echec de l\'upload !';
				        }
				}else{
					$img = $this->request->data->previmageE;
				}
				$this->request->data->E = serialize(array('nom'=>$this->request->data->nomE, 'mana'=>$this->request->data->manaE, 'cd'=>$this->request->data->cdE,'description'=>$this->request->data->descriptionE, 'image'=>$img));
				unset($this->request->data->nomE);
				unset($this->request->data->manaE);
				unset($this->request->data->cdE);
				unset($this->request->data->descriptionE);
				unset($this->request->data->previmageE);

				if(!empty($_FILES['imageD']['name'])){
					$img = $_FILES['imageD']['name'];
			        $fichier = basename($_FILES['imageD']['name']);
			        if(move_uploaded_file($_FILES['imageD']['tmp_name'], $dir . $fichier)){
			            echo 'Upload effectué avec succès !';
			        }
			        else{
			            echo 'Echec de l\'upload !';
			        }
				}else{
					$img = $this->request->data->previmageD;
				}
				$this->request->data->D = serialize(array('nom'=>$this->request->data->nomD, 'mana'=>$this->request->data->manaD, 'cd'=>$this->request->data->cdD,'description'=>$this->request->data->descriptionD, 'image'=>$img));
				unset($this->request->data->nomD);
				unset($this->request->data->manaD);
				unset($this->request->data->cdD);
				unset($this->request->data->descriptionD);
				unset($this->request->data->previmageD);

				$temp = array();
				array_push($temp, $this->request->data->nomaut);
				if($this->request->data->nbautres!=0){
					for($i=0;$i<$this->request->data->nbautres;$i++){
						$nom = 'nom_autres_'.$i;
						$desc = 'description_autres_'.$i;
						$mana = 'mana_autres_'.$i;
						$cd = 'cd_autres_'.$i;
						$touche = 'touche_autres_'.$i;
						$image = 'image_autres_'.$i;
						$previmg = 'previmage_autres_'.$i;
						if(!empty($_FILES[$image]['name'])){
							$img = $_FILES[$image]['name'];
			        		$fichier = basename($_FILES[$image]['name']);
			        		if(move_uploaded_file($_FILES[$image]['tmp_name'], $dir . $fichier)){
			            		echo 'Upload effectué avec succès !';
			        		}
			        		else{
			            		echo 'Echec de l\'upload !';
			        		}
						}else{
							$img = $this->request->data->$previmg;
						}
						array_push($temp, array('nom' =>$this->request->data->$nom, 'mana'=>$this->request->data->$mana, 'cd'=>$this->request->data->$cd, 'description' => $this->request->data->$desc, 'image' => $img, 'touche' => $this->request->data->$touche));

					    unset($this->request->data->$nom);
					    unset($this->request->data->$desc);
					    unset($this->request->data->$mana);
					    unset($this->request->data->$cd);
					    unset($this->request->data->$touche);
					    unset($this->request->data->$previmg);
					}
				}
				$this->request->data->autres = serialize($temp);
				unset($this->request->data->nomaut);
				unset($this->request->data->nbautres);

				$talents = array('1','4','7','10','13','16','20');
				$temp = array();
				foreach($talents as $k=>$v){
					$nb = 'nb'.$v;
					$name = 'talents'.$v;
					for($i=0;$i<$this->request->data->$nb;$i++){
						$nom = 'nom_'.$v.'_'.$i;
						$desc = 'description_'.$v.'_'.$i;
						$img = 'image_'.$v.'_'.$i;
						$prev = 'previmage_'.$v.'_'.$i;
						if(!empty($_FILES[$img]['name'])){
							$name_img = $_FILES[$img]['name'];
					        $fichier = basename($_FILES[$img]['name']);
					        if(move_uploaded_file($_FILES[$img]['tmp_name'], $dir . $fichier)){
					            echo 'Upload effectué avec succès !';
					        }
					        else{
					            echo 'Echec de l\'upload !';
					        }
					    }else{
					    	$name_img = $this->request->data->$prev;
					    }
					    array_push($temp, array('nom' =>$this->request->data->$nom, 'description' => $this->request->data->$desc, 'image' => $name_img));
					    unset($this->request->data->$nom);
					    unset($this->request->data->$desc);
					    unset($this->request->data->$prev);
					}
					$this->request->data->$name = serialize($temp);
					unset($this->request->data->$nb);
					$temp = array();
				}
				if(isset($id)){
					$this->request->data->id = $id;
				}
				$nom_heros = $this->request->data->nom;

				print_r($this->request->data);
				//die();
				$this->Heros->save($this->request->data);
				$this->Session->setFlash($nom_heros.' a bien été ajouté','success',2);
				$this->redirect('heros');
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error');
				$d['nb'] = array(
					$this->request->data->nb1,
					$this->request->data->nb4,
					$this->request->data->nb7,
					$this->request->data->nb10,
					$this->request->data->nb13,
					$this->request->data->nb16,
					$this->request->data->nb20,
					$this->request->data->nbautres
				);
			}
		}else{
			if($d['button'] != 'Ajouter'){
				$this->request->data = $this->Heros->findFirst(array(
					'conditions' => array('id'=>$id)
				));
				$d['title'] = 'Modifier '.$this->request->data->nom;
				$carac = unserialize($this->request->data->caracteristiques);
				$this->request->data->dps = $carac['dps'];
				$this->request->data->aps = $carac['aps'];
				$this->request->data->range = $carac['range'];
				$this->request->data->mana = $carac['mana'];
				$this->request->data->rmana = $carac['rmana'];
				$this->request->data->lp = $carac['lp'];
				$this->request->data->rlp = $carac['rlp'];

				set_obj_unserialize($this->request->data,$this->request->data->A,array('char'=>'A'));
				set_obj_unserialize($this->request->data,$this->request->data->Z,array('char'=>'Z'));
				set_obj_unserialize($this->request->data,$this->request->data->E,array('char'=>'E'));
				set_obj_unserialize($this->request->data,$this->request->data->D,array('char'=>'D'));

				set_obj_unserialize_array($this->request->data,$this->request->data->talents1,array('char'=>'1'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents4,array('char'=>'4'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents7,array('char'=>'7'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents10,array('char'=>'10'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents13,array('char'=>'13'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents16,array('char'=>'16'));
				set_obj_unserialize_array($this->request->data,$this->request->data->talents20,array('char'=>'20'));

				$autres = unserialize($this->request->data->autres);
				$this->request->data->nomaut = $autres[0];
				if(isset($autres[1])){
					array_shift($autres);
					$this->request->data->nbautres = count($autres)-1;
					set_obj_unserialize_array($this->request->data,serialize($autres),array('char'=>'autres'));
				}else{
					$this->request->data->nbautres = 0;
				}

				$d['nb'] = array(
					$this->request->data->nb1,
					$this->request->data->nb4,
					$this->request->data->nb7,
					$this->request->data->nb10,
					$this->request->data->nb13,
					$this->request->data->nb16,
					$this->request->data->nb20,
					$this->request->data->nbautres
				);
			}
		}
		$this->set($d);
	}

	function admin_delete($id){
		$this->loadModel('Heros');
		$this->Heros->delete($id);
		$this->Session->setFlash('Le héros a bien été supprimé','success');
		$this->redirect('');
	}
}