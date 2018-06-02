<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alerta">
                </div>
                <form id="formLg">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input class="form-control" placeholder="Email or login" type="text" name="na" required="required">
                        </div>
                        <!-- input-group.// -->
                    </div>
                    <!-- form-group// -->
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input class="form-control" placeholder="******" type="password" name="pw" required="required">
                        </div>
                        <!-- input-group.// -->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="bt"> Login </button>
                    </div>
                    <p class="text-center">
                        <a href="#" class="btn" data-toggle="modal" data-target="#exampleModalLong2" data-dismiss="modal">Don't have an account yet?</a>
                    </p>
                </form>

            </div>

        </div>
    </div>
</div>