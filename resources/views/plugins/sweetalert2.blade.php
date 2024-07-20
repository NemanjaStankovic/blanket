@push('plugin-css')
    @once
    <link href="{{ asset("libs/sweetalert2/sweetalert2.min.css") }}" rel="stylesheet" type="text/css" />
    @endonce
@endpush

@push('plugin-js-script')
    @once
    <script src="{{ asset("libs/sweetalert2/sweetalert2.all.min.js") }}"></script>
    <script>
      
        $(document).on("click", '.potvrdaBrisanja', function(e){
            var form =  $(this).closest("form");
            e.preventDefault();
            var title = "Да ли сте сигурни да желите да обришете податак?";
            var text = "Након успешног брисања, податак нећете моћи да повратите!";
            var confirmButtonText = "Да, обриши податак!";

            if(typeof $(this).data('title') !== 'undefined'){
                title = $(this).data('title');
            }
            
            if(typeof  $(this).data('text') != 'undefined'){
                text = $(this).data('text');
            }

            if(typeof  $(this).data('confirmButtonText') != 'undefined'){
                confirmButtonText = $(this).data('confirmButtonText');
            }            

            Swal.fire({
                title: title,
                text:text,
                icon:"warning",
                showCancelButton:!0,
                confirmButtonColor: '#1abc9c',
                cancelButtonColor:"#6c757d",
                confirmButtonText: confirmButtonText,
                cancelButtonText: "Откажи"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }else{
                        return false;
                    }
                })
            });

    </script>
    @endonce
@endpush
