<?php

class Files extends Controller {

    public function upload() {

        $user = $this->loadModel('User');
        $company = $user->data()->Company_ID;
        $ID = $user->data()->ID;

        $filename = Input::escape(Input::get('File', 'name'));

        $model = $this->loadModel('Upload');
        $model->upload(array(
            'File' => Input::escape(Input::get('File', 'name')),
            'Date' => LOCAL_TIMESTAMP,
            'Album_ID' => Input::escape(Input::get('Album')),
            'Type_ID' => Input::escape(Input::get('Type')),
            'Company_ID' => $company,
            'User_ID' => $ID
        ));

        copy(Input::escape(Input::get('File', 'tmp_name')), UPLOADS . $filename);
        Session::flash('errors', '<p>File uploaded successfully!</p>');
        Redirect::to(URL . 'account/uploads');
    }

    public function remove($file, $ID) {
        $model = $this->loadModel('Upload');
        $model->delete($ID);
        if (!unlink(UPLOADS . $file)) {
            Session::flash('errors', '<p>Removing file failed!</p>');
            Redirect::to(URL . 'account/uploads');
        } else {
            Session::flash('errors', '<p>File removed successfully!</p>');
            Redirect::to(URL . 'account/uploads');
        }
    }
}
    