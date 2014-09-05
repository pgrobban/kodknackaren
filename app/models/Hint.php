<?

class Hint extends Eloquent {

    protected $table = 'hints';
    protected $primaryKey = 'hintID';

	public function exercise() {
        return $this->belongsTo('Exercise', 'exerciseID');
    }

}

?>