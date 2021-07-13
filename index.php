<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    	$website_title = 'Fomenko Task 3';
    	require 'blocks/head.php';
	?>
</head>
<body>
<hr>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <div class="options">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add</button>
                            <select>
                              <option>Please select</option>
                              <option>Set active</option>
                              <option>Set not active</option>
                              <option>Delete</option>
                            </select>
                            <button>ok</button>
                        </div>
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th>
                                    <label class="container">all
                                        <input type="checkbox" name="g1" class=chk-all>
                                    </label></th>
                                <th><span>Name</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Role</span></th>
                                <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="g1">
                                        </label>
                                    </td>   
                                    <td>
                                        <a href="#" class="user-link">First name</a>
                                        <a href="#" class="user-link">Last name</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-default">not active</span>
                                    </td>
                                    <td>
                                        <span class="user-subhead">user</span>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="g1">
                                        </label>
                                    </td>  
                                    <td>
                                        <a href="#" class="user-link">First name</a>
                                        <a href="#" class="user-link">Last name</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-success">active</span>
                                    </td>
                                    <td>
                                        <span class="user-subhead">admin</span>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link  text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="container">
                                            <input type="checkbox" name="g1">
                                        </label>
                                    </td>  
                                    <td>
                                        <a href="#" class="user-link">First name</a>
                                        <a href="#" class="user-link">Last name</a>
                                    </td>
                                    <td class="text-center">
                                        <span class="label label-danger">active</span>
                                    </td>
                                    <td>
                                        <span class="user-subhead">user</span>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="#" class="table-link  text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="options">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add</button>
                            <select>
                              <option>Please select</option>
                              <option>Set active</option>
                              <option>Set not active</option>
                              <option>Delete</option>
                            </select>
                            <button>ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>

            <form method="post" action="">
                <label for="first_name">
                    First name
                    <input type="text" name="first_name" id="first_name" class="form-item">
                </label><br>
                <label for="last_name">
                    Last name
                    <input type="text" name="last_name" id="last_name" class="form-item">
                </label><br>
                <label for="role_name">
                    <div class="select-box">
                        Role 
                    <select name="role">
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                    </div>
                </label><br>
                <label  for="status" class="status">
                    <div>Status</div>
                    <label class="switch">
                      <p>Status</p>
                      <input type="checkbox" name="status"  id="checkbox_check">
                      <span class="slider round"></span>
                    </label>
                </label>
                <div class="alert alert-danger mt-2" id="errorBlock"></div>
            </form>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add_user" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

	$('#checkbox_check').on('click', function () {
    	if ( $(this).is(':checked') ) {
        	$status = 'active';
    	} else {
        	$status = 'not active';
    	}
	})	

	//Групповой чекер 
    $(document).on('change', 'input[type=checkbox]', function () {
  var $this = $(this), $chks = $(document.getElementsByName(this.name)), $all = $chks.filter(".chk-all");
  
  if ($this.hasClass('chk-all')) {
    $chks.prop('checked', $this.prop('checked'));
  } else switch ($chks.filter(":checked").length) {
    case +$all.prop('checked'):
      $all.prop('checked', false).prop('indeterminate', false);
      break;
    case $chks.length - !!$this.prop('checked'):
      $all.prop('checked', true).prop('indeterminate', false);
      break;
    default:
      $all.prop('indeterminate', true);
    }
  });

    //Добавление пользователя
    $('#add_user').click(function () {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var role = $('#role').val();
        var status = $('#status').val();

        $.ajax({
            url: 'ajax/add.php',
            type: 'POST',
            cache: false,
            data: {'first_name' : first_name, 'last_name' : last_name, 'role' : role, 'status' : status},
            dataType: 'html',
            success: function(data) {
                if(data == 'Готово') {
                    $('#add_user').text('Все готово');
                    $('#errorBlock').hide();
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        })
    });

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>