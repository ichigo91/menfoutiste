<div class="page-header text-center">
	<h1><?php echo $title; ?></h1>
</div>
<br>
<form action="<?php echo Router::url('heros/user_edit/'.$id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Caractéristiques</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sorts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Talents</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <?php echo $this->Form->input('nom','Nom'); ?><br>
<?php echo $this->Form->select('classe','Classe',array('Guerrier défensif','Guerrier offensif','Soutiens','Soigneurs','Assassin en mêlée', 'Assassin à distance')); ?><br>
<?php echo $this->Form->input('solo','Solo lane',array('type'=>'checkbox')); ?><br>
<?php echo $this->Form->input('img','Image',array('type'=>'file-talent','id'=>'img','onchange'=>'loadFile(event,this.id)','heros'=>$id)); ?><br>
<?php echo $this->Form->input('img_min','Image miniature',array('type'=>'file-talent','id'=>'img_min','onchange'=>'loadFile(event,this.id)','heros'=>$id)); ?><br>

<h2>Caractéristiques</h2>
<?php echo $this->Form->input('dps','',array('type'=>'number','placeholder'=>'Dégats de l\'attaque')); ?>
<?php echo $this->Form->input('aps','',array('type'=>'number','placeholder'=>'Attaques / sec','step'=>'0.001')); ?>
<?php echo $this->Form->input('range','',array('type'=>'number','placeholder'=>'Portée de l\'attaque','step'=>'0.001')); ?>
<?php echo $this->Form->input('mana','',array('type'=>'number','placeholder'=>'Mana')); ?>
<?php echo $this->Form->input('rmana','',array('type'=>'number','placeholder'=>'Régénération mana / sec','step'=>'0.001')); ?>
<?php echo $this->Form->input('lp','',array('type'=>'number','placeholder'=>'Points de vie')); ?>
<?php echo $this->Form->input('rlp','',array('type'=>'number','placeholder'=>'Régénération vie / sec','step'=>'0.001')); ?><br>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <h2>Sorts</h2>

<?php
    $spells = array('A','Z','E','D');
    foreach($spells as $k=>$v){
        echo '<div class="row align-items-center edit_talent">';
        echo '<div class="col-4">';
        echo '<h3>'.$v.'</h3>';
        echo $this->Form->input('image'.$v,'',array('type'=>'file-talent','id'=>'img'.$v,'onchange'=>'loadFile(event,this.id)','heros'=>$id));
        echo '</div>';
        echo '<div class="col-4">';
        echo $this->Form->input('nom'.$v,'',array('placeholder'=>'Nom'));
        echo $this->Form->input('mana'.$v,'',array('placeholder'=>'Mana'));
        echo $this->Form->input('cd'.$v,'',array('placeholder'=>'Temps de recharge'));
        echo '</div>';
        echo '<div class="col-4">';
        echo $this->Form->input('description'.$v,'',array('type' => 'textarea', 'placeholder'=>'Description','class'=>'talentdesc'));
        echo '</div>';
        echo '</div>';
    }
?>
<br>

<h3>Autres</h3>
<div class="row">
<?php
    echo $this->Form->input('nomaut','',array('placeholder'=>'Nom'));
    echo $this->Form->input('nbautres','hidden',array('value'=>$nb[7],'id'=>'nbautres'));
?>
</div><br><br>
<div id="autres">
<?php
    for($i=0;$i<$nb[7];$i++){
        echo '<div id="autres-'.($i+1).'" class="row align-items-center edit_talent">';
        echo '<div class="col-3">';
        echo $this->Form->input('image_autres_'.$i,'',array('type'=>'file-talent','id'=>'imgautres-'.$i,'onchange'=>'loadFile(event,this.id)','heros'=>$id));
        echo '</div>';
        echo '<div class="col-3">';
        echo $this->Form->input('nom_autres_'.$i,'',array('placeholder'=>'Nom',));
        echo $this->Form->input('mana_autres_'.$i,'',array('placeholder'=>'Mana',));
        echo $this->Form->input('cd_autres_'.$i,'',array('placeholder'=>'Temps de recharge',));
        echo $this->Form->input('touche_autres_'.$i,'',array('placeholder'=>'Touche',));
        echo '</div>';
        echo '<div class="col-4">';
        echo $this->Form->input('description_autres_'.$i,'',array('type' => 'textarea', 'placeholder'=>'Description','class'=>'talentdesc'));
        echo '</div>';
        echo '<div class="col-2">';
        echo '<a onclick=" event.preventDefault();rmvTalent(\'autres\','.($i+1).');" href="#"><span class="oi oi-trash h2" aria-hidden="true" style="color:red"></span></a>';
        echo '</div>';
        echo '</div>';
    }
?>
</div>
<button type="button" onclick="addField('autres')" >+</button><button type="button" onclick="rmvField('autres')" >-</button><br><br>

  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><h2>Talents</h2>

<?php
    $spells = array('1','4','7','10','13','16','20');
    foreach($spells as $k=>$v){
        echo '<h3>'.$v.'</h3>';
        echo '<div id="'.$v.'">';
        for($i=0;$i<$nb[$k];$i++){
            echo '<div id="'.$v.'-'.($i+1).'" class="row align-items-center edit_talent">';
            echo '<div class="col-3">';
            echo $this->Form->input('image_'.$v.'_'.$i,'',array('type'=>'file-talent','id'=>'img'.$v.'-'.$i,'onchange'=>'loadFile(event,this.id)','heros'=>$id));
            echo '</div>';
            echo '<div class="col-3">';
            echo $this->Form->input('nom_'.$v.'_'.$i,'',array('placeholder'=>'Nom',));
            echo '</div>';
            echo '<div class="col-4">';
            echo $this->Form->input('description_'.$v.'_'.$i,'',array('type' => 'textarea', 'placeholder'=>'Description','class'=>'talentdesc'));
            echo '</div>';
            echo '<div class="col-2">';
            echo '<a onclick=" event.preventDefault();rmvTalent('.$v.','.($i+1).');" href="#"><span class="oi oi-trash h2" aria-hidden="true" style="color:red"></span></a>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo $this->Form->input('nb'.$v,'hidden',array('value'=>$nb[$k],'id'=>'nb'.$v));
        echo '<button type="button" onclick="addField('.$v.')" >+</button><button type="button" onclick="rmvField('.$v.')" >-</button>';
    }
?></div>
</div>
<br><br>
	<input type="submit" value="<?php echo $button; ?>">

</form>

<script>
  var loadFile = function(event,id) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output'+id);
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script type="text/javascript" >
    var PATH = "/webroot/img/";
function addInput(name,type,pl,t,nb,div){
        if(type=="file"){
            var divimg = document.createElement("div");
            divimg.className = "up_img";
            div.appendChild(divimg);
            var img_out = document.createElement("img");
            img_out.id = "output-"+t+nb;
            img_out.width = "64";
            img_out.height = "64";
            img_out.class = "talent";
            img_out.src = "/webroot/img/theme/nochoice.png";
            divimg.appendChild(img_out);
            divimg.innerHTML = '<img id="outputimg'+t+'-'+nb+'" class="talent" height="64" width="64" src="/webroot/img/theme/nochoice.png"/><input type="file" name="'+name+'" id="img'+t+'-'+nb+'" onchange="loadFile(event,this.id)">';
        }else{
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            input.id = 'input'+name;
            input.placeholder = pl;
            input.style = 'max-width:350px;'
            input.className = 'form-control'; 
            div.appendChild(input);
        }
    }
function addText(name,div){
        var text = document.createElement("textarea");
        text.name = name;
        text.classList.add("talentdesc");
        text.placeholder = "Description";
        div.appendChild(text);
          $(function() {
    tinymce.init({
    selector: '.talentdesc',
    content_css : "/webroot/css/custom_content.css",
    width: 360,
    height: 100,
    branding: false,
    extended_valid_elements: 'a[id|class|!href|border|alt|title|width|height|style|onmouseover|onmouseout|onclick]',
    statusbar: false,
    menubar: '',
    toolbar1: 'insertfile undo redo | quete | recompense',
    setup: function(editor) {
editor.addButton('quete', {
  text: "Quête",
  onclick: function () {
    editor.insertContent('<img src="'+PATH+'theme/quest.png" class="img_quest"><span class="quest">&nbsp;Quête :</span>&nbsp;');
  }
});
editor.addButton('recompense', {
  text: "Récompense",
  onclick: function () {
     editor.insertContent('<img src="'+PATH+'theme/quest.png" class="img_quest"><span class="quest">&nbsp;Récompense :</span>&nbsp;');
  }
});
  }

});
});
    }
    function addField(t) {
        var div = document.getElementById(t);
        var hid = document.getElementById('nb'+t);
        var new_div = document.createElement("div");
        var nb = parseInt(hid.value)+1;
        new_div.id = t+'-'+nb;
        new_div.className = "row align-items-center edit_talent";
        div.appendChild(new_div);
        var div1 = document.createElement("div");
        div1.className = "col-3";
        new_div.appendChild(div1);
        var div2 = document.createElement("div");
        div2.className = "col-3";
        new_div.appendChild(div2);
        var div3 = document.createElement("div");
        div3.className = "col-4";
        new_div.appendChild(div3);
        var div4 = document.createElement("div");
        div4.className = "col-2";
        new_div.appendChild(div4);
        addInput('nom_'+t+'_'+(nb-1),"text","Nom",t,(nb-1),div2);
        if(t == 'autres'){
            addInput('mana_'+t+'_'+(nb-1),"text","Mana",t,(nb-1),div2);
            addInput('cd_'+t+'_'+(nb-1),"text","Temps de recharge",t,(nb-1),div2);
            addInput('touche_'+t+'_'+(nb-1),"text","Touche",t,(nb-1),div2);
        }
        addInput('image_'+t+'_'+(nb-1),"file","",t,(nb-1),div1);
        addInput('previmage_'+t+'_'+(nb-1),"hidden","",t,(nb-1),div1);
        addText('description_'+t+'_'+(nb-1),div3);
        div4.innerHTML = '<a onclick=" event.preventDefault();rmvTalent(\''+t+'\','+nb+');" href="#"><span class="oi oi-trash h2" aria-hidden="true" style="color:red"></span></a>';
        hid.value = nb;
    }
    function rmvField(id) {
        var div = document.getElementById(id);
        var hid = document.getElementById('nb'+id);
        var nb = parseInt(hid.value);
        if(nb>1){
            div.removeChild(div.lastChild);
            if(id == 'autres'){
                div.removeChild(div.lastChild);
                div.removeChild(div.lastChild);
                div.removeChild(div.lastChild); 
            }
        }
        if(nb > 1 ||(id == 'autres' && nb > 0)){
            hid.value = nb-1;
        }
    }
    function rmvTalent(t,i){
        var div = document.getElementById(t+'-'+i);
        var hid = document.getElementById('nb'+t);
        var nb = parseInt(hid.value);
        if(nb>1 ||(t == 'autres' && nb > 0)){
            div.remove();
            hid.value = nb-1;
        }
    }
</script>
<script src='<?php echo Router::webroot('tinymce/js/tinymce/tinymce.min.js'); ?>'></script>
<script src='<?php echo Router::webroot('js/tinymce_heros.js'); ?>'></script>