<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    /**
     * Function to get all pages
     * Only the pages, that are added by the authenticated user, will be visible
     */

    public function getAllPages(){
        $user = auth()->user();
        $userPages = DB::table('pages')->where('userid', $user['id'])->get();
        return $userPages;
    }

    /**
     * Function to get specific page.
     * Specified by a pageid.
     */

    public function getPageByID($pageid){
        $page = DB::table('pages')->where('id', $pageid)->first();
        return $page;
    }

    /**
     * Function to Insert a page to a journal
     */

    public function insertPage(Request $request){
        $data = $request->all();
        $user = auth()->user();

        $insertpage = DB::table('pages')->insert([
            'userid' => $user['id'], 'title' => $data['title'], 'pagenumber' => $data['pagenumber'], "dateOfWriting" => $data['dateOfWriting'], "journal" => $data['journal'], "category" => $data['category']
        ]);
        return $insertpage;
    }

    /**
     * Function to update a page
     * Specified by a page id
     */

     public function updateJournal(Request $request, $pageid){
        $data = $request->all();
        $user = auth()->user();

        $updatejournal = DB::table('pages')->where('id', $pageid)->update([
            'userid' => $user['id'], 'title' => $data['title'], 'pagenumber' => $data['pagenumber'], "dateOfWriting" => $data['dateOfWriting'], "journal" => $data['journal'], "category" => $data['category']
        ]);
        return $updatejournal;
    }

    /**
     * Function to delete a page from a journal
     * Specified by a pageid
     */

    public function deletePage($pageid){
        $deletepage = DB::table('categories')->where('id', $pageid)->delete();
        return $deletepage;
    }
}
