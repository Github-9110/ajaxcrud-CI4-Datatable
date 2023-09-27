<?php
namespace App\Controllers;
use App\Models\StudentModel;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function store() 
    {   $model = new StudentModel();
          
        $data = array(
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'course' => $this->request->getPost('course')
        );

        
        $model->save($data);
        $data = array('status' => 'student inserted successfully..!');
        return $this->response->setJSON($data);
    }

    public function fetch(){
        $model = new StudentModel();
         $data['data'] = $model->where('is_deleted',0)->where('image',NULL)->findAll();
        return $this->response->setJSON($data);
    }

    public function removedata(){
        $model = new StudentModel();
       $id = $this->request->getPost('id'); 
       $data =  array(
                'is_deleted' => 1
               );
        $model->update($id,$data);
        $data = array('status' => "Record Deleted Successfully..!");
        return $this->response->setJSON($data);

    }

    public function editdata(){
        
        $id = $this->request->getPost('id');
        $model = new StudentModel();
        $data['records'] = $model->where('id',$id)->find();
        return $this->response->setJSON($data);
    }

    public function updatedata(){
        $model = new StudentModel();
        $id = $this->request->getPost('id');
        $data = array(
        "id" => $this->request->getPost('id'),
        "name" => $this->request->getPost('name'),
        "email" => $this->request->getPost('email'),
        "phone" => $this->request->getPost('phone'),
        "course" => $this->request->getPost('course')
        );

        $model->where('is_deleted',0)->update($id,$data);
       $data['status'] = array('status'=>'record updated successfully...!');
       return $this->response->setJSON($data);
    }

    // upload images functions

    public function imgform(){
        return view('imgform');
    }

    public function upload(){
        $model = new StudentModel();
            $msg = 'Please select a valid files';
    
            if ($this->request->getFileMultiple('images')) {
     
                 foreach($this->request->getFileMultiple('images') as $file)
                 {   
     
                    $file->move(WRITEPATH . 'uploads');
     
                  $data = [
                    'image' =>  $file->getClientName(),
                    // 'type'  => $file->getClientMimeType()
                  ];
     
                  $save = $model->save($data);
                  $msg = 'Files have been successfully uploaded';
                 }
            }
     
            return redirect()->to( base_url('/imgform') )->with('msg', $msg);        
        }
   
}
