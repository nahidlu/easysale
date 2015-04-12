<h2 class="blog-post-title">Shop Owner Details</h2>
<br />
<table class="table table-striped table-bordered">
             
             <tbody>
                 <tr>
                     	<td width="10%">Owner Name:</td>
                		<td width="70%"><?= $model->name;?></td>
                        <td align="center">Address</td>
                    	     
				</tr>
                <tr>
                		<td> Contact No:</td>
                		<td><?= $model->phone;?></td>
                        <td rowspan="2"><?= $model->address;?></td>
                </tr>
                 <tr>
               			<td>Status</td>
               			<td><?php if($model->status == 1)
						{
							echo "Active";
							}
							else
							{
								echo"Inactive";
								} ?></td>
                        
                </tr>
                
             </tbody>
             </table>
<br />
<table class="table table-striped table-bordered">
    <thead>
        <th>Logo</th>
        <th>Shop ID</th>
        <th>Name </th>
        <th>Address</th>
        <th>Contact No</th>
        <th>Slogan</th>
        <th>Status</th>
    </thead>
    <tbody>
    	<?php foreach($shopmodel as $smodel)
		{
			$logo = $smodel->Logo;
			//$finfo = new finfo(FILEINFO_MIME);
			//$logo = $finfo->buffer($logo);
			
			$slogan = $smodel->Address1." ".$smodel->Address2;
			?>
        <tr>
        	<td><?= "<img src='$logo'>";?></td>
            <td><?= $smodel->shopid; ?></td>
            <td><?= $smodel->ShopName?></td>
            <td><?= $slogan?></td>
            <td><?= $smodel->ContactNo;?></td>
            <td><?= $smodel->Slogan;?></td>
            <td><?php if($smodel->status == 1)
			{
				echo"Active";	
			}
			else
			{
				echo"Inactive";
			}
			?></td>
        </tr>
        <?php
		}
		?>
    </tbody>

</table>