<?php include './components/head_css.php'; 
include './components/component-top.php'; 

if(!isset($_GET['id'])) {
    ?>
    <script>
        location.href = 'records.php';
    </script>
    <?php
} else {
    $appointment_id = $_GET['id'];
    $check_if_valid = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");

    if(mysqli_num_rows($check_if_valid) < 1) {
        ?>
        <script>
            location.href = 'records.php';
        </script>
        <?php
    }
}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>View Records</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">View Records</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section>
        <div class="row">
            <div class="card p-3">
                <?php
                $get_record = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");

                foreach($get_record as $row) {
                    $age = $row['age'];
                    
                ?>
                <form>
                    <div class="mb-3 col-sm-5 col-md-3 col-lg-2">
                        <label for="view_appointment_id" class="col-form-label">Appointment ID</label>
                        <input type="text" class="form-control" id="view_appointment_id" name="view_appointment_id" value="<?= $row['appointment_id'] ?>"
                            required readonly>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="view_firstname" name="view_firstname" value="<?= $row['firstname'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" value="<?= $row['lastname'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="view_gender" class="col-form-label">Gender</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['gender'] ?>" required
                                readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="view_age" class="col-form-label">Age</label>
                            <input type="text" class="form-control" id="view_age" name="view_age" value="<?= $row['age'] ?>" required readonly>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_firstname" class="col-form-label">Contact</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+63</span>
                                <input type="tel" id="view_contact" name="view_contact" class="form-control" value="<?= $row['contact'] ?>" required
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="view_lastname" class="col-form-label">Appointment Date & Time</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" value="<?= date('F d, Y', strtotime($row['appointment_date'])) . ' - ' . date('h:i A', strtotime($row['appointment_time'])) ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Dentist</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['dentist'] ?>" required
                                readonly>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-6">
                            <label for="view_gender" class="col-form-label">Service</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="view_reason"
                                    name="view_reason" style="height: 100px; resize: none;"><?= $row['service'] ?></textarea>
                                <label for="floatingTextarea2">Service</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="view_gender" class="col-form-label">Diagnosis</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="view_reason"
                                    name="view_reason" style="height: 100px; resize: none;"><?= $row['description'] ?></textarea>
                                <label for="floatingTextarea2">Diagnosis</label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group mb-3">
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Date & Time Completed</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= date('F d, Y', strtotime($row['date_completed'])) . ' - ' . date('h:i A', strtotime($row['time_completed'])) ?>" required
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="view_gender" class="col-form-label">Payment</label>
                             <div class="input-group input-group-merge">
                                <span class="input-group-text">&#8369;</span>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" value="<?= $row['payment'] ?>" required
                                readonly>
                                </div>
                        </div>
                    </div>
                    <br>
            <h3>PATIENT'S CHART</h3>
            <br></br>


<?php
          //  $sqlrecent  = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");
?>


                    <b>Teeth:</b> <?php echo  $row['diagram'];
                 
                    
                    
                    ?>

<br></br>


                                    <div class="container">
                <div class="row">
                
                <style>
        #teeth-diagram {
            margin: 0;
          display: flex;
          background: url('../teeths/TOOTH-DIAGRAM.png') no-repeat;
          height: 750px;
        }
        #upper-part {
        display: flex;
        position: relative;
        }
        #bottom-part {
        display: flex;
        position: relative;
        }
        /* .tooth {
        width: 50px;
        height: 50px;
        border: 1px solid black;
        } */
        .tooth {
        width: 5px;
        height: 5px;
        background-color: transparent;
        border: none;
        box-shadow: none;
        text-shadow: none;
        cursor: pointer;
        position:absolute;
        }

        #teeth-content{
        display: flex;
        position: relative;
        height: 1000px;
        }

        .flip-teeth-horizontal {
        transform: scaleX(-1);
        }
        .flip-teeth-vertical {
        transform: scaleY(-1);
        }
        .flip-teeth-both{
          transform: rotate(180deg);
        }

      /* Modal diagnosis */
        #selectDiagnosisModal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        }

        #selectDiagnosisModal-content {
        width: fit-content;
        position: absolute;
        background-color: white;
        padding: 20px;
        border: 1px solid black;
        }

        #teeth-tooltip {
        display: none;
        position: fixed;
        width:250px;
        background-color: rgb(64 64 64);
        color: rgb(103 232 249);
        padding: 10px;
        border: 1px solid black;
        z-index: 1;
        }
    </style>

<div id ="teeth-container">
    <div id="teeth-diagram">
        <div id ="teeth-content">
        <div id="upper-part">
            <div class="tooth"  id="tooth-1" style ="top: 24%;left: 25px;" >
                <img src="../teeths/teeth1.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-2" style ="top: 19.2%;left: 34px;">
            <img src="../teeths/teeth2.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-3" style ="top: 14.6%;left: 42px;">
            <img src="../teeths/teeth3.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-4" style ="top: 11.2%;left: 58px;">
            <img src="../teeths/teeth4.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-5" style ="top: 8.5%;left: 77px;">
            <img src="../teeths/teeth5.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-6" style ="top: 7.0%;left: 103px;">
            <img src="../teeths/teeth6.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-7" style ="top: 5.50%;left: 126px;">
            <img src="../teeths/teeth7.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-8" style ="top: 4.94%;left: 153px;">
            <img src="../teeths/teeth8.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-9" style ="top: 5.10%;left: 213px;">
            <img src="../teeths/teeth8.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-10" style ="top: 5.67%;left: 238px;">
            <img src="../teeths/teeth7.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-11" style ="top: 7.00%;left: 257px;">
            <img src="../teeths/teeth6.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-12" style ="top: 8.50%; left: 280px;">
            <img src="../teeths/teeth5.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-13" style ="top: 11.30%; left: 298px;">
            <img src="../teeths/teeth4.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-14" style ="top: 14.74%; left: 315px;">
            <img src="../teeths/teeth3.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-15" style ="top: 19.42%; left: 325px;">
            <img src="../teeths/teeth2.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-16" style ="top: 24.20%; left: 331px;">
            <img src="../teeths/teeth1.png" alt="lag HAHA">
            </div>
        </div>

        <div id ="bottom-part">
            <div class="tooth flip-teeth-vertical" id="tooth-17" style ="top: 44.20%; left: 26px;">
            <img src="../teeths/teeth1.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-vertical" id="tooth-18" style ="top: 49.00%; left: 34px;">
            <img src="../teeths/teeth2.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-vertical" id="tooth-19"  style ="top: 53.70%; left: 43px;">
            <img src="../teeths/teeth3.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-vertical" id="tooth-20" style ="top: 57.10%; left: 58px;">
            <img src="../teeths/teeth4.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-vertical" id="tooth-21" style ="top: 59.85%; left: 78px;">
            <img src="../teeths/teeth5.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-22" style ="top: 57.77%; left: 104px;">
            <img src="../teeths/teeth6-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-23" style ="top: 58.68%; left: 126px;">
            <img src="../teeths/teeth7-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth"  id="tooth-24" style ="top: 58.81%; left: 152px;"
            >
            <img src="../teeths/teeth8-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-25" style ="top: 58.83%; left: 203px;"
            >
            <img src="../teeths/teeth8-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-26" style ="top: 58.77%; left: 230px;">
            <img src="../teeths/teeth7-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-horizontal" id="tooth-27" style ="top: 57.82%; left: 253px;">
            <img src="../teeths/teeth6-lower.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-both" id="tooth-28" style ="top: 59.92%; left: 280px;">
            <img src="../teeths/teeth5.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-both" id="tooth-29" style ="top: 57.10%; left: 300px;">
            <img src="../teeths/teeth4.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-both" id="tooth-30" style ="top: 53.70%; left: 315px;">
            <img src="../teeths/teeth3.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-both" id="tooth-31" style ="top:  49.00%; left: 325px;">
            <img src="../teeths/teeth2.png" alt="lag HAHA">
            </div>
            <div class="tooth flip-teeth-both" id="tooth-32" style ="top:  44.20%; left: 331px;">
            <img src="../teeths/teeth1.png" alt="lag HAHA">
            </div>
        </div>

    <!-- Add more teeth as needed -->
    </div>
    </div>
</div>



<div id="selectDiagnosisModal">
  <div class="modal-content" id ="selectDiagnosisModal-content">
    <span class="close" id ="selectDiagnosisModalClose">&times;</span>
    <p>Please choose a diagnosis</p>
    <select id ="diagnosisList"></select>
  </div>

</div>
<div id="teeth-tooltip"></div>

<input type ="hidden" id ="diagram" />



<script defer>

//Ung ngipin
const teeth = document.querySelectorAll('.tooth');

//Ung modal kapag cinlick ung ngipin
const modal = document.querySelector("#selectDiagnosisModal");

//Ung content ng modal
const modalContent = document.querySelector("#selectDiagnosisModal-content");

//Close button of diagnosis modal
const close = document.querySelector("#selectDiagnosisModalClose");

//Div for diagnosis list
const diagnosisList = document.querySelector("#diagnosisList");

//Tooltip of tooth
const tooltip = document.querySelector("#teeth-tooltip");

//Store diagnosis in input 
const diagramHidden = document.querySelector("#diagram");

//appointment id
const appointmentID = document.querySelector("#view_appointment_id");

//Current selected teethh
let currentSelectedTeeth = '';


let checkedTooth = [];
let description = [];

const fetchLegendsPageLoad = async () => {

  await window.onload;
  
 let legends = [];

 
  //fetch all appointment data from tbl_appointment
  try{
    const data = new FormData();
      data.append("id", appointmentID.value);
      console.log(appointmentID.value)
        const sendRequest = await fetch("./backend/get-all-appointment-specific-id.php",{
        method: "POST",
        body: data,
         });
        const response = await sendRequest.json();

        //requestStatus, data
        if(response.requestStatus === 'success'){

            //get all the checked  teeth
           checkedTooth = (response.data[0].diagram).split(',');
      
            teeth.forEach(tooth => { 
                //make all of checked tooth green
                checkedTooth.map((toothCheck) =>{
                    if(tooth.id == toothCheck.split(' ')[0]){
                        let selectedTeeth =  document.querySelector("#"+tooth.id);
                        let img = selectedTeeth.querySelector("img"); 
                        img.src = img.src.substr(0, img.src.length - 4) + "-green.png";
                    }
                })
            })
        }
             if(response.requestStatus === 'error'){
            console.log(response.data)
        }
       
    }catch(e){
        console.log(e);
    }
  
  
}
fetchLegendsPageLoad();//

teeth.forEach(tooth => {
    tooth.addEventListener('mouseenter', (event) => {
        let selectedTooth = document.querySelector("#"+tooth.id);
          checkedTooth.map((toothCheckedID) =>{
            if(tooth.id == toothCheckedID.split(' ')[0]){
            let tooltipNewContent = '';
            tooltipNewContent   += `<h1>`+tooth.id+`</h1>`;
            tooltipNewContent += `<p>Diagnosis</p> `+toothCheckedID.split(' ').slice(2).join(' ')+``;
            tooltip.innerHTML = tooltipNewContent;
            tooltip.style.display = "block";
            tooltip.style.left = `${event.clientX}px`;
            tooltip.style.top = `${event.clientY}px`;
            }
         })
    })
    //when teeth was hovered
   
        //when teeth mouse leave
        tooth.addEventListener("mouseleave", (event) => {
        tooltip.style.display = "none";
 });
})        


 
</script>

    </div>
  </div>
</div>



                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
$(window).on('load', function(e) {
    if (localStorage.getItem('status') == 'updated') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Status updated successfully!',
            confirmButtonColor: '#6eada7',
        })
        localStorage.removeItem('status');
    } else if (localStorage.getItem('status') == 'insert') {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Account added successfully',
            confirmButtonColor: '#6eada7',
        })
        localStorage.removeItem('status');
    }
})
$(document).ready(function() {

})
</script>
