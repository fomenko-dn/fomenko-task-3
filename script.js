<script>
    //Отслежевание события для статуса в модальном окне
  $('#status').on('click', function () {
      var status = $(this).val();
      if ( $(this).is(':checked') ) {
          $('#status').val('1');
      } else {
          $('#status').val('0');
      }
  });

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

    //Добавление и редактирование пользователя
  $(document).ready(function () {
  $('#add_edit').click(function () {
    var id = $('#id_user').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var role = $('#role').val();
    var status = $('#status').val();
    if($('#first_name').val().length <= 3){
      $('#errorBlock').show();
      $('#errorBlock').text('Введите полное имя');
      return false;
    } else if($('#last_name').val().length <= 3){
      $('#errorBlock').show();
      $('#errorBlock').text('Введите полную фамилию');
      return false;
    } 
      $.ajax({
      url: 'ajax/add_edit.php',
      type: 'POST',
      cache: false,
      data: {'first_name' : first_name, 'last_name' : last_name, 'role' : role, 'status' : status, 'id' : id},
      dataType: 'json',
      success: function(data) {
        if(data.error != null){
          console.log(data.error.message);
          $('#errorBlock').show();
          $('#errorBlock').text(data.error.message);
          return false;
        } if(data.users.id != null) {
          $('#edit_user').text('Все готово');
          $('#errorBlock').hide();
          $('#exampleModal').modal('hide');
          $('#first'+id).text(data.users.first_name);
          $('#last'+id).text(data.users.last_name);
          $('#rol'+id).text(data.users.role);
          if(data.users.status == 1){
            $('#act'+id).css('color', 'green');
          } else {
            $('#act'+id).css('color', 'black');
          }
        } else {
          $('#add_user').text('Все готово');
          $('#errorBlock').hide();
          $('#exampleModal').modal('hide');
          if(data.users.status == 1){
            var act = '<i class="fa fa-circle act" aria-hidden="true" id="act'+data.LAST_ID+'"></i>';
          } else if(data.users.status == 0){
            var act = '<i class="fa fa-circle" aria-hidden="true" id="act'+data.LAST_ID+'"></i>';
          } else {
            $('#errorBlock').show();
            $('#errorBlock').text(data.error.message);
          }
          $('tbody').append('<tr id="record_user"><td><label class="container"><input type="checkbox" name="check_list[]" class="check" id="'+data.LAST_ID+'" value="'+data.LAST_ID+'"></label></td><td><a class="first_name" id="first'+data.LAST_ID+'">'+data.users.first_name+'</a> <a class="last_name" id="last'+data.LAST_ID+'">'+data.users.last_name+'</a></td><td class="text-center"><span class="label label-default status" id="stat'+data.LAST_ID+'">'+act+'</span></td><td><span class="user-subhead role" id="rol'+data.LAST_ID+'">'+data.users.role+'</span></td><td style="width: 20%;"><button data-id="'+data.LAST_ID+'" class="table-link text-info edit" data-toggle="modal" data-target="#exampleModal"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i></span></button><button data-id="'+data.LAST_ID+'" class="table-link danger trash" data-toggle="modal" data-target="#comfirmDeleteModal"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i></span></button></td><td></td></tr>');
        }
      }
    }) 
  });
  });


    //Удаление пользователя
  $('body').on("click", ".trash", function () {
      var id = $(this).data('id');
      var btn = $(this);
      var first_name = $('#first'+id).text();
      var last_name = $('#last'+id).text();
      
      $.ajax({
        type:'POST',
        url:'ajax/comfirm_delete.php',
        data:{id: id},
        dataType: 'json',
        success: function(data){
          if(data.user != null){
            $('#comfirmDeleteModalLabel').text('Удаление пользователя');
            $('#comfirm_delete').text('Удалить');
            $('#for_delete').text(data.user.id);
            $('#comfirmDeleteBody').text('Вы действительно хотите удалить пользователя '+first_name+' '+last_name+'?');
          }
        }
      })    
  });

  $('#comfirm_delete').click(function () {
      var id = $('#for_delete').text();
      $.ajax({
        type:'POST',
        url:'ajax/delete.php',
        data:{id: id},
        dataType: 'html',
        success: function(data){
          if(data == 'YES')
            $('#first'+id).closest("tr").remove();
            $('#comfirmDeleteModal').modal('hide');
        }
      })
  });

  // $('#comfirm').click(function (){
  //     var id = $(this).data('id');
  //     var btn = $(this);
  //     $.ajax({
  //       type:'POST',
  //       url:'ajax/delete.php',
  //       data:{id: id},
  //       dataType: 'html',
  //       success: function(data){
  //         // $('#comfirmModalLabel').text('Удаление пользователя');
  //         // $('#comfirm').text('Удалить');
  //         // $('.modal-body').text('Вы действительно хотите удалить пользователя?')
  //         if(data=="YES"){
  //            btn.closest("tr").remove();
  //         }else{
  //            alert("can't delete the row");
  //         }
  //       }
  //     })
  // });

    //Редактирование пользователя и подгружение его данных
  $('body').on("click", ".edit", function () {
    var id = $(this).data('id');
    var btn = $(this);
    $.ajax({
      type:'POST',
      url:'ajax/edit.php',
      data:{id: id},
      dataType: 'json',
      success: function(data) {
        console.log(data);
        if(data.status == 'ok') {
          $('#first_name').val(data.user.first_name);
          $('#last_name').val(data.user.last_name);
          $('#role').val(data.user.role);
          $('#status').val(data.user.status);
          if(data.user.status == 1){
            $('#status').prop('checked', true);
          } else {
            $('#status').prop('checked', false);
          }
          $('#id_user').val(data.user.id);
          $('#exampleModalLabel').text('Edit user');
          $('#add_edit').text('Edit');
        }else{
           alert("can't edit the row");
        }
      }
    })
  });

    //Кнопка открытия модального окна для добавления пользователя
  $('body').on("click", ".add", function () {
    $('#first_name').val('');
    $('#last_name').val('');
    $('#role').val();
    $('#status').val();
    $('#id_user').val('');
    $('#exampleModalLabel').text('Add user');
    $('#add_edit').text('Add');
  });



  $('.ok').click(function () {
    var id = $('.status').data('id');
    var sel = $('#group').val();
    var checkedid = [];
    $('.check:checked').each(function () {
        checkedid.push($(this).val());
    });
    if (checkedid.length == 0){
      $('#comfirmModalLabel').text('Ошибка');
      $('#comfirmBody').text('Выберите, пожалуйста, одного или несколько пользователей!');
      $('#comfirm').hide();
      $('#cancel').text('Ок');
    } else if(sel == '0'){
      $('#comfirmModalLabel').text('Ошибка');
      $('#comfirmBody').text('Пожалуйста, выберите действие, которое хотите совершить!');
      $('#comfirm').hide();
      $('#cancel').text('Ок');
    } else if(sel == 'set-act' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Сделать статус пользователя активным');
      $('#comfirmBody').text('Вы уверены, что хотите АКТИВИРОВАТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'set-act' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Сделать статус пользователей активными');
      $('#comfirmBody').text('Вы уверены, что хотите АКТИВИРОВАТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    }  else if(sel == 'set-no-act' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Сделать статус пользователя НЕ активным');
      $('#comfirmBody').text('Вы уверены, что хотите ДЕАКТИВИРОВАТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'set-no-act' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Сделать статус пользователей НЕ активными');
      $('#comfirmBody').text('Вы уверены, что хотите ДЕАКТИВИРОВАТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'del-grp' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Удаление пользователя');
      $('#comfirmBody').text('Вы уверены, что хотите УДАЛИТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'del-grp' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Удаление пользователей');
      $('#comfirmBody').text('Вы уверены, что хотите УДАЛИТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    }
  });

  $('.ok1').click(function () {
    var id = $('.status').data('id');
    var sel = $('#group1').val();
    var checkedid = [];
    $('.check:checked').each(function () {
        checkedid.push($(this).val());
    });
    if (checkedid.length == 0){
      $('#comfirmModalLabel').text('Ошибка');
      $('#comfirmBody').text('Выберите, пожалуйста, одного или несколько пользователей!');
      $('#comfirm').hide();
      $('#cancel').text('Ок');
    } else if(sel == '0'){
      $('#comfirmModalLabel').text('Ошибка');
      $('#comfirmBody').text('Пожалуйста, выберите действие, которое хотите совершить!');
      $('#comfirm').hide();
      $('#cancel').text('Ок');
    } else if(sel == 'set-act' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Сделать статус пользователя активным');
      $('#comfirmBody').text('Вы уверены, что хотите АКТИВИРОВАТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'set-act' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Сделать статус пользователей активными');
      $('#comfirmBody').text('Вы уверены, что хотите АКТИВИРОВАТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    }  else if(sel == 'set-no-act' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Сделать статус пользователя НЕ активным');
      $('#comfirmBody').text('Вы уверены, что хотите ДЕАКТИВИРОВАТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'set-no-act' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Сделать статус пользователей НЕ активными');
      $('#comfirmBody').text('Вы уверены, что хотите ДЕАКТИВИРОВАТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'del-grp' && checkedid.length == 1){
      $('#comfirmModalLabel').text('Удаление пользователя');
      $('#comfirmBody').text('Вы уверены, что хотите УДАЛИТЬ пользователя?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    } else if(sel == 'del-grp' && checkedid.length > 1){
      $('#comfirmModalLabel').text('Удаление пользователей');
      $('#comfirmBody').text('Вы уверены, что хотите УДАЛИТЬ пользователей?');
      $('#comfirm').show();
      $('#cancel').text('Отмена');
    }
  });



  // Групповые действия с пользователями
  $(document).ready(function () {
  $('#comfirm').click(function (){
    var id = $('.status').data('id');
    var sel = $('#group').val();
    var checkedid = [];
    $('.check:checked').each(function () {
        checkedid.push($(this).val());
    });
      $.ajax({
        type:'POST',
        url:'ajax/group.php',
        data:{sel: sel, checkedid: checkedid},
        dataType: 'json',
        success: function(data) {
          if(data.error != null){
            console.log(data.error.message);
            return false;
          } else if(data.sel == "del-grp"){
            $('input:checked:not(.chk-all)').closest("tr").remove();
          } else if(data.sel == 'set-act'){
            for(i=0; i<data.n; i++){
              $('#act'+checkedid[i]).css('color', 'green');
            }          
          } else if(data.sel == 'set-no-act'){
            for(i=0; i<data.n; i++){
              $('#act'+checkedid[i]).css('color', 'black');
            }
          }
          $('#comfirmModal').modal('hide'); 
        }
      })
  });
  });

  // Групповые действия с пользователями
  $(document).ready(function () {
  $('#comfirm').click(function (){
    var id = $('.status').data('id');
    var sel = $('#group1').val();
    var checkedid = [];
    $('.check:checked').each(function () {
        checkedid.push($(this).val());
    });
      $.ajax({
        type:'POST',
        url:'ajax/group.php',
        data:{sel: sel, checkedid: checkedid},
        dataType: 'json',
        success: function(data) {
          if(data.error != null){
            console.log(data.error.message);
            return false;
          } else if(data.sel == "del-grp"){
            $('input:checked:not(.chk-all)').closest("tr").remove();
          } else if(data.sel == 'set-act'){
            for(i=0; i<data.n; i++){
              $('#act'+checkedid[i]).css('color', 'green');
            }          
          } else if(data.sel == 'set-no-act'){
            for(i=0; i<data.n; i++){
              $('#act'+checkedid[i]).css('color', 'black');
            }
          }
          $('#comfirmModal').modal('hide'); 
        }
      })
  });
  });

  // $(document).ready(function () {
  // $('.ok1').click(function (){
  //   var id = $('.status').data('id');
  //   var sel = $('#group1').val();
  //   var checkedid = [];
  //   $('.check:checked').each(function () {
  //       checkedid.push($(this).val());
  //   });
  //   if (checkedid.length == 0){
  //     alert('Массив пустой');
  //     return false;
  //   } else if(sel == '0'){
  //     alert('Please select action');
  //     return false;
  //   } else {
  //     alert('Подтвердите действие');
  //   }
  //     $.ajax({
  //       type:'POST',
  //       url:'ajax/group.php',
  //       data:{sel: sel, checkedid: checkedid},
  //       dataType: 'json',
  //       success: function(data) {
  //         if(data.error != null){
  //           console.log(data.error.message);
  //           return false;
  //         } else if(data.sel == "del-grp"){
  //           $('input:checked:not(.chk-all)').closest("tr").remove();
  //         } else if(data.sel == 'set-act'){
  //           for(i=0; i<data.n; i++){
  //             $('#act'+checkedid[i]).css('color', 'green');
  //           }          
  //         } else if(data.sel == 'set-no-act'){
  //           for(i=0; i<data.n; i++){
  //             $('#act'+checkedid[i]).css('color', 'black');
  //           }
  //         } 
  //       }
  //     })
  // });
  // });
</script>