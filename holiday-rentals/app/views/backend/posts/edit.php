<h2 class="sub-header"><?php
    i18n::output( 'VIEW_UPDATE' , $data[ 'controller' ] ) ;
    ?></h2>
<?php
foreach ( $data[ 'results' ][ 'data' ] as $view )
{
    Form::start( Router::get( 'url' , false ) , "post" , true ) ;
    Form::label( 'title' , i18n::get( 'FORM_LABEL_TITLE' , 'system' ) ,
                                      "class='control-label'" ) ;
    Form::input( 'text' , 'title' , $view->Title , "class='form-control'" ) ;

    Form::label( 'start_date' ,
                 i18n::get( 'FORM_LABEL_START_DATE' , 'system' ) ,
                            "class='control-label'" ) ;
    Form::input( 'text' , 'start_date' ,
                 date( Date_Format , $view->Start_date ) ,
                       "class='form-control'" ) ;

    Form::label( 'end_date' , i18n::get( 'FORM_LABEL_END_DATE' , 'system' ) ,
                                         "class='control-label'" ) ;
    Form::input( 'text' , 'end_date' , date( Date_Format , $view->End_date ) ,
                                             "class='form-control'" ) ;

    Form::label( 'body' , i18n::get( 'FORM_LABEL_BODY' , 'system' ) ,
                                     "class='control-label'" ) ;
    Form::textarea( 'body' , " class='form-control'" , $view->Body ) ;



    foreach ( $data[ 'results' ][ 'categories' ] as $cat )
    {

        $extra = '' ;
        foreach ( $data[ 'results' ][ 'post_cat' ] as $post_cat )
        {

            if ( $post_cat->Cat_ID === $cat->ID )
            {
                $extra = "selected" ;
            }
        }

        if ( $cat->Parent_ID == 0 || $cat->ID == $cat->Parent_ID )
        {
            $options[] = Form::options( $cat->ID , '-' . $cat->Label , $extra ) ;
        }
        else
        {
            $options[] = Form::options( $cat->ID , $cat->Label , $extra ) ;
        }
    }

    $path     = URL . '../public/uploads/thumbs/' ;
    foreach ( $data[ 'results' ][ 'uploads' ] as $upload )
    {
        $selected = '' ;
        foreach ( $data[ 'results' ][ 'upload_item' ] as $upload_item )
        {
            $thumb = $path . $upload->Slug ;
            
            if ( $upload_item->Upload_ID == $upload->ID )
            {
                $selected = "selected " ;
            }
        }

        $uploads[] = Form::options( $upload->ID , $upload->Slug ,
                                    $selected . "data-img-src='$thumb'" ) ;
    }

    Form::label( 'category' , i18n::get( 'FORM_CATEGORIES' , 'system' ) ,
                                         "class='control-label'" ) ;
    Form::select( 'category[]' , $options , "multiple class='form-control'" ) ;

    Form::label( 'upload' , i18n::get( 'FORM_IMAGES' , 'system' ) ,
                                       "class='control-label'" ) ;

    Form::select( 'upload[]' , $uploads ,
                  "id='upload'  multiple class='form-control'" ) ;

    Form::space( 1 ) ;

    Form::input( 'hidden' , 'id' , $view->ID ) ;
    Form::submit( 'submit' , i18n::get( 'FORM_SUBMIT_SAVE' , 'system' ) ,
                                        "class='form-control btn-success'" ) ;
    Form::end() ;
}