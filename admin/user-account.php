<?php include './components/head_css.php'; ?>

<?php include './components/component-top.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>User Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">User Account</li>
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
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Email</th>
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
    $(document).ready( function () {
        var dataTable = $('#tableData').DataTable({
            "serverSide": true,
            "paging": true,
            "pagingType": "simple",
            "scrollX": true,
            "sScrollXInner": "100%",
            "ajax": {
                url: "./tables/user-account.php",
                type: "post"
            },
            "order": [[ 1, 'asc' ]],
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        });

        setInterval(function() {
            dataTable.ajax.reload(null, false);
        }, 10000);
    } );
</script>
<?php include './components/component-bottom.php'; ?>