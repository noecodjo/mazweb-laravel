<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
        $cats = Category::all();

		if ( ! is_null($this->layout))
		{
            View::share('cats', $cats);

			$this->layout = View::make($this->layout);
                //->nest('category', 'partials.category', array($cats));
		}
	}

}