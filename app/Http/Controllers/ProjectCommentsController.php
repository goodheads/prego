<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Prego\Comment;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;

class ProjectCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function postNewComment(Request $request, $id, Comment $comment)
    {
       $this->validate($request, [
            'comments'     => 'required|min:5',
        ]);

       $comment->comments       = $request->input('comments');
       $comment->project_id     = $id;
       $comment->user_id        = Auth::user()->id;
       $comment->save();

       return redirect()->back()->with('info', 'Comment posted successfully');
    }

    /**
     *  Get just one comment for a particular Project
     * @param  int  $projectId
     * @param  int  $commentId
     * @return view
     */
    public function getOneProjectComment($projectId, $commentId)
    {
        $comment = Comment::where('project_id', $projectId)
                      ->where('id', $commentId)
                      ->first();

        return view('comments.edit')->withComment($comment)->with('projectId', $projectId);
    }

    /**
     * Update One Project Comment
     * @param  Request $request
     * @param  int  $projectId
     * @param  int  $commentId
     * @return view
     */
    public function updateOneProjectComment(Request $request, $projectId, $commentId)
    {
        $this->validate($request, [
            'comments'  => 'required|min:3',
        ]);

        Comment::where('project_id', $projectId)
                ->where('id', $commentId)
                ->update(['comments' => $request->input('comments')]);

        return redirect()->back()->with('info','Your Comment has been updated successfully');
    }

    /**
     * Delete One Project Comment
     * @param  int $projectId
     * @param  int $commentId
     * @return view
     */
    public function deleteOneProjectComment($projectId, $commentId)
    {
        Comment::where('project_id', $projectId)
                ->where('id', $commentId)
                ->delete();

        return redirect()->route('projects.show')->with('info', 'Comment deleted successfully');
    }

}