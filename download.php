<?php
error_reporting(0); 	
    for($i = 662; $i <= 676; $i++) {
            for($j = 0; $j <= 65; $j++) {
                    $fileFrom = sprintf('http://scherbinka-dom.ru/img/images/%03d_%02d_big.jpg', $i, $j);
					// $fileFrom = 'http://scherbinka-dom.ru/img/images/'.$i.'_'.$j.'_big.jpg';
					// if (!file_exists($fileFrom)) {
                    $filenameFrom = basename($fileFrom);
                    $uploadToDir = 'files/'.$filenameFrom;
                    if (!copy($fileFrom, $uploadToDir)) {
                            echo ('<b>Файл не сохранен </b>'.$fileFrom.'<br />');
							// sleep (1);
                    } else {
					echo ('<h2>Файл успешно сохранен </h2>'.$fileFrom.'<br />');
					}
				// }
				// echo '<h2>Это var_dump </h2>'. var_dump($fileFrom).'<br />';
            }
    }
	
// if (file_exists($filename)) {
    // echo "The file $filename exists";
// } else {
    // echo "The file $filename does not exist";
// }
// $i = 10;
// $j = 2;
    // for($i = 471; $i <= 696; $i++) {
            // for($j = 0; $j <= 999; $j++) {
// 010_002_big.jpg
// $fileNameFrom = sprintf("%03d_%03d_big.jpg", $i, $j);
// echo $fileNameFrom.'<br />';
	// }
// }