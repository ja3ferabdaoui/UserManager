<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Validator;


/**
 * User management
 *
 * User: Jaafar Abdaoui
 * Date: 26/04/2019
 * Time: 00:16
 */
class UsersManagementController extends Controller
{
    // space that we can use the repository from
    protected $model;
    protected $rules =
        [
            'email' => 'required|email',
        ];

    public function __construct(User $user)
    {
        // Set the model
        $this->model = new UserRepository($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $users = $this->model->all();

        return view('show-users', ['users' => $users]);
    }


    /**
     * Create a new user.
     *
     * @bodyParam name string required User's first_name. Example: Jaafar
     * @bodyParam email string required User's last_name. Example: Abdaoui
     * @bodyParam email string required User's email. Example: jaafar@abdaoui.com
     *
     * @response {
     *   "id": 1,
     *   "first_name": "Jaafar",
     *   "last_name": "Abdaoui",
     *   "email": "jaafar@abdaoui.com"
     * }
     *
     * @return JsonResponse
     * @throws RuntimeException
     *
     */
    public function store(Request $request)
    {

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        } else {
            // create record and pass in only fields that are fillable
            $user = $this->model->create($request->only($this->model->getModel()->fillable));
            Log::info('Successfully added User: ' . $user->id);

            return response()->json($user);
        }
    }

    /**
     * Update a user.
     *
     * @bodyParam firstname string required New first_name. Example: Jaafar
     * @bodyParam lastname string required New last_name. Example: Abdaoui
     * @bodyParam email string required New email. Example: jaafar@abdaoui.com
     *
     * @response boolean
     *
     * @return JsonResponse
     * @throws RuntimeException
     *
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        } else {
            // update model and only pass in the fillable fields
            $user = $this->model->update($request->only($this->model->getModel()->fillable), $id);
            Log::info('Successfully updated User: ' . $id);
            return response()->json($user);
        }
    }

    /**
     * Delete a user.
     *
     * @response 1 or 0
     *
     * @return JsonResponse
     * @throws Exception
     *
     */
    public function destroy($id)
    {
        $user = $this->model->delete($id);
        Log::info('Successfully deleted User: ' . $id);
        return response()->json($user);
    }
}
