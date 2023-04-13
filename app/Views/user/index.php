<?= $this->extend('layout/admin-layout') ?>

<?= $this->section('content') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-end">
            <a href="/add-user" class="btn btn-success mb-2">Add User</a>
        </div>
    </div>
    
    <?php if (session()->getFlashdata('msg')): ?>
        <?php $messageData = session()->getFlashdata('msg') ?>
        <div class="alert alert-<?= $messageData['type']; ?>" role="alert">
            <?php echo $messageData['message'];?> 
       </div>
    <?php endif; ?>
    
    <div class="card-body">
        <?php if (! empty($users) && is_array($users)): ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="users-list">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($users): ?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['firstname']; ?></td>
                                    <td><?php echo $user['lastname']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('edit-user/'.$user['id']);?>" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <a 
                                        href="<?php echo base_url('delete-user/'.$user['id']);?>" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('are you sure you want to delete this User?')"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info no-auto-close">
                <strong>No Users Found</strong>
            </div>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('page_javascript') ?>
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#users-list').DataTable();
         } );
    </script>
<?= $this->endSection() ?>