<?php

class DynamicRole extends Role {

	protected $hasEditPermission = null;

	/**
	 * Get predefined template (template method)
	 * 
	 * @return Template
	 *
	 */
	protected function getPredefinedTemplate() {
		return $this->wire('templates')->get('dynamic-role'); 
	}

	/**
	 * Get predefined parent page (template method)
	 * 
	 * @return Page
	 *
	 */
	protected function getPredefinedParent() {
		return $this->wire('pages')->get($this->wire('modules')->get('DynamicRoleSupport')->parent_id); 
	}

	public function hasEditPermission() {
		if(is_null($this->hasEditPermission)) {
			foreach($this->permissions as $permission) {
				if($permission->name == 'page-edit') {
					$this->hasEditPermission = true; 
				}
			}
			if(is_null($this->hasEditPermission)) $this->hasEditPermission = false;
		}
		return $this->hasEditPermission;
	}

}

