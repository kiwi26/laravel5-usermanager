<?php

namespace Kiwi\UserManager\Contracts;

interface IgnoreFieldsOnMassUpdate {

	public function setGuardedFieldsForUpdate(Array $fields);
	public function getGuardedFieldsForUpdate();
	public function isGuardedForUpdate($key);
	public function isFillable($key);
  
}
