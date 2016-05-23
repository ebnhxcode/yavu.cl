<?php
namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Empresa;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\AdminCreateRequest;
use yavu\Http\Requests\AdminUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\Admin;
use yavu\User;
use Illuminate\Routing\Route;
class AdminController extends Controller
{
    public function __construct(){

        $this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
    }
    public function find(Route $route){
    $this->admin = Admin::find($route->getParameter('admins'));
    //return $this->user;
    }    
    public function index()
    {
        $admins = Admin::paginate(5);
        return view('admins.index', compact('admins'));
    }
    public function indexbanner(){
    return view('admins.banneradmin.index');
    }
    public function create(){
        return view('admins.create');
    }

    public function empresasindex(){
        return view('admins.empresasadmin.index', ['empresas' => Empresa::paginate(20)]);
    }
    public function empresascreate(){
        return view('admins.empresasadmin.create');
    }
    public function empresasstore(EmpresaCreateRequest $request){
        $this->user = User::where('email', $request->user_email)->get();
        if(count($this->user)>0){
            $this->empresa = Empresa::create($request->all());
            $this->empresa->user_id = $this->user[0]->id;
            $this->empresa->save();
            Session::flash('message', 'La empresa se creó correctamente.');
        }else{
            Session::flash('message-error', 'El cliente "'.$request->user_email.'" no existe');
        }
        return redirect()->to('/admins/empresas/create');
    }

    public function store(AdminCreateRequest $request){
        Admin::create($request->all());
        Session::flash('message', 'Aministrador creado correctamente');
        return Redirect::to('/admins');        
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        return view('admins.edit', ['admin' => $this->admin]); 
    }
    public function update(AdminUpdateRequest $request, $id)
    {
        $this->admin->fill($request->all());
        $this->admin->save();
        Session::flash('message', 'Admin editado correctamente');
        return Redirect::to('/admins');
    }
    public function destroy($id)
    {
        $this->admin->delete();
        Session::flash('message', 'Admin eliminado correctamente');
        return Redirect::to('/admins');
    }
}
