<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">User Management</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">

        <div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <!-- <form class="position-relative">
                                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Users..." onkeyup="searchUsers()" />
                                
                            </form> -->
                        </div>
                        <div class="col-md-8 col-xl-12 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <button class="btn bg-secondary-subtle text-secondary px-3 align-items-end"  onclick="location.href='<?= base_url('users/add'); ?>'" data-bs-toggle="tooltip" data-bs-placement="top" title="Add user">
                                Add User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mb-4">
                            <table class="table table-striped user-table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Complete Name</th>
                                        <th>Email Address</th>                                       
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Role</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search-results">
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td style='text-align: center; vertical-align: middle;'>
                                                <img src="<?php echo base_url('assets/images/users/' . $user['profile_pic']); ?>" class='rounded-circle' width='40' height='40'>
                                            </td>
                                            <td style='vertical-align:middle;'><a href="<?= base_url('users/view_details/' . $user['userid']); ?>"><?php echo $user['complete_name']; ?></a></td>
                                            <td style='vertical-align:middle;'><?php echo $user['email']; ?></td>
                                            <td style='vertical-align:middle; text-align: center; '>
                                                <?php if ($user['status'] == 0): ?>
                                                    <span class="badge rounded-pill bg-primary-subtle text-primary fw-semibold fs-2">
                                                        Inactive
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">
                                                        Active
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td style='vertical-align:middle; text-align:center;'><?php echo $user['role']; ?></td>
                                            <td style='text-align: center; vertical-align:middle;'>
                                                <a href="<?= base_url('users/view_details/' . $user['userid']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                                    <iconify-icon icon="solar:eye-linear" class="iconify-md"></iconify-icon>
                                                </a>
                                                <a href="<?= base_url('users/update_profile/' . $user['userid']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit User">
                                                    <iconify-icon icon="tabler:edit" class="iconify-md"></iconify-icon>
                                                </a>
                                                
                                                <a href="<?= base_url('users/delete/' .$user['userid']); ?>" class="btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete User">
                                                    <iconify-icon icon="solar:trash-bin-trash-outline" class="iconify-md"></iconify-icon>
                                                </a>
                                                
                                                <!-- <?php echo form_open('users/delete/' .$user['userid']); ?>
                                                    <input type="submit" class="btn btn-danger" value="Delete" data-id="" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete User">
                                                </form> -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if (empty($users)): ?>
                                <p class="text-center">No users found matching your search criteria.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

