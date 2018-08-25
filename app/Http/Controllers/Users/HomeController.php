<?php
/**
 * Created by PhpStorm.
 * User: fedor
 * Date: 18.08.18
 * Time: 20:57
 */

namespace App\Http\Controllers\Users;

use App\Child;
use App\Http\Controllers\HomeController as HC;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


/**
 * Class HomeController
 * @package App\Http\Controllers\Users
 */
class HomeController extends HC
{
    use UserCabinet;

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    private function getUser()
    {
        return Auth::user();
    }

    /**
     * @param int $userID
     * @param string $roleName
     */
    private function setSessionData(int $userID, string $roleName) : void
    {
        session([
            'userID' => $userID
        ]);

        if($roleName == 'parent') {

            $childs = Child::where('parent_id', $userID)->get();
            //var_dump($child);
            foreach ($childs as $child) {

                $userChilds = User::where('id', $child->user_id)->get();

                foreach ($userChilds as $userChild) {
                    $firstName = $userChild->first_name;
                    $lastName = $userChild->last_name;
                    echo $userChild->id . '<br/>';
                }

                session([
                    'childID' => $child->user_id,
                    'childFirstName' => $firstName,
                    'childLastName' => $lastName,
                ]);
            }
        }
    }

    /**
     * @return View
     */
    public function index() : View
    {
        $user = $this->getUser();

        $roleName = $this->getUserRoleName($user['roles_id']);

        $userMenu = $this->getUserMenu($user['roles_id']);

        $this->setSessionData($user['id'], $roleName);

        return view('home', [
            'user'      => $user,
            'roleName' => $roleName,
            'userMenu' => $userMenu
        ]);
    }
}