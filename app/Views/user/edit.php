<?= $this->extend('layout/admin-layout') ?>

<?= $this->section('content') ?>
<div class="card o-hidden border-0 shadow-lg my-5">
    <?php if (session()->getFlashdata('msg')): ?>
        <?php $messageData = session()->getFlashdata('msg') ?>
        <div class="alert alert-<?= $messageData['type']; ?>" role="alert">
            <?php echo $messageData['message'];?> 
        </div>
    <?php endif; ?>
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                    </div>
                    <?= session()->getFlashdata('error') ?>
                    <?= validation_list_errors() ?>
                    <form method="post" id="update_user" name="update_user" action="<?php echo base_url('/update-user'); ?>">
                        <?= csrf_field() ?>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input 
                                type="hidden" 
                                name="user_id" 
                                id="user_id" 
                                value="<?php echo $user['id'] ?? set_value('user_id'); ?>"
                                >
                                <input 
                                type="text" 
                                name="firstname" 
                                id="firstname" 
                                class="form-control form-control-user" 
                                placeholder="First Name" 
                                value="<?php echo $user['firstname'] ?? set_value('firstname'); ?>"
                                required>
                            </div>
                            <div class="col-sm-6">
                                <input 
                                type="text" 
                                name="lastname" 
                                id="lastname" 
                                class="form-control form-control-user" 
                                placeholder="Last Name" 
                                value="<?php echo $user['lastname'] ?? set_value('lastname'); ?>"
                                required
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <input 
                            type="email" 
                            class="form-control form-control-user" 
                            id="email" 
                            name="email"
                            placeholder="Email Address"
                            value="<?php echo $user['email'] ?? set_value('email'); ?>"
                            required
                            >
                        </div>
                        <div class="form-group">
                            <input 
                            type="phone" 
                            class="form-control form-control-user" 
                            id="phone" 
                            name="phone"
                            placeholder="Phone number"
                            value="<?php echo $user['phone'] ?? set_value('phone'); ?>"
                            required
                            >
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <a href="<?php echo base_url('/users-list'); ?>" class="btn btn-success btn-user btn-block">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>