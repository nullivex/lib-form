<?php
lib('ui_form');

class FormDrop extends Form implements FormInterface {

	protected $allow_null = false;
	
	public function allowNull(){
		$this->allow_null = true;
		return $this;
	}
	
	public function render(){
		if(!$this->name) throw new Exception('drop: name missing');
		$html = '<select name="'.$this->name.'" class="'.$this->classes.'" '.$this->extra.'>'."\n";
		if($this->allow_null) $html .= '<option value=""></option>';
		foreach($this->options as $value => $desc){
			$checked = $value == $this->value ? 'selected="selected"' : '';
			$html .= '<option value="'.$value.'" '.$checked.'>'.htmlentities($desc).'</option>'."\n";
		}
		$html .= '</select>'."\n";
		return $html;
	}
	
	//-------------------------------
	//Global Consructors
	//-------------------------------
	public static function _dateMonths($value=null,$name='month'){
		$drop = FormDrop::_get()->setOptions(array(
			0		=>	'-- Month --',
			1		=>	'January',
			2		=>	'February',
			3		=>	'March',
			4		=>	'April',
			5		=>	'May',
			6		=>	'June',
			7		=>	'July',
			8		=>	'August',
			9		=>	'September',
			10		=>	'October',
			11		=>	'November',
			12		=>	'December'
		));
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _dateDays($value=null,$name='month'){
		$days = array(0=>'-- Day --');
		for($i=1;$i<=31;$i++) $days[$i] = $i;
		$drop = FormDrop::_get()->setOptions($days);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _dateYears($value=null,$name='years',$min=null,$max=null){
		if(!$min) $min = (date('Y') - 120);
		if(!$max) $max = date('Y');
		$years = array(0=>'-- Year --');
		for($i=$max;$i>=$min;$i--) $years[$i] = $i;
		$drop = FormDrop::_get()->setOptions($years);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _localeStates($value=null,$name='state'){
		include(ROOT.'/locale/states.php');
		$drop = FormDrop::_get()->setOptions($states);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _localeCountries($value=null,$name='country'){
		include(ROOT.'/locale/countries.php');
		$drop = FormDrop::_get()->setOptions($countries);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _localeTimezones($value=null,$name='timezone'){
		include(ROOT.'/locale/timezones.php');
		$drop = FormDrop::_get()->setOptions($timezones);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _justify($value=null,$name='justify',$center=true){
		$o = array(
			 'left'		=>	'Left'
			,'right'		=>	'Right'
		);
		if($center) $o['center'] = 'Center';
		$drop = FormDrop::_get()->setOptions($o);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
	public static function _localeCurrencyISO($value=null,$name='currency_iso_code'){
		//get and format
		include(ROOT.'/locale/currency_iso_code.php');
		foreach($a as $code => $val) $c[$code] = implode(' #',$val);
		unset($a);
		//setup drop
		$drop = FormDrop::_get()->setOptions($c);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}
	
}
