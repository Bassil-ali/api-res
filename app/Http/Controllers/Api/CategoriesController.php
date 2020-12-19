<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Traits\GeneralTrait;

class CategoriesController extends Controller
{

    use GeneralTrait;
    
    public function index() {

             $categories = Category::selection()->get();
        

        return $this -> returnData('categories',$categories);

    }

    public function getcategorybyid(Request $Request) {

        $category = Category::selection()->find($Request-> id);
        if (!$category)
            return $this->returnError('001', 'هذا القسم غير موجد');

        return $this->returnData('categroy', $category);

        

       

}
public function changeactive(Request $request)
{
   //validation
    Category::where('id',$request -> id) -> update(['active' =>$request ->  active]);

    return $this -> returnSuccessMessage('تم تغيير الحاله بنجاح');

}

}
