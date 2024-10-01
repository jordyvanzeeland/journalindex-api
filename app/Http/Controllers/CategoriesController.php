<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class CategoriesController extends Controller
{
    /**
     * Function to get all categories
     * Only the categories, that are added by the authenticated user, will be visible
     */

    public function getAllCategories(){
        $user = auth()->user();
        $userCategories = DB::table('categories')->where('userid', $user['id'])->get();
        return $userCategories;
    }

    /**
     * Function to get specific category.
     * Specified by a catid.
     */

    public function getCategoryByID($catid){
        $category = DB::table('categories')->where('id', $catid)->first();
        return $category;
    }

    /**
     * Function to Insert a category
     */

    public function insertCategory(Request $request){
        $data = $request->all();
        $user = auth()->user();

        $insertcategory = DB::table('categories')->insert([
            'userid' => $user['id'], 'name' => $data['name'], 'description' => $data['description'], "dateBegin" => $data['dateBegin'], "dateEnd" => $data['dateEnd']
        ]);
        return $insertcategory;
    }

    /**
     * Function to update a category
     * Specified by a category id
     */

     public function updateJournal(Request $request, $catid){
        $data = $request->all();
        $user = auth()->user();

        $updatejournal = DB::table('categories')->where('id', $catid)->update([
            'userid' => $user['id'], 'name' => $data['name'], 'description' => $data['description'], "dateBegin" => $data['dateBegin'], "dateEnd" => $data['dateEnd']
        ]);
        return $updatejournal;
    }

    /**
     * Function to delete a category
     * Specified by a category id
     */

    public function deleteCategory($cateid){
        $deletecategory = DB::table('categories')->where('id', $cateid)->delete();
        return $deletecategory;
    }
}
