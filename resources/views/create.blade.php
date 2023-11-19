<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{route('me.store')}}" method="post">
            @csrf
            <input type="text" name="customer[name]" id="">
            <input type="text" name="customer[city]" id="">
            <button type="button" class="submit-form" id="">Create Employee</button>
        </form>
    </div>

@push('js')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
   
    $(".submit-form").click(function(e){
        e.preventDefault();
        var data = $('#form-data').serialize();
        $.ajax({
            type: 'post',
            url: "{{ route('me.store') }}",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(){
                $('#create_new').html('....Please wait');
            },
            success: function(response){
                alert(response.success);
            },
            complete: function(response){
                $('#create_new').html('Create New');
            }
        });
	});
</script>
@endpush

</body>
</html>