<?php
/*******************
 * 
 * Sample template
 * for csv file
 * 
 * ****************/


function createCSV( $cols, $limit) {
    if(!empty ($cols) ) {
        $countCols  = count($cols);
        $csvfile    = fopen('test.csv', 'w');

        $values     = array (
                            array ('1','2','3'),
                            array ('4','5', '6'),
                            array ('7','8','9'),
                            array ('10','11','12'),
                            array ('13','14','15')
                        );
        $counter    = 0;

        // output each row of the data
        fputcsv($csvfile, $cols);
        foreach ($values as $row) {   
            
            fputcsv($csvfile, $row);
            $counter++;
            if($limit == $counter) break;
        }
        return  "A file has been generated with input data";
    } else {
            return "Invalid Argument value for column";
    }
	
}

$colnames	= array('Heading1', 'Heading2', 'Heading3');
echo $data 		= createCSV($colnames, 3);

