{{-- modal --}}
<div class="modal fade" id="formCreateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="formCreateUserLabel" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered me-lg-8" role="document"> --}}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="form_create_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateUserLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #172b4d !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_first_name">First Name</label>
                                <input type="text" class="form-control" name="create_first_name" id="create_first_name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_last_name">Last Name</label>
                                <input type="text" class="form-control" name="create_last_name" id="create_last_name" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_user_name">User Name</label>
                                <input type="text" class="form-control" name="create_user_name" id="create_user_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_email">Email</label>
                                <input type="email" class="form-control" name="create_email" id="create_email" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="create_role">Role User</label>
                                {{-- <input type="email" class="form-control" name="create_email" id="create_email" placeholder="Last Name"> --}}
                                <select class="form-control form-control-lg select2" name="create_role" id="create_role" style="width:100%; height:3vh">
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" id="exSweetalert" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary" id="create_user">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>