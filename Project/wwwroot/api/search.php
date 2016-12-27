<?php
header('Content-Type: application/json');

include ('../connect.php');

		$keyword = $_GET["key"];

		// User information
		$sql = "SELECT * FROM article WHERE title LIKE '%$keyword%'";
		$result = mysql_query($sql);
		$valCount = 0;
		if($result){
					while($row = mysql_fetch_array($result)){
						// $data[] = $row["PatientFirstname"].')='.$row["PatientLastname"];
						// $dataPic[] = "https://surasak.io/alz/uploads/".$row["PatientPicture"];
						$data[] = array(
							"id"=>$row['article_id'],
							"title"=>$row['title'],
							"detail"=>$row['detail']
					    );
					}
						$json = array('count'  => count($data), 'data' => $data, 'sql'=>$sql);
				}
		print(json_encode($json));
		mysql_close();

?>