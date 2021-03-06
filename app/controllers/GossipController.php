<?php

class GossipController extends \BaseController {


    /*public function createNumber($num, $cnam, $ocn, $assignee, $location_zip, $location, $otc, $rao, $bsp, $collect, $alt_spid, $service_indicator, $reachability, $type, $gusi, $pin, $certificate){

        $count = Number::where('number', '=', $num)->count();

        if($count == 0) {
            Number::create([
                'number' => $num
            ]);

            $number = Number::where('number', '=', $num)->first();

            $number->cnam= $cnam;
            $number->ocn = $ocn;
            $number->assignee = $assignee;
            $number->location_zip = $location_zip;
            $number->location = $location;
            $number->otc = $otc;
            $number->rao= $rao;
            $number->bsp = $bsp;
            $number->collect = $collect;
            $number->alt_spid = $alt_spid;
            $number->service_indicator = $service_indicator;
            $number->reachability = $reachability;
            $number->type = $type;
            $number->gusi = $gusi;
            $number->pin = $pin;
            $number->certificate = $certificate;

            $number->save();

        }

        return "ok";

    }*/

    public function createNumber(){



        Number::create([
            'number' => Input::get('number'),
            'cnam'=> Input::get('cnam'),
            'ocn' => Input::get('ocn'),
            'assignee' => Input::get('assignee'),
            'location_zip' => Input::get('location_zip'),
            'location' => Input::get('location'),
            'otc' => Input::get('otc'),
            'rao'=> Input::get('rao'),
            'bsp' => Input::get('bsp'),
            'collect' => Input::get('collect'),
            'alt_spid' => Input::get('alt_spid'),
            'service_indicator' => Input::get('service_indicator'),
            'reachability' => Input::get('reachability'),
            'type' => Input::get('type'),
            'gusi' => Input::get('gusi'),
            'pin' => Input::get('pin'),
            'certifcate' => Input::get('certificate')
        ]);

        /*

        /*$number = Number::where('number', '=', Input::get('number'))->first();


        $number->cnam= Input::get('cnam');
        $number->ocn = Input::get('ocn');
        $number->assignee = Input::get('assignee');
        $number->location_zip = Input::get('location_zip');
        $number->location = Input::get('location');
        $number->otc = Input::get('otc');
        $number->rao= Input::get('rao');
        $number->bsp = Input::get('bsp');
        $number->collect = Input::get('collect');
        $number->alt_spid = Input::get('alt_spid');
        $number->service_indicator = Input::get('service_indicator');
        $number->reachability = Input::get('reachability');
        $number->type = Input::get('type');
        $number->gusi = Input::get('gusi');
        $number->pin = Input::get('pin');
        $number->certifcate = Input::get('certificate');

        $number->save(); */
        //return Redirect::to('/system');
        return "ok";

    }


    public function editNumber(){

        //$number = Number::find(Input::get('id'));

        $number = Number::where('number', '=', Input::get('number'))->first();

        if($number->cnam !== Input::get('cnam')){
            $comment = "CNAM: ".$number->cnam." &#8594; ".Input::get('cnam');
            static::addToLog($number->number, $comment, 'edit');
            $number->cnam = Input::get('cnam');
        }

        if($number->ocn !== Input::get('ocn')){

            $comment = "OCN: ".$number->ocn." &#8594; ".Input::get('ocn');
            static::addToLog($number->number, $comment, 'edit');
            $number->ocn = Input::get('ocn');
        }


        if($number->assignee !== Input::get('assignee')){
            $comment = "Assignee: ".$number->assignee." &#8594; ".Input::get('assignee');
            static::addToLog($number->number, $comment, 'edit');
            $number->assignee = Input::get('assignee');
        }

        if($number->location_zip !== Input::get('location_zip')){
            $comment = "Zip: ".$number->location_zip." &#8594; ".Input::get('location_zip');
            static::addToLog($number->number, $comment, 'edit');
            $number->location_zip = Input::get('location_zip');
        }

        if($number->location !== Input::get('location')){
            $comment = "Location: ".$number->location." &#8594; ".Input::get('location');
            static::addToLog($number->number, $comment, 'edit');
            $number->location= Input::get('location');
        }

        if($number->otc !== Input::get('otc')){
            $comment = "OTC: ".$number->otc." &#8594; ".Input::get('otc');
            static::addToLog($number->number, $comment, 'edit');
            $number->otc= Input::get('otc');
        }

        if($number->rao !== Input::get('rao')){
            $comment = "RAO: ".$number->rao." &#8594; ".Input::get('rao');
            static::addToLog($number->number, $comment, 'edit');
            $number->rao = Input::get('rao');
        }

        if($number->bsp !== Input::get('bsp')){
            $comment = "BSP: ".$number->bsp." &#8594; ".Input::get('bsp');
            static::addToLog($number->number, $comment, 'edit');
            $number->bsp = Input::get('bsp');
        }

        if($number->collect !== Input::get('collect')){
            $comment = "Collect: ".$number->collect." &#8594; ".Input::get('collect');
            static::addToLog($number->number, $comment, 'edit');
            $number->collect = Input::get('collect');
        }

        if($number->alt_spid !== Input::get('alt_spid')){
            $comment = "Alt SPID: ".$number->alt_spid." &#8594; ".Input::get('alt_spid');
            static::addToLog($number->number, $comment, 'edit');
            $number->alt_spid = Input::get('alt_spid');
        }

        if($number->service_indicator !== Input::get('service_indicator')){
            $comment = "Service Indicator: ".$number->service_indicator." &#8594; ".Input::get('service_indicator');
            static::addToLog($number->number, $comment, 'edit');
            $number->service_indicator = Input::get('service_indicator');
        }

        if($number->reachability !== Input::get('reachability')){
            $comment = "Reachability: ".$number->reachability." &#8594; ".Input::get('reachability');
            static::addToLog($number->number, $comment, 'edit');
            $number->reachability = Input::get('reachability');
        }

        if($number->type !== Input::get('type')){
            $comment = "Type: ".$number->type." &#8594; ".Input::get('type');
            static::addToLog($number->number, $comment, 'edit');
            $number->type = Input::get('type');
        }

        if($number->certificate !== Input::get('certificate')){
            $comment = "Certificate changed.";
            static::addToLog($number->number, $comment, 'edit');
            $number->certificate = Input::get('certificate');
        }


        if($number->pin != Input::get('pin')){
            $comment = "Changed PIN";
            static::addToLog($number->number, $comment, 'edit');
            $number->pin = Input::get('pin');
        }

        $number->save();

        return "ok";
    }

    private function addToLog($number, $comment, $type){
        NumLog::create([
            'number' => $number,
            'type'  => $type,
            'description' => $comment
        ]);

        return 0;
    }
}
