<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function viewProfile()
    {
        
        return $this->renderView('user/view_profile');
    }

    public function editProfile()
    {
        return $this->renderView('user/edit_profile');

    }

    public function updateProfile()
    {
        $session = session()->get('user');
        $userModel = new UserModel();

        $userModel->update($session['id'], [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'mobile_number' => $this->request->getPost('mobile')
        ]);
        

        return redirect()->to('/user/profile')->with('success', 'Profile updated successfully!');
    }
}
