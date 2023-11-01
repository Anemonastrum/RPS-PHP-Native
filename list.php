<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['status'] !== "login") {
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>RPS | List</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="icon" type="image/x-icon" href="assets/icons/logo.png" />
    <link rel="stylesheet" href="assets/style/style.css" />
</head>

<body class="bg-transparent">

    <!-- HEADER -->
    <header id="header" class="page-header sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <button id="toggle-btn" class="btn btn-light">
                    <img src="../assets/icons/list.svg" alt="Menu" style="width: 25px;">
                </button>
                <div class="logo">
                    <img src="../assets/icons/logo.png" alt="Header Logo" class="logo-img">
                    <h1 class="logo-text">UNIVERSITAS AMIKOM YOGYAKARTA</h1>
                </div>
                <!-- NOTIFICATION DROPDOWN-->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fa fa-bell"></span>
                        <span class="badge bg-danger">2</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                        <li class="dropdown-header">Notifications</li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="fas fa-exclamation-triangle fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <div class="fw-bold">Warning</div>
                                    <small class="text-muted">Complete your Profile Information.</small>
                                    <div class="text-muted">1 hour ago</div>
                                </div>
                            </div>
                        </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="me-3">
                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Action Completed</div>
                                        <small class="text-muted">Your RPS has been successfully submited.</small>
                                        <div class="text-muted">Yesterday</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item text-center" href="#">View All Notifications</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- SIDEBAR -->
    <div class="d-flex">
        <div id="sidebar" class="bg-light sticky-top">
            <div class="p-3 profile">
                <a class="mb-3 w-75" data-bs-toggle="modal" data-bs-target="#profileModal" href="#profileModal">
                    <img src="../assets/icons/avatar.jpg" class="img-fluid" alt="Profile Picture" style="border-radius: 100px; border: 0.5px solid #d9d9d9;">
                </a>
                <?php
                $username = $_SESSION['username'];
                $nim = $_SESSION['nim'];
                echo "<h5 class='mb-1'>$username</h5>";
                echo "<p class='text-muted mb-1'>$nim</p>";
                ?>
                <a href="profile.php">
                    <ul class='list-group'>
                        <li class='list-group-item'>
                            <i class='fas fa-user fa-fw me-2'></i>View Profile
                        </li>
                    </ul>
                </a>
            </div>
            <ul class="flex-column d-block list-group w-100 align-items-center justify-content-center">
                <a href="dashboard.php" class="list-group-item list-group-item-action sidebar-item"><i class="fas fa-home fa-fw me-4"></i>Dashboard</a>
                <a href="create.php" class="list-group-item list-group-item-action sidebar-item"><i class="fas fa-plus fa-fw me-4"></i>Create</a>
                <a href="list.php" class="list-group-item list-group-item-action sidebar-item active"><i class="fas fa-list fa-fw me-4"></i>List</a>
                <a href="#" class="list-group-item list-group-item-action sidebar-item disabled"><i class="fas fa-calendar fa-fw me-4"></i>Calendar</a>
                <a href="#" class="list-group-item list-group-item-action sidebar-item disabled"><i class="fas fa-gear fa-fw me-4"></i>Settings</a>
                <a href="../logout.php" class="list-group-item list-group-item-action sidebar-item"><i class="fas fa-sign-out fa-fw me-4"></i>Logout</a>
            </ul>
            <div class="p-5 h-100"></div>
        </div>
        <!-- CONTENT -->
        <div id="content" class="content-t flex-grow-1 p-4">

            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == "deleted") {
                    echo "<div class='alert alert-success alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Success</strong>, Data deleted from the database</div>";
                } else if ($_GET['status'] == "updated") {
                    echo "<div class='alert alert-success alert-dismissible fade show'>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
                    echo "<strong>Success</strong>, Data updated in the database</div>";
                }
            }
            ?>

            <h2>List</h2>
            <div class="row">

                <div class="card container-fluid p-2">

                    
                    <?php
                    include('assets/php/dbconfig.php');

                    // Fetch data from the database
                    $sql = "SELECT * FROM matkuldb";
                    $result = mysqli_query($connect, $sql);

                    if (!$result) {
                        die("Query failed: " . mysqli_error($connect));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        echo '<h5 class="px-2 pt-2 pb-2 fw-bold">List RPS</h5>';
                        echo '<table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="number">No</th>
                                        <th>Kode Matkul</th>
                                        <th>Nama Matkul</th>
                                        <th>Deskripsi</th>
                                        <th class="act">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>';

                        $nomor = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='number'>$nomor</td>
            <td>{$row['kode_matkul']}</td>
            <td>{$row['matkul']}</td>
            <td>{$row['deskripsi']}</td>";
                            echo "<td class='act'>";
                            echo "<a href='view.php?kode_matkul=" . $row['kode_matkul'] . "'><button class='btn btn-dark btn-sm me-1'><i class='fas fa-eye'></i></button></a>";
                            echo "<a href='edit.php?kode_matkul=" . $row['kode_matkul'] . "'><button class='btn btn-dark btn-sm me-1'><i class='fas fa-edit'></i></button></a>";
                            echo "<a href='assets/php/delform.php?kode_matkul=" . $row['kode_matkul'] . "'><button class='btn btn-dark btn-sm me-1'><i class='fas fa-trash'></i></button></a>";
                            echo "</td>";
                            echo "</tr>";

                            $nomor++;
                        }

                        echo '</tbody></table>';
                    } else {
                        echo '<div class="my-4 pt-3 container d-flex align-items-center justify-content-center">';
                        echo '<h5>Belum ada RPS yang dibuat</h5>';
                        echo '</div>';
                    }
                    ?>

                </div>
            </div>



        </div>
        <!-- FLOATING BUTTON -->
        <button class="btn btn-dark floating-button p-4 rounded-circle" onclick="location.href='../create.php'">
            <i class="fas fa-pen fa-xl"></i>
        </button>

        <!-- FOOTER -->
        <footer class="footer bg-light">
            <div class="container">
                <span><strong>&copy; 2023 </strong>TYR. All rights reserved.</span>
            </div>
        </footer>
    </div>
</body>

<div class="modal fade" id="deleteDialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDialogLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteDialogLabel">Delete RPS?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you really want to delete this RPS?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href='assets/php/delform.php?matkul=".$row[' matkul']."'><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete RPS</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Profile Dialog -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profileModalLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="p-3 profile">
                    <img src="../assets/icons/avatar.jpg" class="img-fluid w-75" alt="Profile Picture" style="border-radius: 1000px; border: 0.5px solid #d9d9d9;">
                    <div class="form-group p-2 my-2">
                        <div class="input-group py-2">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nama">
                        </div>
                        <div class="">
                            <label for="formFile" class="form-label fw-bold">Profile Picture</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/script/bootstrap-min.js"></script>
<script src="assets/script/jquery-min.js"></script>
<script src="assets/script/jquery-ui.js"></script>
<script src="assets/script/dashboard.js"></script>
<script src="assets/script/script.js"></script>

</html>