<html>
	<head>
		<meta name="viewport" content="width=device-width, maximum-scale=1">
    <link href="http://localhost/bayati/public/style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="http://localhost/bayati/public/js/jquery-3.2.1.min.js"></script>
	</head>
  <body>
    <div style="padding:10px; background-color:#999; width:100%">
    	<a class="logout" href="http://localhost/bayati/home_page/logout"> Logout </a>
    </div>
		<br />

		<center>

				<table class="table">
					<tr>
				    	<td colspan="2"><strong>Query 1 :</strong></td>
				    </tr>
				    <tr>
				        <td nowrap="nowrap">Kid Email:</td>
				        <td><input  class="input kid_email" type="text" name="kid_email" value="<?=$Query1_Input;?>"></td>
				    </tr>
				    <tr>
				    	<td colspan="2">
				        <input id="Query 1" class="do_action" type="submit" value="Submit">
				        </td>
				    </tr>
				</table>

				<br />

				<? if($Type=="Query 1"){
				  if($Query1->num_rows>0){ ?>
					  <table class="list_table">
					    <tr>
					    	<th>School Name: <?=$Query1_Row["school"];?> </th>
					    </tr>
							<tr>
					    	<td><strong>Clubs</strong></td>
					    </tr>
						<? do{ ?>
					    <tr>
					      <td><?=$Query1_Row["club"];?></td>
					    </tr>
					<? } while ($Query1_Row = $Query1 -> fetch_array());?>
					  </table>
					<? }else{?>
						Not Found !
					<? }?>
					<br />
				<?} ?>







				<table class="table">
					<tr>
				    	<td colspan="2"><strong>Query 2 :</strong></td>
				    </tr>
				    <tr>
				        <td>Club:</td>
				        <td><input class="input club" type="text" name="club" value="<?=$Query2_Input;?>"></td>
				    </tr>
				    <tr>
				    	<td colspan="2">
				        <input id="Query 2" class="do_action" type="submit" value="Submit">
				        </td>
				    </tr>
				</table>

				<br />

				<? if($Type=="Query 2"){
					 if($Query2->num_rows>0){ ?>
		        <table class="list_table">
		          <tr>
		            <th>Schools</th>
		            <th>Kids</th>
		          </tr>
		        <? do{ ?>
		          <tr>
		            <td><?=$Query2_Row["school"];?></td>
		            <td><?=$Query2_Row["kid"];?></td>
		          </tr>
						<? } while ($Query2_Row = $Query2 -> fetch_array()); ?>
		        </table>
	        <? }else{?>
						Not Found !
					<? }?>
					<br />
				<?} ?>






				<table class="table">
					<tr>
				    	<td colspan="2"><strong>Query 3 :</strong></td>
				    </tr>
				    <tr>
				        <td>Kid 1</td>
				        <td><input class="input kid1" type="text" name="kid1" value="<?=$Query3_Input[0];?>"></td>
				    </tr>
				    <tr>
				        <td>Kid 2</td>
				        <td><input class="input kid2" type="text" name="kid2" value="<?=$Query3_Input[1];?>"></td>
				    </tr>
				    <tr>
				    	<td>
				        <input id="Query 3" class="do_action" type="submit" value="Submit">
			        </td>
							<td>
								<?=$Result;?>
							</td>
				    </tr>
				</table>

				<br />

				<? if($HistoryQuery->num_rows>0){ ?>
					<table class="list_table">
						<tr>
							<th>History</th>
							<th>Type</th>
						</tr>
						<? do{ ?>
						<tr>
							<td><a href="#" id="history" type="<?=$HistoryQuery_Row["type"];?>" class="do_action"><?=$HistoryQuery_Row["input"];?></a></td>
							<td><?=$HistoryQuery_Row["type"];?></td>
						</tr>
					<? } while ($HistoryQuery_Row = $HistoryQuery -> fetch_array()); ?>
					</table>
				<? }?>

			</center>

			<script type="text/javascript">
				jQuery(".do_action").click(function(e) {
					var KidsData = "";
					var QueryType = jQuery(this).attr("id");
					switch (QueryType) {
						case "Query 1":
							KidsData = jQuery(".kid_email").val();
							break;
						case "Query 2":
							KidsData = jQuery(".club").val();
							break;
						case "Query 3":
							KidsData = jQuery(".kid1").val()+","+jQuery(".kid2").val();
							break;
						case "history":
							QueryType = jQuery(this).attr("type");
							KidsData = jQuery(this).text();
							break;
					}
					if(KidsData=="/"){
						alert("Please insert kid 1 and kid 2")
					}
					window.location.replace("http://localhost/bayati/home_page/home/" + QueryType + "/" + KidsData);
				});
			</script>

  </body>
</html>
