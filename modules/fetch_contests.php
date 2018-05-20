<?php

		date_default_timezone_set("Asia/kolkata");

		function get_status_diff($d,$h,$i,$s){
				$sec=0;
				$sec+=$d*86400;
				$sec+=$h*3600;
				$sec+=$i*60;
				$sec+=$s;
				return $sec;
		}
		require("connection.php");
		$query="select * from quiz_info";
		$result = $conn->query($query) or die(" error");
		$res=array();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				
				$diff=date_diff(date_create(date('y-m-d H:i:s')),date_create($row["start_time"]));
				$d=intval($diff->format('%r%d'));
				$h=intval($diff->format('%r%H'));
				$i=intval($diff->format('%r%i'));
				$s=intval($diff->format('%r%s'));
				$start=get_status_diff($d,$h,$i,$s);
				
				$diff=date_diff(date_create(date('y-m-d H:i:s')),date_create($row["end_time"]));
				$d=intval($diff->format('%r%d'));
				$h=intval($diff->format('%r%H'));
				$i=intval($diff->format('%r%i'));
				$s=intval($diff->format('%r%s'));
				$end=get_status_diff($d,$h,$i,$s);
				$status="";
				if($start>0 && $end<0){
					$status="wrong";
				}
				else if($start<0 && $end<0){
					$status='ended';
				}
				else if($start<0 && $end>0){
					$status='live';
				}
				else{
					$status= 'upcoming' ;
				}
				$row["status"]=$status;
				array_push($res,$row);

			}	
		}
		print_r(json_encode($res));
		$conn->close();

?>