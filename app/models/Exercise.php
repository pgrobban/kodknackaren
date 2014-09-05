<?

class Exercise extends Eloquent {

    protected $table = 'exercises';
    protected $primaryKey = 'exerciseID';


    
    public function section() {
        return $this->belongsTo('Section', 'sectionID');
    }


    public function requirements() {
    	return $this->hasMany('ExerciseRequirement', 'exerciseID');
    }

    public function hints() {
    	return $this->hasMany("Hint", 'exerciseID');
    }


	public function getExerciseID() {
		return (int)($this->exerciseID);
	}

	public function getPointsForCompletion() {
		return (int)($this->pointsForCompletion);
	}

	public function usersWhoPassed()
    {
        return $this->belongsToMany('User', 'users_completed_exercises', 'exerciseID', 'userID');
    }


}

?>