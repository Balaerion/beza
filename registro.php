<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="controlador/Regristar_Usuario.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="Name" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Last Name" name="FName" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Second Last Name" name="SName" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tel" name="Tel" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Address" name="Address" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Bank Account" name="Bank_Account" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="User" name="User" required="required">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Password" name="Password" required="required">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>