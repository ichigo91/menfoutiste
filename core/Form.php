<?php
class Form{

	public $controller;
	public $errors;

	public function __construct($controller){
		$this->controller = $controller;
	}

	public function input($name,$label,$options = array()){
		$error = false;
		$classError = '';
		$html = '';
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' is-invalid';
		}
		if(!isset($this->controller->request->data->$name)){
			$value = '';
		}else{
			$value = $this->controller->request->data->$name;
		}
			if($label == 'hidden'){
				if(isset($this->controller->request->data->$name)){
					$value = $this->controller->request->data->$name;
				}
				else{
					$value = $options['value'];
				}
				return '<input type="hidden" name="'.$name.'" id="'.$options['id'].'" value="'.$value.'">';
			}
			if($label != ''){
				$html .= '<label for="input'.$name.'" class="col-form-label">'.$label.'</label>';
			}
			$attr = ' ';
			foreach($options as $k=>$v){ if($k!='type'&&$k!='array'&&$k!='heros'){

				$attr .= " $k=\"$v\"";
			}}
			if(isset($options['array']) && $options['array'] != ''){
				$r = explode('-',$options['array']);
				$tab = 'talents'.$r[1];
				if(isset($this->controller->request->data->$tab)){
					$value = $this->controller->request->data->$tab;
					$value = $value[$r[2]][$r[0]];
				}else{
					$value = '';
				}
				if(!isset($options['type'])){
					return '<input type="text" id="'.$options['array'].'" name="'.$name.'" value="'.$value.'" class="form-control '.$classError.'" '.$attr.'>';
				}elseif($options['type'] == 'textarea'){
					return '<textarea id="input'.$name.'" name="'.$name.'"'.$attr.' class="input-xxlarge" style="height:100px">'.$value.'</textarea>';
				}
			}
			if(!isset($options['type'])){
				$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$value.'" class="form-control '.$classError.'" style="max-width:350px;" '.$attr.'>';
			}elseif($options['type'] == 'textarea'){
				$html.= '<textarea id="input'.$name.'" name="'.$name.'"'.$attr.' class="form-control '.$classError.'">'.$value.'</textarea>';
			}elseif($options['type'] == 'checkbox'){
				$html.= '<input type="hidden" name="'.$name.'" value="0"/><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'/>';
			}elseif($options['type'] == 'file'){
				$html .= '<input type="file" id="input'.$name.'" name="'.$name.'" class="form-control '.$classError.'" '.$attr.'>';
			}elseif($options['type'] == 'password'){
				$html .= '<input type="password" id="input'.$name.'" name="'.$name.'" class="form-control '.$classError.'" value="'.$value.'" style="max-width:350px;" '.$attr.'>';
			}elseif($options['type'] == 'email'){
				$html .= '<input type="email" id="input'.$name.'" name="'.$name.'" class="input-file mailcheck" value="'.$value.'" '.$attr.'>';
			}elseif($options['type'] == 'disabled'){
				$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" placeholder="'.$value.'" class="form-control '.$classError.'" '.$attr.' disabled>';
			}elseif($options['type'] == 'value'){
				$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$options['value'].'" '.$attr.'>';
			}elseif($options['type'] == 'number'){
				$html .= '<input type="number" id="input'.$name.'" name="'.$name.'" class="input-file" value="'.$value.'" '.$attr.'>';
			}elseif($options['type'] == 'file-talent'){
				if($value == ''){
					$src = Router::webroot('img/theme/nochoice.png');
				}else{
					$src = Router::webroot('img/heros/'.$options['heros'].'/'.$value);
				}
				$html .= '<div class="up_img"><img id="output'.$options['id'].'" src="'.$src.'" height="64" width="64" class="talent"/>';
				$html .= '<input type="file" name="'.$name.'" class="input-file" '.$attr.'></div>';
				$html .= '<input type="hidden" name="prev'.$name.'" id="prev'.$options['id'].'" value="'.$value.'">';
			}elseif($options['type'] == 'file-map'){
				if($value == ''){
					$src = Router::webroot('img/theme/nochoice.png');
				}else{
					$src = Router::webroot('img/maps/'.$value);
				}
				$html .= '<div class="up_img"><img id="output'.$options['id'].'" src="'.$src.'" height="128" width="256" class="talent"/>';
				$html .= '<input type="file" name="'.$name.'" class="input-file" '.$attr.'></div>';
				$html .= '<input type="hidden" name="prev'.$name.'" id="prev'.$options['id'].'" value="'.$value.'">';
			}
			if($error){
				$html .= '<div class="invalid-feedback">'.$error.'</div>';
			}
			return $html;
	}

	public function select($name,$label,$content = array(),$options = array()){
		$error = false;
		$classError = '';
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' alert-error';
		}
		if(!isset($this->controller->request->data->$name)){
			$value = '';
		}else{
			$value = $this->controller->request->data->$name;
		}
			$html = '<div class="control-group'.$classError.'">
					<label for="select'.$name.'">'.$label.'</label>
					<div class="form-group">';
			$attr = ' ';
			foreach($options as $k=>$v){ if($k!='type'){

				$attr .= " $k=\"$v\"";
			}}
			if(!isset($options['type'])){
				$html .= '<select id="select'.$name.'" name="'.$name.'" value="'.$value.'" class="form-control" style="max-width:350px;" '.$attr.'>';
				foreach($content as $k=>$v){
					$html .= '<option value="'.$k.'"';
					if($value == $k){
						$html .= ' selected';
					}
					$html .= '>';
					$html .= $v;
					$html .= '</option>';
				}
				$html .= '</select>';
			}elseif($options['type'] == 'date'){
				$html .= '<select name="'.$name.'_d" id="select'.$name.'" '.$attr.'><option value="">Jour<option value="01">01<option value="02">02<option value="03">03<option value="04">04<option value="05">05<option value="06">06<option value="07">07<option value="08">08<option value="09">09<option value="10">10<option value="11">11<option value="12">12<option value="13">13<option value="14">14<option value="15">15<option value="16">16<option value="17">17<option value="18">18<option value="19">19<option value="20">20<option value="21">21<option value="22">22<option value="23">23<option value="24">24<option value="25">25<option value="26">26<option value="27">27<option value="28">28<option value="29">29<option value="30">30<option value="31">31</select>
                <select name="'.$name.'_m" id="select'.$name.'" '.$attr.'><option value="">Mois<option value="01">Janvier<option value="02">Février<option value="03">Mars<option value="04">Avril<option value="05">Mai<option value="06">Juin<option value="07">Juillet<option value="08">Août<option value="09">Septembre<option value="10">Octobre<option value="11">Novembre<option value="12">Décembre</select>
                <select name="'.$name.'_y" id="select'.$name.'" '.$attr.'><option value="">Année<option value="1920">1920<option value="1921">1921<option value="1922">1922<option value="1923">1923<option value="1924">1924<option value="1925">1925<option value="1926">1926<option value="1927">1927<option value="1928">1928<option value="1929">1929<option value="1930">1930<option value="1931">1931<option value="1932">1932<option value="1933">1933<option value="1934">1934<option value="1935">1935<option value="1936">1936<option value="1937">1937<option value="1938">1938<option value="1939">1939<option value="1940">1940<option value="1941">1941<option value="1942">1942<option value="1943">1943<option value="1944">1944<option value="1945">1945<option value="1946">1946<option value="1947">1947<option value="1948">1948<option value="1949">1949<option value="1950">1950<option value="1951">1951<option value="1952">1952<option value="1953">1953<option value="1954">1954<option value="1955">1955<option value="1956">1956<option value="1957">1957<option value="1958">1958<option value="1959">1959<option value="1960">1960<option value="1961">1961<option value="1962">1962<option value="1963">1963<option value="1964">1964<option value="1965">1965<option value="1966">1966<option value="1967">1967<option value="1968">1968<option value="1969">1969<option value="1970">1970<option value="1971">1971<option value="1972">1972<option value="1973">1973<option value="1974">1974<option value="1975">1975<option value="1976">1976<option value="1977">1977<option value="1978">1978<option value="1979">1979<option value="1980">1980<option value="1981">1981<option value="1982">1982<option value="1983">1983<option value="1984">1984<option value="1985">1985<option value="1986">1986<option value="1987">1987<option value="1988">1988<option value="1989">1989<option value="1990">1990<option value="1991">1991<option value="1992">1992<option value="1993">1993<option value="1994">1994<option value="1995">1995<option value="1996">1996<option value="1997">1997<option value="1998">1998<option value="1999">1999<option value="2000">2000<option value="2001">2001<option value="2002">2002<option value="2003">2003<option value="2004">2004<option value="2005">2005<option value="2006">2006<option value="2007">2007<option value="2008">2008<option value="2009">2009<option value="2010">2010<option value="2011">2011<option value="2012">2012</select>';
			}
			$html .= '</div></div>';
			return $html;
	}

	public function radio($name,$label,$value,$options = array()){
		$error = false;
		$classError = '';
		$html = '';
		$attr = '';
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' alert-error';
		}
		$html .= '<div class="control-group'.$classError.'" style="margin-bottom:0px">';
		$attr .= ' ';
		foreach($options as $k=>$v){ if($k!='value' && $k!='checked'){
			$attr .= " $k=\"$v\"";
		}}
		$html .= '<label for="select'.$name.'" class="control-label">'.$label.'</label><div class="controls">';
		$html .= '<input type="radio" id="input'.$name.'" name="'.$name.'" value="'.$value.'" '.$attr;
		if(isset($options['checked']) && $options['checked'] == 1){
			$html .= 'checked="checked"';
		}
		$html .= '></div></div>';
		return $html;
	}
}
?>