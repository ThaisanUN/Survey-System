<?php
/*--------------------
https://github.com/jazmy/laravelformbuilder
Licensed under the GNU General Public License v3.0
Author: Jasmine Robinson (jazmy.com)
Last Updated: 12/29/2018
----------------------*/
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helper;
use App\Models\Form;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index($form_id)
    {
        $user = auth()->user();

        $form = Form::where(['user_id' => $user->id, 'id' => $form_id])
                    ->with(['user'])
                    ->firstOrFail();

        $submissions = $form->submissions()
                            ->with('user')
                            ->latest()
                            ->paginate(100);

        // get the header for the entries in the form
        $form_headers = $form->getEntriesHeader();

        $pageTitle = "Submitted Entries for '{$form->name}'";
// dump(submissions);
// dump(form);
// dump(form_headers);
// exit();
        return view('submissions.index',compact('form', 'submissions', 'pageTitle', 'form_headers')
        );
    }

    public function show($form_id, $submission_id)
    {
        $submission = Submission::with('user', 'form')
                            ->where([
                                'form_id' => $form_id,
                                'id' => $submission_id,
                            ])
                            ->firstOrFail();

        $form_headers = $submission->form->getEntriesHeader();

        $pageTitle = "View Submission";

        return view('submissions.show', compact('pageTitle', 'submission', 'form_headers'));
    }

    public function destroy($form_id, $submission_id)
    {
        $submission = Submission::where(['form_id' => $form_id, 'id' => $submission_id])->firstOrFail();
        $submission->delete();

        return redirect()
                    ->route('forms.submissions.index', $form_id)
                    ->with('success', 'Submission successfully deleted.');
    }
}