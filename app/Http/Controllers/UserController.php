<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAction($id) {
        $user = User::find($id);
        echo $user->email."<br>";
        echo $user->meno ." ". $user->priezvisko."<br>";;
        echo $user->vek."<br>";
        echo $user->updated_at;
    }

    public function insertAction() {
        $user = new User();
        $user->meno = str_random(5);
        $user->priezvisko = str_random(5);
        $user->email = $user->meno . "." . $user->priezvisko . "@gmail.com";
        $user->heslo = bcrypt(str_random(5));
        $user->vek = mt_rand(1, 80);
        $user->save();
    }

    public function updateAction($id){
        $user = User::where(['id'=>$id])->update(['vek'=>mt_rand(1,80)]);
    }

    public function deleteAction($id){
        $user = User::find($id);
        $user->delete();
    }

}
