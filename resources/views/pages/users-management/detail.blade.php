{{-- modal --}}
<div class="modal fade" id="formUserDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="formUserDetailLabel" aria-hidden="true">
    {{-- <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered me-lg-8" role="document"> --}}
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="form_detail_user">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formUserDetailLabel">User Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #172b4d !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="detail_first_name">First Name</label>
                                <input type="hidden" class="form-control" name="detail_id" id="detail_id" placeholder="First Name">
                                <input type="text" class="form-control" name="detail_first_name" id="detail_first_name" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="detail_last_name">Last Name</label>
                                <input type="text" class="form-control" name="detail_last_name" id="detail_last_name" placeholder="Last Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="detail_user_name">User Name</label>
                                <input type="text" class="form-control" name="detail_user_name" id="detail_user_name" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="detail_email">Email</label>
                                <input type="email" class="form-control" name="detail_email" id="detail_email" placeholder="Last Name" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="detail_role">Role User</label>
                                {{-- <input type="email" class="form-control" name="detail_email" id="detail_email" placeholder="Last Name"> --}}
                                <select class="form-control form-control-lg select2" name="detail_role" id="detail_role" style="width:100%; height:3vh"></select>
                                <input type="hidden" name="current_role" id="current_role">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-gradient-primary" id="update_user">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>