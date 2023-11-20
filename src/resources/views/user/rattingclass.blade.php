@extends('layouts.layoutuser')
@section('content')

    @if ($msg)
        <div style="text-align: center">{{ $msg }}</div>
    @else
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <div style="display:block" class="row tab-content">
            <div class="col-12">
                <div class="card">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                    <div style="padding-top: 25px;" class="text-center mx-auto pb-5  " style="max-width: 600px;   ">
                        <h4 id="title">Danh sách lớp</h4>
                    </div>
                    <div class="card-content collapse show" id="menu1">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
            fetch_customers_data();
            function fetch_customers_data(query = '', id = '') {
                $.ajax({
                    url:"{{ route('action_ratting_class') }}",
                    method:"GET",
                    data:{query:query,id:id},
                    dataType:'json',
                    success:function(data){
                        $('tbody').html(data.table_data);
                        $('thead').html(data.header);
                        $('#title').html(data.title);
                    }
                })
            }
            $(document).on('click', '#detail', function() {
                var id = $(this).val();
                var query = '';
                fetch_customers_data(query, id);
            });
        });
    </script>
    @endif

@endsection
