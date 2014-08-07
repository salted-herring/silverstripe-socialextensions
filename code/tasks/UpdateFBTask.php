<?php

class UpdateFBTask extends BuildTask {
 
    protected $title = 'Update Facebook OG Data';
 
    protected $description = 'Update Facebook Open Graph data on objects that implement FBInterface';
 
    protected $enabled = true;
 
    public function run($request) {
        $data = DataObject::get("Object");
        
        echo 'Updating Open Graph Data ...<br>';
        
        foreach($data as $record) {
        	if(in_array("FBInterface", class_implements($record->ClassName))) {
	        	$record->forceChange();
				$record->write();
        	}
        }
        
       echo 'Updated ' . $team->count() . ' records.';
    }
}