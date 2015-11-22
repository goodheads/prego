<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Prego\User;
use Prego\Project;
use Prego\Collaboration;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;

class ProjectCollaboratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function addCollaborator(Request $request, $id, Collaboration $collaboration)
    {
       $this->validate($request, [
            'collaborator'     => 'required|min:5',
        ]);

       $collaborator_username           = substr(trim($request->input('collaborator')),1);
       $collaboration->project_id       = $id;
       if( is_null($this->getId($collaborator_username)))
       {
            return redirect()->back()->with('warning', 'This user does not exist');
       }

       $collaborationStatus = $this->isCollaborator($id, $this->getId($collaborator_username));
       if(! is_null($collaborationStatus))
       {
            return redirect()->back()->with('warning', 'This user is already a collaborator on this project');
       }

       $collaboration->collaborator_id  = $this->getId($collaborator_username);

       session(['project_name' => $this->getProjectName($id),
                'user_email' => $this->getEmail($collaborator_username)
        ]);

       $collaboration->save();

       return redirect()->back()->with('info', "{$collaborator_username} has been added to your project successfully");
    }

     /**
     * Delete One Collaborator on a Project
     * @param  int $projectId
     * @param  int $collaboratorId
     * @return route
     */
    public function deleteOneCollaborator($projectId, $collaboratorId)
    {
        Collaboration::where('project_id', $projectId)
                    ->where('collaborator_id', $collaboratorId)
                    ->delete();

        return redirect()->route('projects.show')->with('info', 'Collaborator deleted successfully');
    }

    /**
     * Get id of the user
     * @param  string $username
     * @return mixed  null | integer
     */
    private function getId($username)
    {
        $result = User::where('username', $username)->first();

        return (is_null($result)) ? null : $result->id;
    }

    /**
     * Get the email of a user for use in sending emails
     * @param  string $username
     * @return string
     */
    private function getEmail($username)
    {
        return User::where('username', $username)->first()->email;
    }

    /**
     * Get the Project Name for use in sending email for Collaboration
     * @param  int $id
     * @return string
     */
    private function getProjectName($id)
    {
        return Project::where('id', $id)->first()->project_name;
    }

    /**
     * Check if the user about to be added as a collaborator is already on on the project
     * @param  int  $projectId
     * @param  int  $collaboratorId
     * @return boolean
     */
    private function isCollaborator($projectId, $collaboratorId)
    {
        return Collaboration::where('project_id', $projectId)
                            ->where('collaborator_id', $collaboratorId)
                            ->first();
    }

}