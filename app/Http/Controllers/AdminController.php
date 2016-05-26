<?php

namespace yavu\Http\Controllers;
use Illuminate\Http\Request;
use yavu\Http\Requests;
use yavu\Http\Requests\EmpresaCreateRequest;
use yavu\Http\Requests\EmpresaUpdateRequest;
use yavu\Http\Requests\AdminCreateRequest;
use yavu\Http\Requests\AdminUpdateRequest;
use yavu\Http\Controllers\Controller;
use Session;
use Redirect;
use yavu\Admin;
use yavu\User;
use RUT;
use yavu\Empresa;
use yavu\BannerData;
use yavu\LinkBannerData;
use yavu\CategoryBannerData;
use Illuminate\Routing\Route;

class AdminController extends Controller
{
    private $bannerdata;
    private $linkbannerdata;
    private $categorybannerdata;
    private $existeEmpresa;
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
      public function SorteosPendientes(){
    return view('admins.sorteosPendientes', ['sorteospendientes' => Sorteo::where('estado_sorteo', 'Pendiente')->get()]);
    }
    public function bannercreate($empresa_id)
    {
        $this->existeEmpresa = Empresa::find(addslashes($empresa_id));
        if($this->existeEmpresa){

            $this->bannerdata = BannerData::where('empresa_id', $empresa_id)->where('estado_banner', 'Creando')->get();

            if(count($this->bannerdata)>0){
                return view('admins.banneradmin.bannercreate', ['bannerdata' => BannerData::find($this->bannerdata[0]->id)]);
            }else{
                $this->bannerdata = new BannerData();
                $this->bannerdata->empresa_id = addslashes($empresa_id);
                $this->bannerdata->estado_banner = 'Creando';
                $this->bannerdata->save();
                return view('admins.banneradmin.bannercreate', ['bannerdata' => $this->bannerdata]);
            }
        }else{
            Session::flash('message-error', 'La empresa no existe');
            return Redirect::to('/admins/empresas/index');
        }
    }

    public function bannerstore(Request $request){

        $this->bannerdata = BannerData::find($request->banner_data_id);
        $this->bannerdata->titulo_banner = $request->titulo;
        $this->bannerdata->descripcion_banner = $request->descripcion;
        $this->bannerdata->banner = $request->imagenbanner;
        $this->bannerdata->estado_banner = 'Creado';
        dd($this->bannerdata);
        $this->bannerdata->empresa_id = $request->empresa_id;
        $this->linkbannerdata = new LinkBannerData();
        $this->linkbannerdata->banner_data_id = addslashes($request->id);
        $this->categorybannerdata = new CategoryBannerData();
        $this->categorybannerdata->nombre_categoria = addslashes($request->id); 
        $this->bannerdata-> save();

        Session::flash('message', 'Banner para la empresa creado correctamente');
            return view('admins.banneradmin.index');
    }

    public function empresasindex(){
        return view('admins.empresasadmin.index', ['empresas' => Empresa::paginate(20)]);
    }

    public function empresascreate()
    {
        return view('admins.empresasadmin.create');
    }


    public function empresasedit($id){
        $this->empresa = Empresa::find($id);
        $this->user = User::find($this->empresa->user_id);
        return view('admins.empresasadmin.edit', ['empresa' => $this->empresa], ['user_email' => $this->user->email]);
    }
    public function empresasupdate(EmpresaUpdateRequest $request, $id){
        //AQUI VOY
        dd($request);
        if(RUT::check($request->rut)){
            $this->empresa->fill($request->all());
            $this->empresa->save();
            Session::flash('message', 'Empresa editada correctamente');
            return Redirect::to('/admins/empresa');
        }else{
            Session::flash('message-error', 'El rut ingresado no es válido.');
            return Redirect::to('/dashboard');
        }
    }
    public function empresasstore(EmpresaCreateRequest $request)
    {
        $this->user = User::where('email', $request->user_email)->get();
        if (count($this->user) > 0) {
            $this->empresa = Empresa::create($request->all());
            $this->empresa->user_id = $this->user[0]->id;
            $this->empresa->save();
            Session::flash('message', 'La empresa se creó correctamente.');
        } else {
            Session::flash('message-error', 'El cliente "' . $request->user_email . '" no existe');
        }
        return redirect()->to('/admins/empresas/create');
    }
    public function create()
    {
        return view('admins.create');
    }
    public function store(AdminCreateRequest $request)
    {
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
