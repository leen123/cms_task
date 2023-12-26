<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditorRequest;
use App\Http\Requests\Admin\SetPermissionEditorRequest;
use App\Http\Requests\Admin\UpdateEditorRequest;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Resources\Admin\EditorsResource;
use App\Http\Resources\UserResource;
use App\Http\Services\EditorService;
use App\Models\User;
use Illuminate\Http\Request;

use function App\Helper\permission_can;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();
        return EditorsResource::collection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EditorRequest $request)
    {
        permission_can('add_editors');
        $editor = EditorService::create($request->validated());
        return EditorsResource::make($editor);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $editor)
    {
        return EditorsResource::make($editor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEditorRequest $request, User $editor)
    {
        permission_can('update_editors');
        if ($editor->user_type !== UserTypes::EDITOR) {
            return response()->json(['error' => 'Editor ID does not exist.'], 404);
        
        }
        $editor->update($request->validated());
        $editor->role->update($request->validated());
        return EditorsResource::make($editor);
    }

    public function updateRoleWithPermissions(SetPermissionEditorRequest $request, User $editor, EditorService $service)
    {
        permission_can('update_editor_permissions');
        $service->updateRoleWithPermissions($request->validated(),$editor->role);
      
    }

    public function getAllEditorPermission( EditorService $service)
    {
        permission_can('get_editor_permissions');
        return $service->getEditorPermission()->get();
      
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $editor)
    {
        permission_can('delete_editors');    
         if ($editor->user_type !== UserTypes::EDITOR) {
        return response()->json(['error' => 'Editor ID does not exist.'], 404);
    }
        $editor->role()->delete();
    }
}
