<?php 

// $r = array(
//     'from' => 'Mosel',
//     'destination' => 'SSV',
//     'time' => '7pm',
//     'date' => '3 April'
// );

// function setReturn(array $return){
//     $a = array(
//         'from'=>$return['from'],
//         'destination'=>$return['destination'],
//         'time'=>$return['time'],
//         'date'=>$return['date']
//     );
    
//     echo $a['destination'];
// }

// setReturn($r);

function testingFunction($a=null){
    echo $a;
    $num = 0; 
    while($num=0){
        testingFunction("World");
        $num++;
    }
}

testingFunction("Hello");