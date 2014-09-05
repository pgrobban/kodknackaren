<?

class Section extends Eloquent {

    protected $table = 'sections';
    protected $primaryKey = 'sectionID';

    protected $guarded = array(); // allow mass assignment when seeding
    
    public function lesson() {
    	return $this->belongsTo('Lesson', 'lessonID');
    }

    public function exercise() {
    	return $this->hasOne('Exercise', 'sectionID');
    }

}

?>