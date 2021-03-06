<?php

class PermissionField extends ListField {
	public function init() {
		$options = array("*" => "Full Access to EVERYTHING");

		foreach (Platform::getSolutions("Permissions") as $solution) {
			foreach ($solution->getFile()->listSubs() as $file) {
				$classname = $file->getExtensionlessName();
				$object = new $classname();
				$options[$classname] = $object->getName();
			}
		}

		$this->options = $options;
	}
}