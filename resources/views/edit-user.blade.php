<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_edit">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="firstname_edit">Firstname:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstname_edit" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastname_edit">Lastname:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastname_edit" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email_edit">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email_edit" autofocus>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
