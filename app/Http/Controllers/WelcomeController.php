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
    //public arrays to set holidays
    public $feriados=array();
    public $fechas=array();
    public $comments=array();

    public function __construct(){
        //create the $feriados array, getting holidays of 2016, 2017 and 2018 from 2 different APIs with Guzzle
        $client= new Client();
        $response = $client->request('GET','https://feriados-cl-api.herokuapp.com/feriados');
        $f1= json_decode($response->getBody());
        foreach ($f1 as $feriado) {
            //save only the "date" field into $feriados
            array_push($this->feriados, $feriado->date);
        }
        $response2=$client->request('GET','https://apis.digital.gob.cl/fl/feriados/2018');
        $f2= json_decode($response2->getBody());
        foreach ($f2 as $feriado) {
            if(!in_array($feriado,$this->feriados)){
                // save only the "fecha" field into $feriados
                array_push($this->feriados, $feriado->fecha);
            }
        }
    }

    function isSunday($day){
        $isSunday=false;
        //compare the number of the date with the Carbon number asociated to SUNDAY
        $cond = date("w",strtotime($day) ) == Carbon::SUNDAY;
        if ($cond) {
            //return true if is Sunday
            $isSunday=true;
        }
        return $isSunday;

    }



    function isBusinessDay($date){

        $isBusinessDay=true;
        $date2=$date->toDateString();
        //if the current date from the calulatedDate function is on the $feriados array...
        if( in_array($date2,$this->feriados) ){
            //return false and add the date and a comment to the $comments array
            $isBusinessDay=false;
            array_push($this->comments,array('fecha'=>$date2,'comentarios'=>'Feriado'));
        }
         //check if the current date is Sunday with isSunday function
        if($this->isSunday($date)){
            //return false if is Sunday and add the date and a comment to the $comments array
            $isBusinessDay=false;
            
            array_push($this->comments,array('fecha'=>$date2,'comentarios'=>'Domingo'));
            
        }
        return $isBusinessDay;
    }




	function calculateDate($date,$days){
        $dias=0;
        //while $dias is minor to the business days added in the form
        while ($dias < $days) {
            //add 1 day
            $date=$date->addDay();
            //check if the current date is business day with the isBusinessDay function
            if($this->isBusinessDay($date)){
                //increment $dias by 1
               $dias++;
            }
        }
        return $date;
	}

    public function createFecha($fecha,$habiles,$index){
        //set the date to the correct format with Carbon
        $fecha1=Carbon::createFromFormat('Y-m-d',$fecha);
        //save the "fecha_inicial" and "dias_habiles" fields into the $index index of $fecha array
        $this->fechas[$index]['fecha_inicial']=$fecha1->toDateString();
        $this->fechas[$index]['dias_habiles']=$habiles;
        //Calculate the Final Date with the calculateDate function and format the return with toDateString
        $fecha1Final = $this->calculateDate($fecha1,$habiles)->toDateString();
        //save the "fecha_final" field into the $index index of $fecha array
        $this->fechas[$index]['fecha_final']=$fecha1Final;
        // save the NON business days into $fecha array
        $this->fechas[$index]['no_habiles']=$this->comments;
        // clean the comments array
        $this->comments=array();
    }

    public function validar(WelcomeRequest $request){

        //Check if someway the inputs are empty
    	if(!empty($request->input('fecha1'))){
            //if not, we call the createFecha function
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
