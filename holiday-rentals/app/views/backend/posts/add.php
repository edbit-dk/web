<h2 class="sub-header">
    <?php
    i18n::output( 'VIEW_CREATE' , $data[ 'controller' ] ) ;
    ?>
</h2>
<?php
Form::start( Router::get( 'url' , false ) , "post" , true ) ;
Form::label( 'title' , i18n::get( 'FORM_LABEL_TITLE' , 'system' ) ,
                                  "class='control-label'" ) ;
Form::input( 'text' , 'title' , Input::exists( Input::get( 'title' ) ) ,
                                                           "class='form-control' required" ) ;

Form::label( 'start_date' , i18n::get( 'FORM_LABEL_START_DATE' , 'system' ) ,
                                       "class='control-label'" ) ;

Form::input( 'text' , 'start_date' , date( 'Y-m-d H:i' ) ,
                                           "class='form-control' required" ) ;

Form::label( 'end_date' , i18n::get( 'FORM_LABEL_END_DATE' , 'system' ) ,
                                     "class='control-label'" ) ;
Form::input( 'text' , 'end_date' , null , "class='form-control' required" ) ;

Form::label( 'body' , i18n::get( 'FORM_LABEL_BODY' , 'system' ) ,
                                 "class='control-label'" ) ;
Form::textarea( 'body' , " class='form-control'" ,
                Input::exists( Input::get( 'body' ) ) ) ;

foreach ( $data[ 'results' ][ 'categories' ] as $cat )
{

    if ( $cat->Parent_ID == 0 || $cat->ID == $cat->Parent_ID )
    {
        $options[] = Form::options( $cat->ID , '-' . $cat->Label ) ;
    }
    else
    {
        $options[] = Form::options( $cat->ID , $cat->Label ) ;
    }
}
$path = URL . '../public/uploads/thumbs/' ;
foreach ( $data[ 'results' ][ 'uploads' ] as $upload )
{
    $thumb     = $path . $upload->Slug ;
    $uploads[] = Form::options( $upload->ID , $upload->Slug ,
                                "data-img-src='$thumb'" ) ;
}


Form::label( 'category' , i18n::get( 'FORM_CATEGORIES' , 'system' ) ,
                                     "class='control-label'" ) ;
Form::select( 'category[]' , $options , "multiple class='form-control' required" ) ;

Form::label( 'upload' , i18n::get( 'FORM_FILE' , 'system' ) ,
                                   "class='control-label'" ) ;
Form::select( 'upload[]' , $uploads , "multiple id='upload' class='form-control' required" ) ;


Form::space( 1 ) ;

Form::submit( null , i18n::get( 'FORM_SUBMIT_SAVE' , 'system' ) ,
                                "class='form-control btn-success'" ) ;
Form::end() ;

