<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Send extends Controller {

    public function newsletter($ID) {
        $subscribe_model = $this->loadModel('SubscribeModel');
        (object) $subscribers = $subscribe_model->getSubscribers();

        $newsletter_model = $this->loadModel('NewsletterModel');
        (object) $newsletters = $newsletter_model->getNewsletter($ID);

        foreach ($subscribers as $subscriber) {
            foreach ($newsletters as $newsletter) {
                $Subject = $newsletter->Name . ' - ' . date("d/m/y", $newsletter->Date);
                $Body = $newsletter->Body;
            }
            $EmailFrom = EMAIL_FROM;
            $EmailTo = $subscriber->Email;
            $username = $subscriber->Name;
            // Email Headers with UTF-8 encoding
            $email_header = "From: $EmailFrom \r\n";
            $email_header .= "Content-Type: text/html; charset=UTF-8\r\n";
            $email_header .= "Reply-To: $EmailFrom \r\n";
            mail($EmailTo, $Subject, $Body, $email_header);
        }

        $newsletter_model->update(array(
            'Status' => 1
        ), $ID);

        Session::flash('admin_feedback', '<h2 class="text-success" >Newsletter send!</h2>');
        Redirect::to(URL . '#controlpanel');
    }

}
