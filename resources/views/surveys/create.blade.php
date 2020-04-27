@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Survey</div>

                <div class="card-body">
                <form  role="form" method="POST" action="{{ url('/insert') }}">
                        {{ csrf_field() }}
                    <!-- <form action="/insert" methon="POST">
                    @csrf -->
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="namehelp" placeholder="Input Title">
                        <!-- <small id="namehelp" class="form=text text-muted">Give a description to Your Question.<small> -->
                    </div>

                    <div class="form-group">
                        <label for="description">Purpose</label>
                        <input name="description" type="text" class="form-control" id="description" aria-describedby="descriptionhelp" placeholder="Input Purpose">
                        <!-- <small id="descriptionhelp" class="form=text text-muted">What is your description for this question<small> -->
                    </div>
                    <!-- <button type="submit"></button> -->
                    <button type="submit" class="btn btn-primary">Creat Survey</button>

                    
                    </form>
                    <form >  


<div class="alert alert-danger print-error-msg" style="display:none">
<ul></ul>
</div>


<div class="alert alert-success print-success-msg" style="display:none">
<ul></ul>
</div>


<div class="table-responsive">  
    <table class="table table-bordered" id="dynamic_field">  
        <tr>  
            <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
        </tr>  
    </table>  
    <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
</div>


</form>  
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
@endsection
