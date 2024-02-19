<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numero;
use App\Models\Contrat;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Affectation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Validator,  Redirect; 


class TestController extends Controller
{
    public function index( Request $request){
        $contrats=Contrat::paginate(5);
    return view ('test.index',['contrats'=>$contrats]);
    }
    
    public function create( Request $request, Contrat $contrat, Numero $numero){
    
    $contrats=Contrat::paginate(5);
    return view ('test.create',['contrats'=>$contrats]);
    }
    public function edit(Numero $numero,Contrat $contrat,Request $request)
    { 
        
         $id=Input::get('id');
         $numero=Input::get('numero');
           $list=DB::table('Contrats')
         ->select('Contrats.*')
         ->where('id','LIKE','%'.$id.'%')
         ->first();

      $list2=DB::table('Numero')
         ->join('Contrats','Numero.idContrat','=','Contrats.id')
         ->select('Numero.*')
         ->where('idcontrat','like','%'.$id.'%')
         ->get();
         
         ;
        return view('test.edit',['list'=>$list,'list2'=>$list2]);
    }
    
    public function update(Numero $numero ,Contrat $contrat,Request $request)
     {
        
    $request->validate([
        'heurs'=>'required',
        'data'=>'required',
        'prix'=>'required'
     ]);
        $id=$request->id;
        $numero1=$request->numero;
        $data=$request->data;
        $heurs=$request->heurs;
        $prix=$request->prix;
        $number=$request->number;
        $request->validate([
            'numero'=>['required',Rule::unique('Contrats')->ignore($id)],
            
        ]);
        DB::table('Contrats')->where('id',$id)->update(array('numero'=>$numero1,'data'=>$data,'heurs'=>$heurs,'prix'=>$prix));
         
        $idContrat= $id;
        $number = $request->input('number');
        $status = $request->input('status');
         $deleteIds =$request->input('delete_ids');
        // DB::table('Numero')->where('idContrat',$idContrat)->delete();

    
    if(!is_null($number)){

        DB::table('Numero')->where('idContrat', $idContrat)->delete();
        $errors = [];
        for ($i = 0; $i < count($number); $i++) {
            $rules = [
                'number' => 'unique:Numero,number,'.$idContrat
            ];
            $messages = [
                'number.unique' => 'One number you entered already exists. Please enter a unique number.'
            ];
            $validator = Validator::make(['number' => $number[$i]], $rules, $messages);
            if ($validator->fails()) {
                $errors[$i] = $validator->errors()->first();
                continue; // Skip this record and continue the loop
            }
            Numero::updateOrCreate(
                ['number' => $number[$i], 'idContrat' => $idContrat],
                ['status' => $status[$i]]
            );
        
        }
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }
        return redirect('/tests');
    }
    //delete loop
    if ($request->delete_ids) {
        foreach ($request->delete_ids as $id) {
            Numero::destroy($id);
        }
    }
}
public function affectation2(Request $request)
    {
        
              $listEmployee=DB::table('Employee')
                ->select('Employee.*')
                ->leftJoin('Affectation','Affectation.idEmployee','=','Employee.id')
                ->whereNull('Affectation.idEmployee')
                ->get();

                 $listTelephone=DB::table('Numero')
                ->select('Numero.*')
                ->leftJoin('Affectation','Affectation.idTelephone','=','Numero.id')
                ->whereNull('Affectation.idTelephone')
                ->get();
        return view('test.createAffectation',['listEmployee'=>$listEmployee,'listTelephone'=>$listTelephone]);

    }
    public function createAffectation(Request $request)
     {
                
                    $idEmployee=$request->idEmployee;
                    $idTelephone=$request->idTelephone;
                    $active=$request->active;
                    $dataAffectation=$request->dataAffectation;

                    $affectation = new Affectation;
                    $affectation->idEmployee = $idEmployee;
                    $affectation->idTelephone = $idTelephone;
                    $affectation->active = $active;
                    $affectation->dataAffectation = $dataAffectation;
                    $affectation->save();

        return redirect()->back()->with('success', 'Contrat created successfully.');
    }
    public function store(Request $request,Contrat $contrat,Numero $numero){
        
            $request->validate([
                'heurs' => 'required|numeric|min:0',
                'data' => 'required|numeric|min:0',
                'prix' => 'required|numeric|min:0',
                'numero' => 'required|numeric|min:0|unique:Contrats',
                'number.*' => 'numeric|min:0|unique:Numero,number'

            ]);
                
            $numero = $request->input('numero');
            $data = $request->input('data');
            $heurs = $request->input('heurs');
            $prix = $request->input('prix');
            $number = $request->input('number');
            $status = $request->input('status');

                
            // Create a new Contrat
            $contrat = new Contrat;
            $contrat->numero = $numero;
            $contrat->data = $data;
            $contrat->heurs = $heurs;
            $contrat->prix = $prix;
            $contrat->save();
            $idContrat = $contrat->id;
                
            // Create the new Numbers
            if(!empty($number)) {
                $errors = [];
                for ($i = 0; $i < count($number); $i++) {
                    
                    Numero::create([
                        'number' => $number[$i],
                        'status' => $status[$i],
                        'idContrat' => $idContrat
                    ]);
                }
                if (!empty($errors)) {
                    return redirect()
                    ->withErrors($errors)
                    ->withInput($request->except(['number', 'status']));
                    ;
                }
                
            }
            return redirect()->back()->with('success', 'Contrat created successfully.');
        
    }
    public function show(string $id , Request $request)
    {
            $contrat=Contrat::where('id',$id)->first();
            
            $numero=$request->query('Numero');
            $numeroStatus=$request->query('Numero');
            $ContratNumero=$request->query('Numero');
            $list=DB::table('Numero')
                            ->join('Contrats','Numero.idContrat','=','Contrats.id')
                            ->where('Contrats.id','like','%' .$id.'%')
                            ->select('Numero.*','Numero.number as numero','Numero.status as numeroStatus','Contrats.Numero as ContratNumero')
                            ->paginate(5);
    
    
        return view ('test.show',['list'=>$list,'contrat'=>$contrat,'numero'=>$numero,'numeroStatus'=>$numeroStatus,'ContratNumero'=>$ContratNumero]);
    }
    public function showAll( Request $request)
    {
        $numero=Numero::paginate(5);
        return view ('test.showAll',['numero'=>$numero]);
    }
    public function showAffectation(Request $request)
    {
            $affectations=affectation::paginate(5);
            $EmployeeName=$request->query('employee');
            $Number=$request->query('numero');
            $list=DB::table('Affectation')
                        ->join('Employee','Affectation.idEmployee','=','Employee.id')
                        ->join('Numero','Affectation.idTelephone','=','Numero.id')
                        ->select('Affectation.*','Numero.number as Number','Employee.name as EmployeeName')
                        ->get();
        return view ('test.showAffectation',['affectations'=>$affectations,'list'=>$list,'Number'=>$Number,'EmployeeName'=>$EmployeeName]);
    }

    public function destroy(Request $request,$id)
    {
        $contrat=Contrat::findOrFail($id);
        $contrat->delete();
        return redirect()->route('tests.index')->with('success',
        'deleted succesfully');
    }
    
    public function search(Request $request){
        $get_name=$request->search_name;
        $contrats=Contrat::where('numero','LIKE','%'.$get_name.'%')->get();
        return view('test.search',compact('contrats'))
        
        ->with("i",(request()->input("page",1)-1)*5);
    }
    public function search2(Request $request){
        
        $numero=Numero::all();
        $get_name=$request->search_name;
        $ContratNumero=$request->query('Contrats');
         $list=DB::table('Numero')
                        ->join('Contrats','Numero.idContrat','=','Contrats.id')
                        ->select('Numero.*','Contrats.Numero as ContratNumero')
                        ->where('number','LIKE','%'.$get_name.'%')
                        
                        ->get();
        
        return view('test.search2',['list'=>$list]);
    }
    public function indexEmployee( Request $request){
        $employees=Employee::all();
        $DepartmentName=$request->query('Department');
        $list=DB::table('Employee')
                        ->join('Department','Employee.DepartmentId','=','Department.DepartmentId')
                        ->select('Employee.*','Department.name as DepartmentName')
                        ->paginate(5);
    return view ('test.indexEmployee',['list'=>$list,'DepartmentName'=>$DepartmentName,'employees'=>$employees]);
    }
    public function createEmployee(){
        $departments=Department::all();
        return view('test.createEmployee',['departments'=>$departments]);
    }
    public function storeEmployee(Request $request){
        
                    $name=$request->name;
                    $lastName=$request->lastName;
                    $number=$request->number;
                    $DepartmentId=$request->DepartmentId;

                    $employee = new Employee;
                    $employee->name = $name;
                    $employee->lastName = $lastName;
                    $employee->number = $number;
                    $employee->DepartmentId = $DepartmentId;
                    $employee->save();
        return redirect()->back()->with('message',' bien ajouté');
    }
    public function editEmployee(int $id){
            $employee=Employee::find($id);
            $departments=Department::all();
            return view('test.editEmployee',compact('employee','departments'));
    }
    public function updateEmployee(Request $request){
        $request->id;
        $employee=Employee::find($request->id);
        $input = $request->all();
        $employee->update($input);
        return redirect('tests/indexEmployee')->with('success',
        'updated successfully');
    }
    public function editAffectation(int $id)
    {
        $affectation=affectation::find($id);
        $employee=employee::all();
        $numero=numero::all();
        return view('test.editAffectation',compact('affectation','employee','numero'));
    }
    public function updateAffectation(Request $request)
    {;
    $affectation=affectation::find($request->id);
             $id=$request->id;
            $idEmployee = $request->idEmployee;
            $idTelephone = $request->idTelephone;
            $active = $request->active;
            $dataAffectation = $request->dataAffectation;
            if(!is_null($request->dataRupture)){
            $dataRupture = $request->dataRupture;}
            else{
                $active=0;
                $dataRupture= null;
            }
            DB::table('Affectation')->where('id',$id)->update(array('idEmployee'=>$idEmployee,'idTelephone'=>$idTelephone,'active'=>$active,'dataAffectation'=>$dataAffectation,'dataRupture'=>$dataRupture));

    
    return redirect('tests/showAffectation')->with('success',
    'updated successfully');
    }
        
}
