<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Message;
use DB;

class MensajeriaController extends Controller
{
    public function index()
    {
        $mensajeria = Message::all();
        return view("mensajeria.listar",compact("mensajeria"));
    }

    public function crear()
    {
        $subjects = Subject::all();
        return view("mensajeria.index",compact("subjects"));
    }

    public function asunto()
    {
        $info = DB::table('message')
                ->select('subject.desc', 
                         DB::raw('count(*) as Total') ,
                         DB::raw('(select count(me.subjectId) * 100 / count(message.id)   from message me) as porcentaje '))
                ->join('subject','message.subjectId','=','subject.id')
                ->groupBy('subject.desc')
                ->get();
        return view("mensajeria.asunto",compact("info"));
    }

    public function guardar(Request $request)
    {
       
        $request->validate([
            "fromName"=>"required|max:50",
            "fromEmail"=>"required|max:50|email",
            "subjectId"=>"required",
            "body"=>"required|max:50",
        ]);

        $inputs = $request->all();
        $spanInt = 0;
        $mensaje = explode(" ",$inputs["body"]);
        $count =0;
        foreach ($mensaje as $key => $value) {
           if($value == "viagra"){
             $spanInt = $spanInt+5;
           }
           if($value == "oferta"){
            $spanInt = $spanInt+4;
           }

           if($value == "buy"){
            $spanInt = $spanInt+5;
           }

           if($value =="contactanos"){
            $spanInt = $spanInt+3;
           }

           if($value =="tarifas"){
            $spanInt = $spanInt+2;
           }

           if($value =="stock"){
            $spanInt = $spanInt+1;
           }
            $count++;
        }

        $spanInt_ = $spanInt  /$count;
        $esSpam=0;
        if ($spanInt_ >2.5) {
            $esSpam=1;
        }
         
         $mensajeria = Message::create(
             [
                 "fromName"=>$inputs["fromName"],
                 "fromEmail"=>$inputs["fromEmail"],
                 "subjectId"=>$inputs["subjectId"],
                 "body"=>$inputs["body"],
                 "spamScore"=>$spanInt ,
             ]
         );

        return redirect("/");
    }
}
