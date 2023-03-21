<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=admin">Home</a></li>
            <li class="breadcrumb-item active">Sản phẩm</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid p-2">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <?php
                if (isset($_GET["by"])) {
                  $by = $_GET["by"];
                  if ($by == "hot") {
                    echo "Sản phẩm hot";
                  } else if ($by == "new") {
                    echo "Sản phẩm mới";
                  } else if ($by == "sale") {
                    echo "Sản phẩm khuyến mãi ";
                  } else {
                    echo "Bảng danh sách sản phẩm";
                  }
                } else {

                  echo "Bảng danh sách sản phẩm";
                }
                ?>

              </h3>
            </div>
            <!-- /.card-header -->
            <a href="admin.php?controller=categories&action=add" class="btn btn-success btn-icon float-left m-2" type="button" style="width: 100px;">
              <i class="zmdi zmdi-plus"></i>
            </a>
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>slug</th>
                    <th>Hành Động</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>slug</th>
                    <th>Hành Động</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  while ($row = $categories->fetch_assoc()) {
                    echo "<tr id='r-" . $row['id'] . "'>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['category_name'] . "</td>";
                    echo "<td>" . $row['slug'] . "</td>";
                  ?>
                    <td>
                      <a class="btn btn-primary" href="?controller=categories&action=edit&id=<?php echo $row['id'] ?>">
                        Sửa
                      </a>

                      <a class="btn btn-danger mt-1 delete" data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-toggle="modal">
                        Xóa
                      </a>
                    </td>
                  <?php
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Delete Modal HTML -->

<!-- Delete Modal HTML -->

<div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Xóa danh mục</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idd" name="id" class="form-control">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script defer>
  $(document).ready(function() {

    $("#dataTable").DataTable({
      "paging": true,
      "searching": true,
      "pageLength": 50,
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');


    $(".delete").on("click", function() {
      const idd = $(this).attr("data-id");
      $('#idd').val(idd);
    });

    $("#btn-delete").on("click", function() {
      $.ajax({
        url: "admin.php?controller=categories&action=delete",
        type: "POST",
        cache: false,
        data: {
          id: $("#idd").val()
        },
        success: function(response) {
          response = JSON.parse(response)
          if (response.statusCode === 200) {
            alert("Delete Success")
            $("#ModalDelete").modal('hide')
            $("#r-" + $("#idd").val()).remove()
          } else {
            alert(response.err)
          }
        }
      });
    });

  });
</script>