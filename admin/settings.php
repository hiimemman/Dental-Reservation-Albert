<?php 
include './components/head_css.php'; 
include './components/component-top.php';





if(isset($_POST['updatelogo'])){


    $name = $_FILES['img']['name'];
$fileExt = explode('.', $name);
$fileActualExt = strtolower(end($fileExt));
$target_dir = "assets/img/";
$target_file = $target_dir . $name;
$extensions_arr = array("jpeg","jpg","png");
if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "UPDATE tbl_img SET img = '$target_file' WHERE id='1' ";
            $results = mysqli_query($conn, $sqladd);
            if($results){

                echo '<script>
                window.history.back(1);
                 </script>';
            }
            else{

                echo '<script>
                window.history.back(1);
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.history.back(1);
             </script>';
        }
    }


}





if(isset($_POST['updateabout'])){

    $id = $_POST['id'];
    $name = $_FILES['img']['name'];
    $fileExt = explode('.', $name);
    $fileActualExt = strtolower(end($fileExt));
    $target_dir = "../assets/img/";
    $target_file = $target_dir . $name;
    $extensions_arr = array("jpeg","jpg","png");
    
    if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "UPDATE tbl_img SET img = '$target_file' WHERE id='$id' ";
            $results = mysqli_query($conn, $sqladd);
            if($results){

                echo '<script>
                window.history.back(1);
                 </script>';
            }
            else{

                echo '<script>
                window.history.back(1);
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.history.back(1);
             </script>';
        }
    }


}


if(isset($_POST['updatetooth'])){
    $title = $_POST['title'];
    $age = $_POST['age'];
    $id = $_POST['id'];
    $name = $_FILES['img']['name'];
$fileExt = explode('.', $name);
$fileActualExt = strtolower(end($fileExt));
$target_dir = "../assets/img/";
$target_file = $target_dir . $name;
$extensions_arr = array("jpeg","jpg","png");
if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "UPDATE tbl_tooth SET `image` = '$target_file', `title` = '$title', age = '$age' WHERE id='$id' ";
            $results = mysqli_query($conn, $sqladd);
            if($results){
                echo '<script>
                window.location=document.referrer;
                 </script>';
            }
            else{

                echo '<script>
                window.location=document.referrer;
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.location=document.referrer;
             </script>';
        }
    }
    else{
        $sqladd = "UPDATE tbl_tooth SET `title` = '$title', age = '$age' WHERE id='$id' ";
        $results = mysqli_query($conn, $sqladd);
        if($results){

            echo '<script>
            window.location=document.referrer;
             </script>';
        }
        else{

            echo '<script>
            window.location=document.referrer;
             </script>';
        }
    }


}

if(isset($_POST['updatepro'])){

    $id = $_POST['id'];
$name = $_FILES['img']['name'];
$fileExt = explode('.', $name);
$fileActualExt = strtolower(end($fileExt));
$target_dir = "../assets/img/";
$target_file = $target_dir . $name;
$extensions_arr = array("jpeg","jpg","png");
if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "UPDATE tbl_img SET img = '$target_file' WHERE id='$id' ";
            $results = mysqli_query($conn, $sqladd);
            if($results){

                echo '<script>
        window.location=document.referrer;
         </script>';
            }
            else{

                echo '<script>
                window.location=document.referrer;
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.location=document.referrer;
             </script>';
        }
    }


}

if(isset($_POST['textup'])){
    $id = $_POST['id'];
    $text =  $conn -> real_escape_string($_POST['text']);
    $sqladd = mysqli_query($conn, "UPDATE tbl_text SET texts = '$text' WHERE id='$id'");
    if($sqladd){
    echo '<script>
    window.location=document.referrer;
     </script>';
    }
    else{
        echo '<script>
        window.location=document.referrer;
         </script>';
    }
}



if(isset($_POST['addabout'])){

    $name = $_FILES['img']['name'];
$fileExt = explode('.', $name);
$fileActualExt = strtolower(end($fileExt));
$target_dir = "../assets/img/";
$target_file = $target_dir . $name;
$extensions_arr = array("jpeg","jpg","png");
if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "INSERT INTO tbl_img (title, img) VALUE ('about','$target_file')";
            $results = mysqli_query($conn, $sqladd);
            if($results){

                echo '<script>
                window.history.back(1);
                 </script>';
            }
            else{

                echo '<script>
                window.history.back(1);
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.history.back(1);
             </script>';
        }
    }


}


if(isset($_POST['addtooth'])){

    $title = $_POST['title'];
    $age = $_POST['age'];

    $name = $_FILES['img']['name'];
$fileExt = explode('.', $name);
$fileActualExt = strtolower(end($fileExt));
$target_dir = "../assets/img/";
$target_file = $target_dir . $name;
$extensions_arr = array("jpeg","jpg","png");
if(in_array($fileActualExt,$extensions_arr) ){
    
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
        
            $sqladd = "INSERT INTO tbl_tooth (title ,age, `image`) VALUE ('$title','$age','$target_file')";
            $results = mysqli_query($conn, $sqladd);
            if($results){

                echo '<script>
                window.history.back(1);
                 </script>';
            }
            else{

                echo '<script>
                window.history.back(1);
                 </script>';
            }
        
        }
        else{
            echo '<script>
            window.history.back(1);
             </script>';
        }
    }


}


if(isset($_POST['deleteabout'])){
    $id = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM tbl_img WHERE id = '$id'");
    echo '<script>
            window.history.back(1);
             </script>';
}
if(isset($_POST['deletetooth'])){
    $id = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM tbl_img WHERE id = '$id'");
    echo '<script>
            window.history.back(1);
             </script>';
}


if(isset($_POST['addser'])){
    $serv = $_POST['serv'];
    $sql = mysqli_query($conn, "INSERT INTO tbl_services (`service`) VALUE ('$serv')");
    echo '<script>
        window.location=document.referrer;
         </script>';
}


if(isset($_POST['deleteser'])){
    $id = $_POST['id'];
    $sql = mysqli_query($conn, "DELETE FROM tbl_services WHERE id = '$id'");
    echo '<script>
        window.location=document.referrer;
         </script>';

}
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Settings</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <?php
            $sql = mysqli_query($conn, "SELECT * FROM tbl_img WHERE id=1");
            $row = mysqli_fetch_array($sql);
            $front = $row['img'];
    ?>


    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Logo
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
     
    <div>
    <div class="mb-4 d-flex justify-content-center">

        <?php if ($front == false){?>
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="example placeholder" style="width: 300px;">

            <?php }else {?>
        <img src="<?php echo $row['img'] ?>" alt="example placeholder" style="width: 300px;">
        <?php } ?> 

    </div>

    <form method ="POST"  enctype="multipart/form-data" >    
    <div class="d-flex justify-content-center">
    <div class="form-group">
    <input type="file" name="img" class="form-control"  required><br>
    <center><button type="submit" name="updatelogo" class="btn btn-primary">Update</button></center>
</form>


  </div>
    </div>
</div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         About Us
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>File</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php $sql2 = mysqli_query($conn,"SELECT * FROM tbl_img WHERE title = 'about'");
                                   while( $row1 = mysqli_fetch_array($sql2)){
                            ?>
                               <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><img src="<?php echo $row1['img']?>" height="100" width="100"></td>
                                <td style="width:500px;"><input type="file" name="img" class="form-control"  ></td>
                                <td><button type="submit" name="updateabout" class="btn btn-primary">Update</button>&nbsp;
                                <button type="submit" name="deleteabout" class="btn btn-danger">Delete</button>
                                <input type="hidden" value="<?php echo $row1 ['id']; ?>" name="id"></td>
                                 </form>
                            
                            </tr>
                            <?php } ?>
                            <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><img src="https://cdn.pixabay.com/photo/2017/11/10/05/24/add-2935429_960_720.png" height="100" width="100"></td>
                                <td style="width:500px;"><input type="file" name="img" class="form-control"  ></td>
                                <td><button type="submit" name="addabout" class="btn btn-primary">Add Image</button>
                            
                                 </form>
                            
                            </tr>

                            
                         </tbody>
                    </table>
                </div>




      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Services
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php 
                            $sqltext = mysqli_query($conn, "SELECT * FROM tbl_text");
                            while($text = mysqli_fetch_array($sqltext)){
                            ?>
                               <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><?php echo $text ['title']; ?></td>
                                <td><textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"><?php echo $text ['texts']; ?></textarea></td>
                                <td><button type="submit" name="textup" class="btn btn-primary">Update</button>
                                <input type="hidden" value="<?php echo $text ['id']; ?>" name="id"></td>
                                 </form>
                            <?php }?>
                            </tr>
                           
                         </tbody>
                    </table>
      </div>
    </div>
  </div>
  
<div class="accordion-item">
    <h2 class="accordion-header" id="headingfour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
        Add Services
      </button>
    </h2>
    <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Services</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php 
                            $sqltext = mysqli_query($conn, "SELECT * FROM tbl_services");
                            while($text = mysqli_fetch_array($sqltext)){
                            ?>
                               <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><?php echo $text ['service']; ?></td>
                                <td><button type="submit" name="deleteser" class="btn btn-danger">Delete</button></td>
                                <input type="hidden" value="<?php echo $text ['id']; ?>" name="id"></td>
                                 </form>
                            <?php }?>
                            </tr>

                               <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><input type="text" name="serv" class="form-control" style="width:300px;" placeholder="Add Services"></td>
                                <td><button type="submit" name="addser" class="btn btn-primary">Add Service</button></td>
                                </form>
                            </tr>     

                           
                         </tbody>
                    </table>       
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
        Tooth Diagram
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr  style="text-align:center;">
                                <th>Image</th>
                                 <th>Title</th>
                                 <th>Age</th>
                                <th>File</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                    
                            <?php $sql2 = mysqli_query($conn,"SELECT * FROM tbl_tooth");
                                   while( $row1 = mysqli_fetch_array($sql2)){
                            ?>
                               <tr style="text-align:center;">
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><img src="<?php echo $row1['image']?>" height="100" width="100"></td>
                                <td><input class="texts" type="text" value="<?php echo $row1['title']; ?>"  name="title"></td>
                                <td><input class="texts" type="text" value="<?php echo $row1['age']; ?>"  name="age"></td>

                                <td style="width:500px;"><input type="file" name="img" class="form-control"  ></td>
                                <td><button type="submit" name="updatetooth" class="btn btn-primary">Update</button>&nbsp;
                                <button type="submit" name="deletetooth" class="btn btn-danger">Delete</button>
                                <input type="hidden" value="<?php echo $row1 ['id']; ?>" name="id"></td>
                                 </form>
                            
                            </tr>
                            <?php } ?>
                            <tr>
                               <form method ="POST"  enctype="multipart/form-data" >    
                                <td><img src="https://cdn.pixabay.com/photo/2017/11/10/05/24/add-2935429_960_720.png" height="100" width="100"></td>
                                <td><input type="text" name="title" class="form-control"  required></td>
                                <td><input type="text" name="age" class="form-control"  required></td>
                                <td style="width:500px;"><input type="file" name="img" class="form-control"  ></td>
                                <td><button type="submit" name="addtooth" class="btn btn-primary">Add Image</button>
                            
                                 </form>
                            
                            </tr>

                            
                         </tbody>
                    </table>
      </div>
    </div>
  </div>




</div>
</div>
</div>



</main><!-- End #main -->

<style>
  
.text {

 
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid black;
}


.texts {

 text-align:center;
margin: 8px 0;
box-sizing: border-box;
border: none;
border-bottom: none;
}

    </style>

<?php include './components/component-bottom.php'; ?>