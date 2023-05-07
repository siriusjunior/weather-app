<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeController extends Controller
{

    /**
     * Undocumented function
     *
     * @param Like $like
     * @param Prefecture $prefecture
     * @return void
     */
    public function toggle(
        Request $request,
        $prefectureId,
    ): JsonResponse
    {
        $prefecture = Prefecture::find($prefectureId);
        if(is_null($prefecture)){
            Log::info('Cannot find city concerning requested Id: ');
            return response()->json(['error' => 'リクエストIDに紐づく都市が存在しません。'], 404);
        }
        $user = Auth::user();
        Log::info('Auth user is:' .$user);
        $like = Like::where('user_id', $user->id)->where('prefecture_id', $prefecture->id)->first();
        if($like){
            // リクエスト前のハートが色ついているか
            $filled = true;
            $likeId = $like->id;
            Log::info('Deleting Like regarding id:'. $likeId . ' user_id:' . $like->user_id .  ' prefecture_id:' . $like->prefecture_id);
            $like->delete();
            Log::info('Deleted Like regarding id:'. $likeId);
        }else{
            $filled = false;
            $like = Like::create(
                    [
                        'user_id' => $user->id,
                        'prefecture_id' => $prefecture->id,
                    ]
                );
            Log::info('Created Like regarding id:'. $like->id . ' user_id:'. $user->id .  ' prefecture_id:' . $prefecture->id);
        }
        $count = Like::where('prefecture_id', $prefecture->id)->count();
        Log::info('Counted Likes regarding id:'. $like->id . ' user_id:'. $user->id . ' prefecture_id:' . $prefecture->id);
        return response()->json(['status' => 'success', 'count' => $count, 'fulled' => $filled], 200);
    }
}
