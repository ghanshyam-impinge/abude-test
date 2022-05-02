<?php
class customCsv {
    function createCSV( $filename, $cols, $limit ) {
        if(!empty ($cols) ) {

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="'.$filename.'";'); // to download the csv

            // clean output buffer
            ob_end_clean();

            $csvfile    = fopen('php://output', 'w'); 

            fputcsv($csvfile, $cols);
                $count = count($cols) - 1;
                for($i=1; $i<=$limit; $i++) {
                        $row = array($i);
                        for($j=1; $j<=$count; $j++) {
                                array_push($row,mt_rand(50,500));
                        }
                        fputcsv($csvfile, $row);
                }

                fclose( $csvfile );
                // flush buffer
                ob_flush();

            exit();
        } else {
            return "Invalid Argument value for column";
        }

    }
}

$filename = 'dummyCSV.csv';
$colnames	= array('S.N', 'Col2', 'Col3');

$data   =   new customCsv();
$output = $data->createCSV($filename, $colnames, 20);
echo $output;

?>