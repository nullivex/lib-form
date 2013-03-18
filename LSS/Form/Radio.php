<?php
ld('ui_form');

class FormRadio extends Form implements FormInterface {

	public function render(){
		if(!$this->name) throw new Exception('radio: name missing');
		if(!is_array($this->options) || !count($this->options)) throw new Exception('radio: options missing');
		$html = '';
		foreach($this->options as $value => $desc){
			$checked = $value == $this->value ? 'checked="checked"' : '';
			$html .= '<input type="radio" name="'.$this->name.'" value="'.$value.'" '.$checked.' '.$this->extra.' /> '.$desc."\n";
		}
		return $html;
	}
	
	//-------------------------------
	//Global Consructors
	//-------------------------------
	public static function _stdYesNo($value=null,$name='yesno'){
		return FormRadio::_get()->setOptions(array('1'=>'Yes','0'=>'No'))->setName($name)->setValue($value);
	}
	
}
