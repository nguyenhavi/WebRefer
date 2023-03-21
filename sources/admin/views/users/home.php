<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Người dùng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?controller=admin">Home</a></li>
            <li class="breadcrumb-item active">Người dùng</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Bảng danh sách người dùng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Tài Khoản</th>
                    <th>Passoword</th>
                    <th>Ngày sinh</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Role</th>
                    <th>Banned</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


                  while ($row = $users->fetch_assoc()) {
                    echo "<tr id='r-" . $row['id'] . "'>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_num'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>" . $row['banned'] . "</td>";
                  ?>
                    <td>
                      <a class="btn btn-primary" href="?controller=users&action=edit&id=<?php echo $row['id'] ?>">
                        Sửa
                      </a>

                      <a class="btn btn-danger mt-1 delete" data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-toggle="modal">
                        Xóa
                      </a>
                      <a class="btn <?= isBanned($row["banned"]) ? "btn-warning" : "btn-success" ?> mt-1 banned" 
                          data-id="<?php echo $row["id"]; ?>"
                          data-date="<?php echo isBanned($row["banned"]) ?$row['banned']:NULL?>" 
                          data-bs-toggle="modal" data-bs-target="#ModalBanned" data-toggle="modal">
                        <?php echo  isBanned($row["banned"])? "Đang cấm" : "Cấm" ?>
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
          <h4 class="modal-title">Delete User</h4>
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

<!-- Banned Modal HTML -->

<div class="modal fade" id="ModalBanned" tabindex="-1" aria-labelledby="ModalBannedLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Cấm người dùng</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="ide" name="ide" class="form-control">
          <p>Bạn có chắc là muốn cấm người dùng này</p>
          <p class="text-warning"><small>Hãy cẩn thận với hành động này</small></p>
        </div>
        <div class="modal-footer">
          <div class="col-sm-4">
            <input name="Banndate" id="Banndate" type="date" value="date('d/m/Y')" class="form-control" placeholder="Please choose date & time...">
          </div>
          <button type="button" class="btn btn-primary" id="btn-unbanned">Hủy Cấm</button>
          <button type="button" class="btn btn-danger" id="btn-banned">Cấm</button>
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


    $(".banned").on("click", function() {
      const Banndate = $(this).attr("data-date");
      const ide = $(this).attr("data-id");
      $('#Banndate').val(Banndate);
      $('#ide').val(ide);
    });

    $("#btn-unbanned").on("click", function() {
      $.ajax({
        url: "admin.php?controller=users&action=banned",
        type: "POST",
        cache: false,
        data: {
          id: $("#ide").val(),
          bandate: "0000-00-00"
        },
        success: function(response) {
          response = JSON.parse(response)
          if (response.statusCode === 200) {
            $("#ModalBanned").modal('hide')
            window.location.reload()
          } else {
            alert(response.err)
          }
        }
      });
    });
    $("#btn-banned").on("click", function() {
      $.ajax({
        url: "admin.php?controller=users&action=banned",
        type: "POST",
        cache: false,
        data: {
          id: $("#ide").val(),
          bandate: $("#Banndate").val()
        },
        success: function(response) {
          response = JSON.parse(response)
          if (response.statusCode === 200) {
            $("#ModalBanned").modal('hide')
            window.location.reload()
          } else {
            alert(response.err)
          }
        }
      });
    });

    $(".delete").on("click", function() {
      const idd = $(this).attr("data-id");
      $('#idd').val(idd);
    });

    $("#btn-delete").on("click", function() {
      $.ajax({
        url: "admin.php?controller=users&action=delete",
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