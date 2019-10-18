<?php
class Dategen {

    public $fromDate;
    public $toDate;
    //public $holidayDate=[];
    public $weekendDay=[];
    public static $dateFormat='Y-m-d';
    public $days=7;

    public $holiDay=[
        'j'=>[8, 14], //Monthly OFF
        'N'=>[6,7], //Monday to Sunday
        'z'=>[1], //Yearly OFF
    ];

    public $holidayDate = [
        '2019-10-28',
        '2019-10-02',
        '2019-10-08'
    ];

    public $times = [
       1 => '06:00-07:00',
       2 => '07:00-08:00',
       3 => '08:00-09:00',
       4 => '09:00-10:00',
       5 => '10:00-11:00',
       6 => '11:00-12:00',
       7 => '12:00-13:00',
       8 => '14:00-15:00',   
       9 => '15:00-16:00',
       10 => '16:00-17:00',
       11 => '17:00-18:00',      
    ];

    public $timeRule = [
            1 => [1, 2, 5],
            2 => [2, 3, 4, 5, 7, 9],
            3 => [2, 3, 4, 7],
            4 => [2, 5, 7],
            5 => [2, 3, 4, 7,11],
            6 => [ 4, 7],
            7 => [2, 3, 4, 7, 8, 9, 10, 11],
     
    ];

   public $SlotLimit = [
        'N' => 4, // Default Slot for All
        'R' =>[
           1 => 4,
           2 => 8,
        ]
   ];
    
    public function __construct(array $parm = []) {

        if(isset($parm['fromDate'])) {
            $fromDate = date('Y-m-d', strtotime(DateTime::createFromFormat('Y-m-d', $parm['fromDate'])->format('Y-m-d')));
        } else {
            $fromDate = date("Y-m-d");
        }
        $this->fromDate=$fromDate;

        if(!isset($parm['toDate'])) {
            $_newdateformat = $this->fromDate.' + '.$this->days.' days';
            $toDate = date('Y-m-d', strtotime($_newdateformat));
        } else {
            $toDate = date('Y-m-d', strtotime(DateTime::createFromFormat('Y-m-d', $parm['toDate'])->format('Y-m-d')));
        }

       $this->toDate=$toDate;
    }

    function getDatesFromRange($start=null, $end=null) {
        $start = ($start==null) ? $this->fromDate : $start;
        $end = ($end==null) ? $this->toDate : $end;
        $format =  Dategen::$dateFormat ;

        $array = array();
        $holidayArray = $_holiday = [];

        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            foreach($this->holiDay as $K=>$V){
               if(in_array($date->format($K), $V)){
                $holidayArray[$K][] = $date->format($format); //FUTURE USE
                $_holiday[] = $date->format($format);
               } 
            }
            $array[] = $date->format($format); 
        }


        $returnDate= array_values( array_diff($array, array_merge($_holiday,$this->holidayDate)) );
        return $returnDate;
        //return (array_merge(array_diff($array, $_holiday), array_diff($_holiday, $array)));
    }


    public function timeSlot($date) {
        $date = new DateTime($date);
        $timeTable=[];
        foreach($this->timeRule as $K=>$V) {
            $timeTable = ( $this->timeRule[$K][$date->format($K)] );
        }

        foreach ( $timeTable as $K=>$V) {
            $timeTable[$K] = $this->times[$V];
           // $this->times
        }
      
        return $timeTable;
    }
}

 $obj = new Dategen(['fromDate'=>'2019-10-01', 'toDate'=>'2019-10-31']);

 //$obj->toDate = '2019-12-31';
 //echo $obj->fromDate."<br>";
 //echo $obj->toDate."<br>";

 $dates=$obj->getDatesFromRange();

 echo "<pre>";print_r($dates)."</pre>";

 echo "<pre>";print_r($obj->timeSlot($dates[7]))."</pre>";

