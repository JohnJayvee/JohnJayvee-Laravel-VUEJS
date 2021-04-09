<template>

<div class="container">

        <h1>Laravel 8 Crud with Ajax</h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewUser"> Create New User</a>
        <span id="success_message"></span>

        <table class="table table-bordered data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>

                <div class="modal-body">
                    <form id="userForm" name="userForm" class="form-horizontal">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="Enter Title" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Enter Title" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

       <div class="modal fade ajaxShowModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <table class="table table-user-information">
                        <tr>
                            <td>Firstname</td>
                            <td class="firstName"></td>
                        </tr>

                        <tr>
                            <td>Lastname: </td>
                            <td class="lastName"></td>
                        </tr>
                    </table>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

 </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>



