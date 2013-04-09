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

class Drop extends \LSS\Form implements \LSS\FormInterface {

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
		$drop = self::_get()->setOptions(array(
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
		$drop = self::_get()->setOptions($days);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

	public static function _dateYears($value=null,$name='years',$min=null,$max=null){
		if(!$min) $min = (date('Y') - 120);
		if(!$max) $max = date('Y');
		$years = array(0=>'-- Year --');
		for($i=$max;$i>=$min;$i--) $years[$i] = $i;
		$drop = self::_get()->setOptions($years);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

	public static function _localeStates($value=null,$name='state'){
		include(dirname(dirname(__DIR__)).'/locale/states.php');
		$drop = self::_get()->setOptions($states);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

	public static function _localeCountries($value=null,$name='country'){
		include(dirname(dirname(__DIR__)).'/locale/countries.php');
		$drop = self::_get()->setOptions($countries);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

	public static function _localeTimezones($value=null,$name='timezone'){
		include(dirname(dirname(__DIR__)).'/locale/timezones.php');
		$drop = self::_get()->setOptions($timezones);
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
		$drop = self::_get()->setOptions($o);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

	public static function _localeCurrencyISO($value=null,$name='currency_iso_code'){
		//get and format
		include(dirname(dirname(__DIR__)).'/locale/currency_iso_code.php');
		foreach($a as $code => $val) $c[$code] = implode(' #',$val);
		unset($a);
		//setup drop
		$drop = self::_get()->setOptions($c);
		$drop->setName($name);
		$drop->setValue($value);
		return $drop;
	}

}
