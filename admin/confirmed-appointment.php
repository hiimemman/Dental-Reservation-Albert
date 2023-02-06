<?php include './components/head_css.php'; ?>

<?php include './components/component-top.php'; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Confirmed Appointment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Confirmed Appointment</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- VIEW MODAL -->
    <div class="modal fade" id="view_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">VIEW</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="insert">
                        <div class="mb-3">
                            <label for="view_appointment_id" class="col-form-label">Appointment ID</label>
                            <input type="text" class="form-control" id="view_appointment_id" name="view_appointment_id"
                                required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="view_firstname" name="view_firstname" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="view_lastname" name="view_lastname" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_gender" class="col-form-label">Gender</label>
                            <input type="text" class="form-control" id="view_gender" name="view_gender" required
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_age" class="col-form-label">Age</label>
                            <input type="text" class="form-control" id="view_age" name="view_age" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_contact" class="col-form-label">Contact</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+63</span>
                                <input type="tel" id="view_contact" name="view_contact" class="form-control" required
                                    readonly />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="view_appointment_date" class="col-form-label">Appointment Date</label>
                            <input type="date" class="form-control" id="view_appointment_date"
                                name="view_appointment_date" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_appointment_time" class="col-form-label">Appointment Time</label>
                            <input type="text" class="form-control" id="view_appointment_time"
                                name="view_appointment_time" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view_service" class="col-form-label">Service</label>
                            <input type="text" class="form-control" id="view_service" name="view_service" required
                                readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> <!-- INSERT MODAL END -->



<style>
    #modalcontent {
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
    }
</style>
    <!-- UPDATE MODAL -->
    <div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" >
            <div class="modal-content" id ="modalcontent">
                <style>
                    #update-header-modal{
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        padding: 15px;
                        z-index: 10;
                        background-color: #fff;
                    }
                    #update-body-modal{
                        margin-top: 50px;
                    }
                </style>
                <div class="modal-header" id ="update-header-modal">
                    
                    <span class="close" data-bs-dismiss="modal">&times;</span>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE APPOINTMENT STATUS</h1>
                    
                    <div>
                    
                    <button type="submit" id="update_btn" form="update" class="btn btn-success">Update</button>
                    </div>                   
                </div>
                <div class="modal-body" id ="update-body-modal">
                    <form id="update">
                        <div class="mb-3">
                            <label for="update_appointment_id" class="col-form-label">Appointment ID</label>
                            <input type="text" class="form-control" id="update_appointment_id"
                                name="update_appointment_id" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="update_status" class="col-form-label">Status</label>
                            <select class="form-select" id="update_status" name="update_status"
                                aria-label="Default select example">
                                <option selected>Select Status</option>
                                <option value="COMPLETED">COMPLETED</option>
                                <option value="CANCELLED">CANCELLED</option>
                            </select>
                        </div>
                        
                        <div class="mb-3 d-none cancelled_cont">
                            <label for="update_reason"  class="col-form-label">Reason</label>
                            <select class="form-select" id="update_reason" name="reason"
                                aria-label="Default select example" required>
                                <option disabled selected>Please select</option>
                                <option value="Prefer not to say">Prefer not to say</option>
                                <option value="No Available Dentist">No Available Dentist</option>
                                <option value="The Dentist is in Vacation">The Dentist is in Vacation</option>
                                <option value="Missed Appointment/The Patient Did not show up">Missed Appointment/The Patient Did not show up</option>
                                <option value="Family Emergency">Family Emergency</option>
                                <option value="The patient is late for 20 minutes Before the said appointment">The patient is late for 20 minutes Before the said appointment</option>
                            </select>
                        </div>

                        <div class="mb-3 d-none cancelled_cont">
                            <label for="update_reason" class="col-form-label">Other Reason</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    name="update_reason" style="height: 100px; resize: none;"></textarea>
                                <label for="floatingTextarea2">Other Reason</label>
                            </div>
                        </div>

                        <div class="mb-3 d-none completed_cont">
                            <label for="update_status" class="col-form-label">Dentist</label>
                            <select class="form-select" id="update_dentist" name="update_dentist" aria-label="Default select example">
                                <option value="">Select Dentist</option>
                                <?php
                                $get_dentist = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE role = 'DENTIST'");

                                foreach($get_dentist as $dentist) {
                                    ?>
                                    <option value="Dr. <?= $dentist['firstname'] . ' ' . $dentist['lastname'] ?>">Dr. <?= $dentist['firstname'] . ' ' . $dentist['lastname'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 d-none completed_cont">
                            <label for="update_status" class="col-form-label">Diagnosis</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    id="update_description" name="update_description"
                                    style="height: 100px; resize: none;"></textarea>
                                <label for="floatingTextarea2">Diagnosis</label>
                            </div>
                        </div>
                        <div class="mb-3 d-none completed_cont">
                            <label for="update_status" class="col-form-label">Price</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">&#8369;</span>
                            <input type="text" class="form-control" id="update_price" name="update_price"
                                placeholder="Enter price" required>
                            </div><br>
                            <p><b>        PATIENT CHART</b></p>
                            <div class="container">
                            <p>     Please select a designated number and type the legend.</p>
                        <div class="row">
                            <div class="col-sm">
                            <!-- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Universal_Numbering_System.svg/256px-Universal_Numbering_System.svg.png"> -->
                            </div>
                            
                            
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

//Current selected teethh
let currentSelectedTeeth = '';

const fetchLegendsPageLoad = async () => {

  await window.onload;
  
  let legends = [];

  //fetch all legends from tbl_legends
  try{
        const sendRequest = await fetch('./backend/get-all-legends.php');
        const response = await sendRequest.json();

        if(response.requestStatus === 'success'){
            console.log(response.data)
            legends = response.data;

            let diagnosisContentHTML = '';
            diagnosisContentHTML += `<option disabled selected>Select a diagnosis</option>
            <option value ="none" id = "noneDiagnosis">None</option>`;
            response.data.forEach((legend) =>{
                diagnosisContentHTML += `<option value ="`+legend.name+`" id = "`+legend.id+`">`+legend.name+`</option>`;
            })
            diagnosisContentHTML += '';

            diagnosisList.innerHTML = diagnosisContentHTML;
        }

        if(response.requestStatus === 'error'){
            console.log(response.data)
        }
       
    }catch(e){
        console.error(e);
    }
  

  
   
}

fetchLegendsPageLoad();//

teeth.forEach(tooth => {
    tooth.addEventListener('click', event => {
        // Add code to handle the tooth click event here
        console.log(`Tooth ${tooth.id} clicked!`);
        selectedTeeth =  document.querySelector("#"+tooth.id);
        let img = selectedTeeth.querySelector("img"); 
        
        let getTeethNum = tooth.id.slice(6);//remove tooth- to get only the teeth number

        //change the data that the selected teeth holds
        let tempJson = { 
            id: getTeethNum,
            diagnosis: diagnosisList.value,
        };

        selectedTeeth.dataset.value = JSON.stringify(tempJson)
        let selectedTeethDataset = selectedTeeth.dataset.value;
        //Update diagram when  new diagnosis was selected
        
        let addToDiagnosis = getTeethNum+" - "+selectedTeeth.dataset.value;
        // diagramHidden

        
        currentSelectedTeeth = tooth.id;
         
        //when teeth was hovered
        selectedTeeth.addEventListener("mouseenter", (event) => {
            let tooltipNewContent = '';

            tooltipNewContent   += `<h1>`+tooth.id+`</h1>`;
            tooltipNewContent += `<p>Diagnosis</p> `+JSON.parse(event.target.dataset.value).diagnosis+``;
            tooltip.innerHTML = tooltipNewContent;
            tooltip.style.display = "block";
            tooltip.style.left = `${event.clientX}px`;
            tooltip.style.top = `${event.clientY}px`;
        });
        //when teeth mouse leave
        selectedTeeth.addEventListener("mouseleave", (event) => {
        tooltip.style.display = "none";
        });
        //adjust the modal where cursor is located
        modalContent.style.left = `${event.clientX}px`;
        modalContent.style.top = `${event.clientY}px`;
        modal.style.display = "block";
       
     });
    });

    close.addEventListener('click' , (event) => {
        
        modal.style.display = "none";
    })

//listen when value change
diagnosisList.addEventListener('change', event =>{
    let img = selectedTeeth.querySelector("img");
    if(event.target.value === 'none' ){
        if (img.src.endsWith('-green.png')) {
            let tempJson = { 
            id: getTeethNum,
            diagnosis: "none",
        };

        selectedTeeth.dataset.value = JSON.stringify(tempJson)
            img.src = img.src.replace('-green', '');;
        }
    }else if (!img.src.endsWith('-green.png')) {
            img.src = img.src.substr(0, img.src.length - 4) + "-green.png";
    }
    modal.style.display = "none";
})

</script>
<input type="checkbox" style ="display: none;"  name="services" value="Tite" id="diagram">
                            <!-- <div class="form-check">
                                <input type="checkbox"  name="services[]" value="none" id="diagram">
                                <label>None</label>

                            </div> -->

                            <!-- <div class="form-check">
                            <?php
                            for ($x = 1; $x <= 32; $x++) {
                            ?>

                                <input type="checkbox"  name="services[]" value="<?php echo $x ?>" id="diagram">
                                <label><?php echo $x ?></label> &nbsp;
                                <select name = "ser[]" style="height:30px; width:80px;">
                                    <option disabled selected>Select</option>

                                    <?php $sql2 = mysqli_query($conn, "SELECT * FROM tbl_legend"); 
                                            while($row2 = mysqli_fetch_array($sql2)){

                                            
                                    ?>
                                    <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
                                            <?php } ?>



                                    </select>
                           
                                <br>
                              
                                <?php } ?>

                            </div> -->

                                        
                    
                </div>
            </div>





                        </div>
                      

                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_btn" form="update" class="btn btn-success">Update</button>
                </div> -->
            </div>
        </div>
    </div> <!-- UPDATE MODAL END -->

    <section>
        <div class="row">
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Appointment ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Appointment Schedule</th>
                                <th>Service</th>
                                <th>Action</th>
                                <!-- <th>Profile Image</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
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
    // ADMIN DATATABLES
    var dataTable = $('#tableData').DataTable({
        "serverSide": true,
        "paging": true,
        "pagingType": "simple",
        "scrollX": true,
        "sScrollXInner": "100%",
        "ajax": {
            url: "./tables/confirmed-appointment.php",
            type: "post"
        },
        "order": [
            [3, 'asc']
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
    });

    setInterval(function() {
        dataTable.ajax.reload(null, false);
    }, 1000);

    // GET VIEW
    $(document).on('click', '#get_view', function(e) {
        var appointment_id = $(this).data('id');

        $.ajax({
            url: './functions/confirmed-appointment.php',
            type: 'POST',
            data: 'appointment_id=' + appointment_id,
            success: function(res) {
                var obj = JSON.parse(res);
                $('#view_modal').modal('show');
                $("#view_appointment_id").val(obj.appointment_id);
                $("#view_firstname").val(obj.firstname);
                $("#view_lastname").val(obj.lastname);
                $("#view_gender").val(obj.gender);
                $("#view_age").val(obj.age);
                $("#view_contact").val(obj.contact);
                $("#view_appointment_date").val(obj.appointment_date);
                $("#view_appointment_time").val(obj.appointment_time);
                $("#view_service").val(obj.service);
                // console.log(res);
            }
        })
    })

    // GET UPDATE
    $(document).on('click', '#get_update', function(e) {
        var appointment_id = $(this).data('id');
        $('#update_appointment_id').val(appointment_id);
        $('#update_modal').modal('show');
    })

    // UPDATE STATUS ONCHANGE
    $(document).on('change', '#update_status', function(e) {
        e.preventDefault();
        if ($('#update_status').val() == 'CANCELLED') {
            $('.cancelled_cont').removeClass('d-none');
            $('#update_reason').prop('required', true);
            $('.completed_cont').addClass('d-none');
            $('#update_description').prop('required', false);
            $('#update_price').prop('required', false);
            $('#update_dentist').prop('required', false);
        } else {
            $('.cancelled_cont').addClass('d-none');
            $('#update_reason').prop('required', false);
            $('.completed_cont').removeClass('d-none');
            $('#update_description').prop('required', true);
            $('#update_price').prop('required', true);
            $('#update_dentist').prop('required', true);
            $('#diagram').prop('required', false);
        }
    })

    const teeth = document.querySelectorAll('.tooth');
    
    // SUBMIT UPDATE
    $(document).on('submit', '#update', function(e) {
        e.preventDefault();

        let getDiagrams = [];

        teeth.forEach(tooth => {
            if(tooth.dataset.value !== undefined){
                let dataInTeeth = JSON.parse(tooth.dataset.value);
                let dataValue = dataInTeeth.id+" - "+dataInTeeth.diagnosis;
                getDiagrams.push(dataValue);
            }
        });

        console.log(getDiagrams)
        var form = new FormData(this);
        form.append('update_appointment', true);
        
        form.append("diagram", getDiagrams);
        for (let pair of form.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }
        $.ajax({
            type: "POST",
            url: "./functions/confirmed-appointment.php",
            data: form,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#update_btn').prop('disabled', true);
                $('#update_btn').text('Processing...');
            },
            complete: function() {
                $('#update_btn').prop('disabled', false);
                $('#update_btn').text('Update');
            },
            success: function(response) {
                if (response.includes('success')) {
                    localStorage.setItem('status', 'updated');
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Something went wrong!'
                    });
                }
                console.log(response);
            }
        })
    })
});
</script>
<?php include './components/component-bottom.php'; ?>