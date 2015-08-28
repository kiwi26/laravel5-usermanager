<?php

namespace Kiwi\UserManager\Traits;

trait IgnoreFieldsOnMassUpdate {

	protected $guardedForUpdate = array();

	public function setGuardedFieldsForUpdate(Array $fields){
		$this->guardedForUpdate = $fields;
	}

	public function getGuardedFieldsForUpdate(){
		return $this->guardedForUpdate;
	}

	public function isGuardedForUpdate($key){
	    return in_array($key, $this->guardedForUpdate) || $this->guardedForUpdate == array('*');
	}

	public function isFillable($key){
	    if($this->exists && $this->isGuardedForUpdate($key)){
	        return false;
	    }
	    return parent::isFillable($key);
	}
}
