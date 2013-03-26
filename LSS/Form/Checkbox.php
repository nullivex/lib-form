<?php
/**
 *  OpenLSS - Lighter Smarter Simpler
 *
 *	This file is part of OpenLSS.
 *
 *	OpenLSS is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU Lesser General Public License as
 *	published by the Free Software Foundation, either version 3 of
 *	the License, or (at your option) any later version.
 *
 *	OpenLSS is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU Lesser General Public License for more details.
 *
 *	You should have received a copy of the 
 *	GNU Lesser General Public License along with OpenLSS.
 *	If not, see <http://www.gnu.org/licenses/>.
*/
namespace LSS\Form;

class Checkbox extends \LSS\Form implements \LSS\FormInterface {

	public $break_after_each = false;

	//accepts array
	public function setValue($value){
		if(!is_array($value)) $value = array($value);
		$this->value = $value;
		return $this;
	}
	
	public function addValue($value){
		$this->value[] = $value;
		return $this;
	}
	
	public function breakAfterEach(){
		$this->break_after_each = true;
	}
	
	public function render(){
		if(!$this->name) throw new Exception('form drop: name missing');
		if(!is_array($this->options)) throw new Exception('form drop: options missing');
		$html = '';
		foreach($this->options as $value => $desc){
			$checked = in_array($value,$this->value) ? 'checked="checked"' : '';
			$html .= '<input type="checkbox" name="'.$this->name.'[]" value="'.$value.'" '.$checked.' '.$this->extra.' /> '.$desc."\n";
			if($this->break_after_each) $html .= '<br />';
		}
		return $html;
	}
	
}
