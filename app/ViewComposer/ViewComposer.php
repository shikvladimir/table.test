<?php


namespace App\ViewComposer;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ViewComposer
{
    public function compose(View $view)
    {
        $authId = Auth::id();
        if(isset($authId)){
            $userId = User::query()->where('id','=',$authId)->get();
            $user = null;
            foreach ($userId as $userName){
                $user = $userName;
            }
        }else{
            $user = '';
        }

        return $view ->with('user',$user);
    }
}
