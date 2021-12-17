<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    // index comments
    public function indexShowComment(Request $request)
    {

        if ($request->ajax()) {
            $data = Comment::where('comments_parent', '=', 0)->get();
            return DataTables::of($data)
                ->editColumn('comments_status', function ($data) {
                    if ($data->comments_status == 1) {
                        return '<button type="button" class="btn btn-primary btn-sm btnBrowse" data-id_comment="' . $data->id . '" data-status="' . $data->comments_status . '">Duyệt</button>';
                    } else {
                        return '<button type="button" class="btn btn-danger btn-sm btnBrowse" data-id_comment="' . $data->id . '" data-status="' . $data->comments_status . '">Không duyệt</button>';
                    }
                })
                ->editColumn('comments_text', function ($data) {

                    $html ='';
                    $html .= '<p style="margin:0">' . $data->comments_text . '</p>';
                    $supDatas =Comment::where('comments_parent', '=', $data->id)
                    ->where('comments_product_id', '=', $data->comments_product_id)
                    ->get();
                    $html .= "<ul>";
                    foreach($supDatas as $supData){
                        $html.= '<li>'.$supData->comments_text.'</li>';
                    }
                    $html .= "</ul>";
                    if($data->comments_status == 0){
                        $html .= '
                        <form action="'.route('admin.comment.reply').'" class="formReplyComment" data-id_comment="'.$data->id.'" >
                            <input type="hidden" name="idProduct" id="idProduct-'.$data->id.'" value="' . $data->comments_product_id . '">
                            <textarea name="input_reply" id="inputValueReply-'.$data->id.'" rows="2"></textarea>
                            <p style="text-align:center">
                                <input type="submit"  class="btn btn-primary btn-sm " value="Trả lời">
                            </p>
                        </form>

                        ';
                    }
                    return $html;
                })
                ->addColumn('comments_sender', function ($data) {
                    return $data->getUser->name;
                })
                ->editColumn('created_at', function ($data) {
                    return date_format($data->created_at, "d/m/Y  H:i");
                })
                ->addColumn('comments_name_product', function ($data) {
                    // return '<a href=""> ' . $data->getProduct->product_name . ' </a>
                // ';
                })
                ->addColumn('action', function ($data) {
                    return '
                    <a href=""  class="btn btn-sm btn-outline-primary btnEditComment" ><i class="fa fa-edit (alias)"></i></a>
                    <a href="'.route('admin.comment.delete',$data->id).'" class="btn btn-sm btn-outline-danger btnDeleteComment"  ><i class="fa  fa-times"></i></a>
                ';
                })
                ->rawColumns(['comments_status', 'comments_sender', 'created_at', 'comments_name_product', 'action', 'comments_text'])
                ->make(true);
                // dd( $data );
        }
        return view('admin.Comment.index');
    }

    // duyệt hoặc không duyêt
    public function changeBrowse(Request $request)
    {
        $status = $request->input('status');
        $id_comment = $request->input('id_comment');

        $dataTable = Comment::find($id_comment);
        if ($status == 0) {
            $dataTable->comments_status = 1;
        } else {
            $dataTable->comments_status = 0;
        }
        $dataTable->save();

        return $dataTable;
    }

    // tra loi bình luận
    public function replyComment(Request $request)
    {
        $id_comment = $request->input('id_comment');
        $id_product = $request->input('id_product');
        $input_reply = $request->input('input_reply');
        $id_user = $request->input('id_user');

        $dataTable = new Comment();
        $dataTable->comments_user_id = $id_user;
        $dataTable->comments_product_id = $id_product;
        $dataTable->comments_text = $input_reply;
        $dataTable->comments_parent = $id_comment;
        $dataTable->comments_status = 0;
        $dataTable->save();

        return $dataTable;
    }

    // xóa bình luận
    public function deleteComment($id_comment)
    {
        $result = Comment::where('id', '=' ,$id_comment)
        ->orWhere('comments_parent','=', $id_comment)
        ->delete();

        if($result > 0) {
            return true;
        }

        return false;
    }
}
