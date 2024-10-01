<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class JournalsController extends Controller
{
    /**
     * Function to get all journals
     * Only the journals, that are added by the authenticated user, will be visible
     */

    public function getAllJournals(){
        $user = auth()->user();
        $userJournals = DB::table('journals')->where('userid', $user['id'])->get();
        return $userJournals;
    }

    /**
     * Function to get specific journal.
     * Specified by a journalid.
     */

    public function getJournalByID($journalid){
        $journal = DB::table('journals')->where('id', $journalid)->first();
        return $journal;
    }

    /**
     * Function to Insert a book to a challenge
     * Specified by a challengeid
     */

    public function insertJournal(Request $request){
        $data = $request->all();
        $user = auth()->user();

        $insertjournal = DB::table('journals')->insert([
            'userid' => $user['id'], 'name' => $data['name'], 'description' => $data['description'], "dateBegin" => $data['dateBegin'], "dateEnd" => $data['dateEnd']
        ]);
        return $insertjournal;
    }

    /**
     * Function to update a journal
     * Specified by a journalid
     */

     public function updateJournal(Request $request, $journalid){
        $data = $request->all();
        $user = auth()->user();

        $updatejournal = DB::table('journals')->where('id', $journalid)->update([
            'userid' => $user['id'], 'name' => $data['name'], 'description' => $data['description'], "dateBegin" => $data['dateBegin'], "dateEnd" => $data['dateEnd']
        ]);
        return $updatejournal;
    }

    /**
     * Function to delete a book from a challenge
     * Specified by a challengeid and a bookid
     */

    public function deleteJournal($journalid){
        $deletejournal = DB::table('journals')->where('id', $journalid)->delete();
        return $deletejournal;
    }
}
