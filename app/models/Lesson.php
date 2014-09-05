<?

class Lesson extends Eloquent {

    protected $table = 'lessons';
    protected $primaryKey = 'lessonID';

    public function sections()
	{
  		return $this->hasMany('Section', 'lessonID');
	}

	
	public function exercises()
	{
		return $this->hasManyThrough('Exercise', 'Section', 'lessonID', 'sectionID');
	}

	public function userStatuses()
    {
        return $this->belongsToMany('User', 'users_lessons_status', 'userID', 'lessonID')->withPivot('latestSectionID', 'percentComplete');
    }
	

}

?>