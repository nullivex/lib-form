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
namespace LSS;

interface FormInterface {

	public function setOptions($arr);
	public function addOption($key,$value);
	public function setName($name);
	public function setValue($value);
	public function addCssClass($class);
	public function addExtra($extra);
	public function render();
	public function __toString();
	
}

abstract class Form implements FormInterface {

	protected $options = array();
	protected $name = null;
	protected $value = null;
	protected $classes = null;
	protected $extra = null;
	protected $allow_null = false;
	
	public static function _get(){
		return new static();
	}
	
	public function __construct(){
		return $this;
	}
	
	//Array structure
	//	'value'		=>	'description'
	public function setOptions($arr){
		if(!is_array($arr)) $arr = array($arr);
		$this->options = $arr;
		return $this;
	}
	
	public function addOption($key,$value){
		$this->options[$key] = $value;
		return $this;
	}
	
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	public function setValue($value){
		$this->value = $value;
		return $this;
	}
	
	public function addCssClass($class){
		$this->classes .= ' '.$class;
		return $this;
	}
	
	public function addExtra($extra){
		$this->extra .= ' '.$extra;
		return $this;
	}
	
	public function render(){
		//must be extended
		throw new Exception('render must be extended');
	}
	
	public function __toString(){
		return $this->render();
	}
	
}
