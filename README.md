openlss/lib-form
========

Form helpers for creating radio buttons, drop downs, and checkboxes

It contains classes for each field type as show below

openlss/lib-form-checkbox
=================

Checkbox builder for HTML pages can be used with various templating

Usage
----
```php
use \LSS\Form\Checkbox;

$arr = array(1=>'Yes',2=>'Yes, Please',3=>'Alright!');

//pring checkbox form
echo Checkbox::_get()->setOptions($arr)->setName('test')->setValue(1);
```

toString
----
To get the HTML from this class simply transform it to a string.

Examples
```php
echo $form_obj;
$checkboxes = (string)$form_obj;
```

Reference
----

### (object) _get()
Shortcut for constructor

### (object) setOptions($arr)
Sets the options to this array

### (object) addOption($key,$value)
Adds an option

### (object) setName($name)
Set name of the checkbox elements

### (object) setValue($value)
Set the current value to be checked (can be an array for multiple checkboxes)

### (object) addValue($value)
Adds a set value to the array

### (void) breakAfterEach()
Call this to turn on line breaks after each checkbox

### (object) addCssClass($class)
Adds a CSS class to each element

### (objet) addExtra($extra)
Add extra parameters to the HTML element containing the object

openlss/lib-form-drop
=================

Dropdown select builder for HTML pages can be used with various templating

Usage
----
```php
use \LSS\Form\Drop;

$arr = array(1=>'Yes',2=>'Yes, Please',3=>'Alright!');

//pring radio form
echo Drop::_get()->setOptions($arr)->setName('test')->setValue(1);
```

toString
----
To get the HTML from this class simply transform it to a string.

Examples
```php
echo $form_obj;
$drop = (string)$form_obj;
```

Reference
----

### (object) _get()
Shortcut for constructor

### (object) setOptions($arr)
Sets the options to this array

### (object) addOption($key,$value)
Adds an option

### (object) setName($name)
Set name of the checkbox elements

### (object) setValue($value)
Set the current value to be checked

### (object) addCssClass($class)
Adds a CSS class to each element

### (objet) addExtra($extra)
Add extra parameters to the HTML element containing the object

openlss/lib-form-radio
=================

Radio button builder for HTML pages can be used with various templating

Usage
----
```php
use \LSS\Form\Radio;

$arr = array(1=>'Yes',2=>'Yes, Please',3=>'Alright!');

//pring radio form
echo Radio::_get()->setOptions($arr)->setName('test')->setValue(1);
```

toString
----
To get the HTML from this class simply transform it to a string.

Examples
```php
echo $form_obj;
$radio = (string)$form_obj;
```

Reference
----

### (object) _get()
Shortcut for constructor

### (object) setOptions($arr)
Sets the options to this array

### (object) addOption($key,$value)
Adds an option

### (object) setName($name)
Set name of the checkbox elements

### (object) setValue($value)
Set the current value to be checked

### (object) addCssClass($class)
Adds a CSS class to each element

### (objet) addExtra($extra)
Add extra parameters to the HTML element containing the object

