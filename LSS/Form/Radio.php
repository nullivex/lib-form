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

use \Exception;

class Radio extends \LSS\Form implements \LSS\FormInterface {

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
		return self::_get()->setOptions(array('1'=>'Yes','0'=>'No'))->setName($name)->setValue($value);
	}

}
