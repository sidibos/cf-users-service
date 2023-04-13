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
                        <h1 class="h4 text-gray-900 mb-4">Add New User</h1>
                    </div>
                    <?= session()->getFlashdata('error') ?>
                    <?= validation_list_errors() ?>
                    <form 
                    method="post" 
                    id="add_user" 
                    name="add_user" 
                    action="<?php echo base_url('/add-user'); ?>"
                    >
                        <?= csrf_field() ?>
                        <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input 
                            type="text" 
                            name="firstname" 
                            id="firstname" 
                            class="form-control form-control-user" 
                            placeholder="First Name" 
                            value="<?= set_value('firstname') ?>"
                            required>
                        </div>
                        <div class="col-sm-6">
                            <input 
                            type="text" 
                            name="lastname" 
                            id="lastname" 
                            class="form-control form-control-user" 
                            placeholder="Last Name" 
                            value="<?= set_value('lastname') ?>"
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
                            value="<?= set_value('email') ?>"
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
                            value="<?= set_value('phone') ?>"
                            required
                            >
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input 
                                type="password" 
                                class="form-control form-control-user"
                                id="password" 
                                name="password" 
                                placeholder="Password"
                                required>
                            </div>
                            <div class="col-sm-6">
                                <input 
                                type="password" 
                                class="form-control form-control-user"
                                id="confirm_password" 
                                name="confirm_password" 
                                placeholder="Repeat Password"
                                required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>