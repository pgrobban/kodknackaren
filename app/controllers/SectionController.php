<?

class SectionController extends BaseController {


	public function show()
	{
		var_dump(Section::all()->toJson());
	}


}

?>