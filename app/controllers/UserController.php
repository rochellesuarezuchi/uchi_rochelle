<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
         $this->call->model('UsersModel');

        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }

        $records_per_page = 10;

        $user = $this->UsersModel->page($q, $records_per_page, $page);
        $data['users'] = $user['records'];
        $total_rows = $user['total_rows'];

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('custom');
        $this->pagination->set_custom_classes([

        'nav'    => 'flex justify-center mt-6',
         'ul'     => 'flex space-x-2',
         'li'     => 'list-none',
         'a'      => 'px-3 py-1 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-blue-500 hover:text-white transition',
        'active' => 'bg-blue-600 text-white font-bold border-blue-600'

        ] );


        $this->pagination->initialize($total_rows, $records_per_page, $page, 'users?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $this->call->view('users/index', $data);
    }
    
    function create()
    {
        if($this->io->method()=='post')
        {
           $username = $this->io->post('username');
           $email = $this->io->post('email');

           $data=array('username' => $username, 'email' => $email);
           if($this->UsersModel->insert($data))
            {
              redirect();
            } else 
            {
                echo "Error";
            }
        }
         else
        {
           $this->call->view('users/create');
        }

    }
    
     function update($id)
     {
         $user = $this-> UsersModel -> find($id);
     if(!$user)
     {
        echo "User not found";
        return;
     }
         if($this->io->method()=='post')
        {
           $username = $this->io->post('username');
           $email = $this->io->post('email');

           $data=array('username' => $username,
            'email' => $email);

           if($this->UsersModel->update($id, $data))
           {
            redirect();
           }
           else{
            echo "error updating";
           }
        }
     else
     {
     $data['user'] = $user;
     $this->call->view('users/update', $data);
     }
   }
   function delete($id)
   {
    if($this->UsersModel->delete($id))
    {
        redirect();
    }
    else{
        echo "Error deleting";
    }
   }

}
