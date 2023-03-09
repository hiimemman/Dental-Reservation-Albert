<?php 
include './components/head_css.php'; 
include './components/component-top.php';
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Inquiries/Feedback</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Inquiries/Feedback</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


   

    <section>
        <div class="row">
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-striped" id="tableData" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                
                                <!-- <th>Profile Image</th> -->
                            </tr>
                        </thead>
                        <tbody>

                    <?php
                        $sql = mysqli_query($conn, "SELECT * FROM tbl_inq");
                        while($row = mysqli_fetch_array($sql)){
                    ?>

                            <tr>
                                <td><?php echo $row ['name'] ?></td>
                                <td><?php echo $row ['email'] ?></td>
                                <td>Subject: <?php echo $row ['subject'] ?><br>
                                    Message: <?php echo $row ['message'] ?>
                            </td>
                            </tr>
                    
                            <?php } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


<?php include './components/component-bottom.php'; ?>