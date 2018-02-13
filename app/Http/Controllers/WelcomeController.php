<?php

namespace Tionvel\Http\Controllers;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Tionvel\Http\Requests\WelcomeRequest;
use GuzzleHttp\Client;
use Session;
use Redirect;
use Carbon\Carbon;
class WelcomeController extends Controller
{
    public $feriados=array();
    public $fechas=array();
    public $comments=array();

    public function __construct(){
        $client= new Client();
        $response = $client->request('GET','https://feriados-cl-api.herokuapp.com/feriados');
        $f1= json_decode($response->getBody());
        foreach ($f1 as $feriado) {
            array_push($this->feriados, $feriado->date);
        }
        $response2=$client->request('GET','https://apis.digital.gob.cl/fl/feriados/2018');
        $f2= json_decode($response2->getBody());
        foreach ($f2 as $feriado) {
            if(!in_array($feriado,$this->feriados)){
                array_push($this->feriados, $feriado->fecha);
            }
        }
    }

    function isSunday($day){
        $isSunday=false;
        $cond = date("w",strtotime($day) ) == Carbon::SUNDAY;
        if ($cond) {
            $isSunday=true;
        }
        return $isSunday;

    }



    function isBusinessDay($date){

        $isBusinessDay=true;
        $addComments='';
        $date2=$date->toDateString();
        if( in_array($date2,$this->feriados) ){
            $isBusinessDay=false;
            array_push($this->comments,array('fecha'=>$date2,'comentarios'=>'Feriado'));
            
            
            
        }
        if($this->isSunday($date)){
            $isBusinessDay=false;
            
            array_push($this->comments,array('fecha'=>$date2,'comentarios'=>'Domingo'));
            
        }
        return $isBusinessDay;
    }




	function calculateDate($date,$days){
        $dias=0;
        while ($dias < $days) {
            $date=$date->addDay();
            if($this->isBusinessDay($date)){
               $dias++;
            }
        }
        return $date;
	}

    public function createFecha($fecha,$habiles,$index){
        $fecha1=Carbon::createFromFormat('Y-m-d',$fecha);
        $this->fechas[$index]['fecha_inicial']=$fecha1->toDateString();
        // $fecha1n= $request->input('fecha1n');
        $this->fechas[$index]['dias_habiles']=$habiles;
        $fecha1Final = $this->calculateDate($fecha1,$habiles)->toDateString();
        $this->fechas[$index]['fecha_final']=$fecha1Final;
        $this->fechas[$index]['no_habiles']=$this->comments;
        $this->comments=array();
    }

    public function validar(WelcomeRequest $request){

    	if(!empty($request->input('fecha1'))){
            $this->createFecha($request->input('fecha1'),$request->input('fecha1n'),0);
        }
        if(!empty($request->input('fecha2'))){
            $this->createFecha($request->input('fecha2'),$request->input('fecha2n'),1); 
        }
        if(!empty($request->input('fecha3'))){
             $this->createFecha($request->input('fecha3'),$request->input('fecha3n'),2);
        }
        if(!empty($request->input('fecha4'))){
             $this->createFecha($request->input('fecha4'),$request->input('fecha4n'),3);
        }
    	
        return view("welcome")->with('fechas',$this->fechas); 
        // return $this->feriados;   
        // return $this->comments; 
        // return $this->fechas;
    	

    }

    public function getJson(Request $req){
        return $req;
    }

  
    
}
