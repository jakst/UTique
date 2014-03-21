<?php
App::uses('FormHelper', 'View/Helper');

class BootstrapFormHelper extends FormHelper {
 
    public function create($model = null, $options = array()) {
        $defaultOptions = array(
            'inputDefaults' => array(
                'div' => array(
                	'class' => 'form-group'
                ),
                'label' => array(
                	'class' => 'col-lg-2 control-label'
                ),
                'between' => '<div class="col-lg-10">',
                'seperator' => '</div>',
                'after' => '</div>',
                'class' => 'form-control',
            ),
            'class' => 'form-horizontal',
            'role' => 'form',
        );
 
        if(!empty($options['inputDefaults'])) {
            $options = array_merge($defaultOptions['inputDefaults'], $options['inputDefaults']);
        } else {
            $options = array_merge($defaultOptions, $options);
        } 
        return parent::create($model, $options);
    }
    
    // Remove this function to show the fieldset & language again
    public function inputs($fields = null, $blacklist = null, $options = array()) {
    	$options = array_merge(array('fieldset' => false), $options);
    	return parent::inputs($fields, $blacklist, $options);
    }
    
    public function submit($caption = null, $options = array()) {
	    $defaultOptions = array(
	    	'class' => 'btn btn-primary',
	    	'div' =>  'form-group',
	    	'before' => '<div class="col-lg-offset-2 col-lg-10">',
	    	'after' => '</div>',
	    );
        $options = array_merge($defaultOptions, $options);     
	    return parent::submit($caption, $options);
    }
    
    public function input($fieldName, $options = array()) {
        if (isset($options['label']) && is_string($options['label'])) {
            $option['text'] = $options['label'];
            $options['label'] = array_merge($option, $this->_inputDefaults['label']);
        }
        else if (isset($options['label']['text']) && !isset($options['label']['class'])) {
            $options['label'] = array_merge($options['label'], $this->_inputDefaults['label']);
        }
        return parent::input($fieldName, $options);
    }
 
}