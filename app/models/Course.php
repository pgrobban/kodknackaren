<?

class Course extends Eloquent {

    protected $table = 'courses';
    protected $primaryKey = 'courseID';
    
    public function lessons()
	{
  		return $this->hasMany('Lesson', 'lessonID');
	}

	public function sections()
    {
        return $this->hasManyThrough('Section', 'Lesson', 'courseID', 'lessonID');
    }

}

?>