<?
class home_page extends Controller {

		// --------- Login Controllers
		###################################################################
				// *** Login Page View
				public function login() {
					session_start("bayati");
					if($_SESSION["PanelUser"]!="bayatipanel"){
						if($_POST["username"]=="admin" && $_POST["password"]=="password"){
							$_SESSION["PanelUser"]="bayatipanel";
							header("Location: http://localhost/bayati/home_page/home");
						}else{
							require_once("public/login.php");
						}
					}else{
						header("Location: http://localhost/bayati/home_page/home");
					}
				}


				// *** Logout Post Action
				public function logout() {
					session_start("bayati");
					$_SESSION["PanelUser"]="";
					header("Location: http://localhost/bayati");
					exit;
				}
		###################################################################




		// --------- Home Page Controller
		###################################################################
				// *** Home Page View
				public function home($Type=false, $Parameters="") {
					session_start("bayati");
					if($_SESSION["PanelUser"]!="bayatipanel"){
						header("Location: http://localhost/bayati");
					  exit;
					}
					require_once ("vc_app/model/class/SQL_Class.php");

					//Select history for old search
					$HistoryQuery = $Sql_Connection -> Select_Query("history", "input,type,hits", "WHERE hits > 3 ORDER BY id DESC");
					$HistoryQuery_Row = $HistoryQuery -> fetch_array();

					if($Type=="Query 1" || $Type=="Query 2" || $Type=="Query 3"){
						$Parameters = $Sql_Connection -> DB_Connection -> real_escape_string($Parameters);
					}
					if($Parameters!=""){
						$CheckIFHistory = $Sql_Connection -> Select_Query("history", "input,hits", "WHERE input='".$Parameters."' LIMIT 1");
						$CheckIFHistory_Row = $CheckIFHistory -> fetch_array();

						switch ($Type) {
							case 'Query 1':
									if($CheckIFHistory->num_rows > 0){
										if($CheckIFHistory_Row["hits"] < 4){
											$Sql_Connection -> Update_Query("history", array("hits"=>($CheckIFHistory_Row["hits"])+1), "WHERE input='".$Parameters."' LIMIT 1");
										}
									}else{
										$Sql_Connection -> Insert_Query("history", array("input"=>$Parameters, "type"=>"Query 1", "hits"=>"1"), "");
									}

									if($Parameters!=""){
										$Query1 = $Sql_Connection -> Select_Query("school_data", "distinct(club),school", "WHERE kid_email='".$Parameters."' ORDER BY club ASC");
										$Query1_Row = $Query1 -> fetch_array();
									}
									$Query1_Input = $Parameters;
							break;
							//End Query1 Case


							case 'Query 2':
									if($CheckIFHistory->num_rows > 0){
										if($CheckIFHistory_Row["hits"] < 4){
											$Sql_Connection -> Update_Query("history", array("hits"=>($CheckIFHistory_Row["hits"])+1), "WHERE input='".$Parameters."' LIMIT 1");
										}
									}else{
										$Sql_Connection -> Insert_Query("history", array("input"=>$Parameters, "type"=>"Query 2", "hits"=>"1"), "");
									}
									$Query2 = $Sql_Connection -> Select_Query("school_data", "school,kid", "WHERE club='".$Parameters."' ORDER BY school ASC");
									$Query2_Row = $Query2 -> fetch_array();
									$Query2_Input = $Parameters;
							break;
							//End Query2 Case


							case 'Query 3':
									if($CheckIFHistory->num_rows > 0){
										if($CheckIFHistory_Row["hits"] < 4){
											$Sql_Connection -> Update_Query("history", array("hits"=>($CheckIFHistory_Row["hits"])+1), "WHERE input='".$Parameters."' LIMIT 1");
										}
									}else{
										$Sql_Connection -> Insert_Query("history", array("input"=>$Parameters, "type"=>"Query 3", "hits"=>"1"), "");
									}

									$Query3_Other_Kids_Club = $Sql_Connection -> Select_Query("school_data", "*", "");
									$Query3_Other_Kids_Club_Row = $Query3_Other_Kids_Club -> fetch_array();

									if($Query3_Other_Kids_Club->num_rows>0){
										do{
											$Save_Club_As_Kid_Emails[$Query3_Other_Kids_Club_Row["kid_email"]][] = $Query3_Other_Kids_Club_Row["club"];
										} while ($Query3_Other_Kids_Club_Row = $Query3_Other_Kids_Club -> fetch_array());

										foreach ($Save_Club_As_Kid_Emails as $key1 => $value1) {
											foreach ($value1 as $Clubs) {
												foreach ($Save_Club_As_Kid_Emails as $key2 => $value2) {
													if($key1!=$key2){
														if(in_array($Clubs, $Save_Club_As_Kid_Emails[$key2])>0){
															$SaveGraph[$key2][] = $key1;
														}
													}
												}
											}
										}

										require_once ("vc_app/model/class/DFS_Class.php");
										$g = new Graph($SaveGraph);
										$Query3_Input = explode(",",$Parameters);
										$Result = $g->breadthFirstSearch($Query3_Input[0],$Query3_Input[1]);
									}else{
										$Result = "No";
									}
							break;
							//End Query3 Case

						}
						//End Switch
					}
					//End $Parameters If

					require_once("public/home.php");
				}
		###################################################################
  }
?>
