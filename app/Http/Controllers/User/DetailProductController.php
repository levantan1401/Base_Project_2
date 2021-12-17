<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class DetailProductController extends Controller
{
    // index hiển thị sản phẩm
    public function index($id)
    {
        return $id;
    }

    // show tất các comment của 1 sản phẩm
    public function showAllComment(Request $request)
    {

        $idProduct = $request->input('id_product');
        $comments = Comment::where('comments_product_id', '=', $idProduct)->get();

        // $commentsMains = Comment::where('comments_product_id', '=', $idProduct)
        // ->where('comments_status','=' , 0)
        // ->where('comments_parent','=' , 0)
        // ->orderBy('created_at','desc')
        // ->get();

        // $commentsChildrens = Comment::where('comments_product_id', '=', $idProduct)
        // ->where('comments_parent','!=' , 0)
        // ->orderBy('created_at','desc')
        // ->get();

        $output = '';
        foreach ($comments as $commentsMain){
            $output .= '
                <div class="be-img-comment">
                    <a href="blog-detail-2.html">
                        <img  src="'.asset('public/'.$commentsMain->getUser->avatar).'" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content">
                    <span class="be-comment-name">
                        <a class="name">'.$commentsMain->getUser->name.'</a>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        '. date_format( $commentsMain->created_at ,"d/m/Y  H:i") .'
                    </span>
                    <div class="row">';
                                    for($i = 0; $i < 5 ; $i++){
                                        if($i  < $commentsMain->getRating->rt_star)
                                        {
                                            $classStar = 'rating-on';
                                        }else{
                                            $classStar = '';
                                        }
                                        $output .= '<span class="'.$classStar.'" style="margin-left:15px;"><span class="fa fa-star"></span></span>';
                                    }

                    $output .='</div>
                    <p class="be-comment-text">'.$commentsMain->comments_text.' </p>
                </div>';
        }

        return  $output;
    }

    // nhận và tạo một comment mới
    public function sendComment(Request $request)
    {
        $idProduct = $request->input('id_product');
        $idUser = $request->input('id_user');
        $valueComment = $request->input('valueComment');
        $value_rating = $request->input('value_rating');

        $insertGetIDRating = Rating::insertGetId([
            'rt_user_id' => $idUser,
            'rt_product_id' => $idProduct,
            'rt_star' => $value_rating,
        ]);
        $dataTable = new Comment();
        $dataTable->comments_user_id = $idUser;
        $dataTable->comments_product_id = $idProduct;
        $dataTable->comments_text = $valueComment;
        $dataTable->comments_parent = 0;
        $dataTable->comments_status = 0;
        $dataTable->comments_rating_id =  $insertGetIDRating;
        $dataTable->save();
        return $dataTable;
    }
}
