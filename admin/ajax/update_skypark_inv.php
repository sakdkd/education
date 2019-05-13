<?php

include('../../db_class/dbconfig.php');
include('../../db_class/message.php');
include('../../db_class/hr_functions.php');

$operateon=date("Y-m-d");
$operateat=date("h:i a");
$operateby=2;

/*available code*/

if(isset($_POST["keyid"]) && isset($_POST["keystatus"]))
{
	$keystatus=trim($_POST["keystatus"]);
	$keyid=trim($_POST["keyid"]);

	/*check code status */

  $statuscheck=getstatusskyparkinventory($conn,$keyid);
  if($statuscheck['invstatus']==2 || $statuscheck['invstatus']==3)
  {
      if($statuscheck['operatedby']!=1)
      {
      $clientname="";
			$sql="UPDATE `non_invskypark_new` SET `invstatus`=".$keystatus." ,`operatedby`='$operateby',`operatedon`='$operateon',`operatedat`='$operateat',`clientname`='',`clientpan`='',`chequeno`='',`chequeamt`='',`chequedate`='',`bankname`='',`holdstatus`=1,`soldstatus`=1 WHERE `id` =".$keyid."";
			$result=$conn->query($sql);
			if(mysqli_affected_rows($conn)>0)
			{	updateSkyParkInvStage($conn,$keyid,1,$operateby,$clientname);
			
			   if($operateby==2){
					$msg1="Inventory ".getSkyParkUnitAddressById($conn,$keyid)."has been made available by SKYPARK ";
				    postdata("9711804055",$msg1);	
				}
				return true;
			} 
			
      }/*end if operaterby*/
      else
      {
        echo '<script>alert("Already Operated By Ani");</script>';
      }


  	}/*end if check*/
	  else
	  {
	    echo '<script>alert("Already Available");</script>';
	  }

	/*end check code status*/

}

/*hold code*/


if(isset($_POST["holdid"]) && isset($_POST["holdstatus"]))
{
  $keystatus=trim($_POST["holdstatus"]);
  $keyid=trim($_POST["holdid"]);

  /*check code status */

  $statuscheck=getstatusskyparkinventory($conn,$keyid);

  if($statuscheck['invstatus']==1)
    {
    ?>
        <div class="modal fade" id="HoldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Hold Inventory</h4>
                  </div>
                  <div class="modal-body">
                    <form name="Uphold" id="Uphold" class="form-inline overlay_2" autocomplete="off">
                       <div class="form-group">
                      <label for="inputPassword6">Client Name: </label>
                       <input type="text" name="clientname" class="form-control mx-sm-3" placeholder="Enter name" required />
                       </div>
                       <input type="hidden" name="Hdkeyid" value="<?= $keyid;?>">
                       <br>
                       <input type="hidden" name="Hdkeystatus" value="<?= $keystatus;?>">
                       <br> 
                    <input type="submit" name="holdsubmit" class="btn btn-primary" value="Save changes" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                    </form> 
                           
                  </div>
            </div>
          </div>
        </div>


    <?php
    }
    else 
    {
      echo '<script>alert("Already Inventory Hold/Sold");location.reload();</script>';
    }



/*end check code status*/

} /*end hold main if*/


/*sold code*/



if(isset($_POST["soldid"]) && isset($_POST["soldstatus"]))
{
      $keystatus=trim($_POST["soldstatus"]);
      $keyid=trim($_POST["soldid"]);
      /*check code status */

  $statuscheck=getstatusskyparkinventory($conn,$keyid);

  if($statuscheck['invstatus']!=3)
    {
          if($statuscheck['invstatus']==1)
             {
            ?>
                <div class="modal fade" id="SoldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Sold Inventory</h4>
                          </div>
                          <div class="modal-body">
                            <form name="Upsold" id="Upsold" autocomplete="off" class="overlay_2">
                               <div class="form-group">
                              <label for="inputPassword6">Client Name: </label>
                               <input type="text" name="clientname" class="form-control mx-sm-3" placeholder="Enter name" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Pan Card: </label>
                               <input type="text" name="clientpan" class="form-control mx-sm-3" placeholder="Enter card details"  />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque No: </label>
                               <input type="text" name="chequeno" class="form-control mx-sm-3" placeholder="Enter Cheque Number" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque Amount: </label>
                               <input type="number" min='51000'  name="chequeamt" value="51000" class="form-control mx-sm-3" placeholder="Enter Amount" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque Date: </label>
                               <input type="text" id="chequedate" placeholder="MM/DD/YYYY" name="chequedate" required>
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Bank Name: </label>
                               <input type="text" name="bankname" class="form-control mx-sm-3" placeholder="Enter card details" required />
                               </div>

                               <input type="hidden" name="Sdkeyid" value="<?= $keyid;?>">
                               <br>
                               <input type="hidden" name="Sdkeystatus" value="<?= $keystatus;?>">
                               <br> 
                            <input type="submit" name="soldsubmit" class="btn btn-primary" value="Save changes" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                            </form> 
                                   
                          </div>
                    </div>
                  </div>
                </div>
            <?php
              } elseif ($statuscheck['invstatus']==2 && $statuscheck['operatedby']!=1) 
                {
                ?>
                  <div class="modal fade" id="SoldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Update Sold Inventory</h4>
                          </div>
                          <div class="modal-body">
                            <form name="Upsold" id="Upsold" autocomplete="off" class="overlay_2">
                               <div class="form-group">
                              <label for="inputPassword6">Client Name: </label>
                               <input type="text" name="clientname" class="form-control mx-sm-3" placeholder="Enter name" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Pan Card: </label>
                               <input type="text" name="clientpan" class="form-control mx-sm-3" placeholder="Enter card details"  />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque No: </label>
                               <input type="text" name="chequeno" class="form-control mx-sm-3" placeholder="Enter Cheque Number" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque Amount: </label>
                               <input type="text" name="chequeamt" min='51000' value="51000" class="form-control mx-sm-3" placeholder="Enter Amount" required />
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Cheque Date: </label>
                               <input type="text" id="chequedate" placeholder="MM/DD/YYYY" name="chequedate" required>
                               </div>

                               <div class="form-group">
                              <label for="inputPassword6">Bank Name: </label>
                               <input type="text" name="bankname" class="form-control mx-sm-3" placeholder="Enter card details" required />
                               </div>

                               <input type="hidden" name="Sdkeyid" value="<?= $keyid;?>">
                               <br>
                               <input type="hidden" name="Sdkeystatus" value="<?= $keystatus;?>">
                               <br> 
                            <input type="submit" name="soldsubmit" class="btn btn-primary" value="Save changes" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                            </form> 
                                   
                          </div>
                    </div>
                  </div>
                </div>

                <?php
                } else 
                  {
                    echo '<script>alert("please Click after page refresh");location.reload();</script>';
                  }
    }
    else 
    {
      echo '<script>alert("please Click after page refresh");location.reload();</script>';
    }

   
    /*End check code status */
}

?>


<!-- javascript -->
<script>
$(document).ready(function(){

	$("#chequedate").datepicker({
        dateFormat:'yy-mm-dd'
      });

  $("#Uphold").on("submit", function(e){
    $('.overlay_2').css('background-color' ,'#FFFFFF');
              $('.overlay_2').css('opacity', '0.5');
              $('.overlay_2').css('filter' ,'alpha(opacity = 60)');
              $('.overlay_2').css('width','100%');
              $('.overlay_2').css('z-index','1');
       e.preventDefault();
       $.ajax({
          url:'ajax/clientinfo.php',
          data: new FormData(this),
          type: "POST",
          contentType: false,
          processData: false,
          success:function(data){
            $(".overlay_2").removeAttr("style");
          	$('#errormsg').html(data);
              location.reload(true);
          }

       });
  });
  /*end hold*/
  $("#Upsold").on("submit", function(e){
       e.preventDefault();
       $('.overlay_2').css('background-color' ,'#FFFFFF');
              $('.overlay_2').css('opacity', '0.5');
              $('.overlay_2').css('filter' ,'alpha(opacity = 60)');
              $('.overlay_2').css('width','100%');
              $('.overlay_2').css('z-index','1');
       $.ajax({
          url:'ajax/clientinfoall.php',
          data: new FormData(this),
          type: "POST",
          contentType: false,
          processData: false,
          success:function(data){
            $(".overlay_2").removeAttr("style");
          	$('#errormsg').html(data);
              location.reload(true);
          }

       });
  });
  /*end sold*/
});
</script>

<!-- end javascript -->