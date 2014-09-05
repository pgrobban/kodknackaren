<?

class ExerciseRequirement extends Eloquent {

    protected $table = 'exerciseRequirements';
    protected $primaryKey = 'requirementID';

    public function exercise() {
        return $this->belongsTo('Exercise', 'exerciseID');
    }

    

}

?>