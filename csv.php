<?php
/*******************
 * 
 * Sample template
 * for csv file
 * 
 * ****************/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class csv {
    public function createCSV( $cols, $limit) {
        if(!empty ($cols) ) {
            
            $countCols  = count($cols);
            $csvfile    = fopen('test.csv', 'w');
            
            fputcsv($csvfile, $cols);
             for($i=1; $i<$limit; $i++){
                $row = array ($i, mt_rand(10,100), mt_rand(1,100));
                fputcsv($csvfile, $row);
            }
            return  "A file has been generated with input data";
        } else {
            return "Invalid Argument value for column";
        }

    }
}


$colnames   = array('Heading1', 'Heading2', 'Heading3');
$data       = new csv ();
$return     = $data->createCSV($colnames, 10);
echo $return;

