<?

class Requirement extends Eloquent {

    protected $table = 'exerciseRequirements';
    protected $primaryKey = 'requirementID';

    public function exercise() {
    	return $this->belongsTo('Exercise');
    }

}

?>