@extends('layout.admin')
@section('title', 'Quản Lý Comment')
@section('main')
<div class="container-fluid box_main_prostatus_avtive_nav_product">
    <div class="page-head mt-5">
        <div class="row container_full" style="justify-content: space-between; align-items: center;">
            <div class="col-md-6">
                <h4 class="mt-2 mb-2">Bình luận</h4>

            </div>
        </div>
    </div>
    <!-- đơn chưa xác nhận -->
    <div class="edit-table mt-5">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row mb-3" style=" align-items: center; ">
                            <div class="col-md-4">
                                <!-- <h3 class="text-muted">Đơn chưa xác nhận</h3> -->
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-right ">
                                <!-- Button to Open the Modal add -->

                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped" id="tableComment">
                                <thead>
                                    <tr>
                                        <!-- <th>NO</th> -->
                                        <th>Duyệt</th>
                                        <th>Người gửi</th>
                                        <th>Bình luận</th>
                                        <th>Ngày gửi</th>
                                        <th>sản phẩm</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody ID="  ">
                                </tbody>
                            </table>

                        </div>
                        <!-- tao phần phân trang -->
                        <div class="box_pagination_main">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

</div>
@endsection

@section('javascript_page')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        })

        var table1 = $('#tableComment').DataTable({
            processing: true,
            serverSide: true,
            "order": [[ 0, "desc" ]],
            ajax: "{{ route('admin.comment.index') }}",
            columns: [{
                    data: 'comments_status',
                    name: 'comments_status'
                },
                {
                    data: 'comments_sender',
                    name: 'comments_sender'
                },
                {
                    data: 'comments_text',
                    name: 'comments_text'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'comments_name_product',
                    name: 'comments_name_product'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
        });

        // duyệt hiển thị bình luận
        $('#tableComment').on('click', '.btnBrowse',function(e){
            e.preventDefault();
            let status = $(this).data('status');
            let id_comment = $(this).data('id_comment');

            $.ajax({
                url: '{{route("admin.change.browse")}}',
                type: 'get',
                data: {
                    status: status,
                    id_comment : id_comment
                },
                success: (data) => {
                    $('#tableComment').DataTable().ajax.reload();
                }
            })
        })

        // trả lời bình luận
        $('#tableComment').on('submit', '.formReplyComment', function(e){
            e.preventDefault();
            let url = $(this).attr('action');
            let id_comment = $(this).data('id_comment');
            let id_product = $('#idProduct-'+id_comment).val();
            let input_reply = $('#inputValueReply-'+id_comment).val();

            $.ajax({
                url: url,
                type: 'get',
                data: {
                    id_comment,
                    id_product,
                    input_reply,
                    id_user: ' {{ Auth::check() ? Auth::user()->id : "" }}'
                },
                success: (data) => {
                    $('#tableComment').DataTable().ajax.reload();
                }
            })

        })

        // xóa bình luận
        $('#tableComment').on('click','.btnDeleteComment',function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'get',
                success: (data) => {
                    if(data == true) {
                        $('#tableComment').DataTable().ajax.reload();
                    }
                }

            })
        })
    })
</script>
@endsection
