<h2 class="sub-header"><?php
    i18n::output( 'VIEW_SUB_HEADER' , $data[ 'controller' ] ) ;
    ?></h2>
<?php
if ( !empty( $data[ 'results' ][ 'data' ] ) )
{
    ?>
    <div class="table-responsive">
        <?php
        Table::start( "class='table table-striped'" ) ;
        Table::head( array(
            'ID' ,
            i18n::get( 'VIEW_TITLE' , $data[ 'controller' ] ) ,
            i18n::get( 'VIEW_CREATED' , $data[ 'controller' ] ) ,
            i18n::get( 'VIEW_UPDATED' , $data[ 'controller' ] ) ,
            i18n::get( 'VIEW_AUTHOR' , $data[ 'controller' ] ) ,
            i18n::get( 'CRUD_ACTIONS' , 'system' )
        ) ) ;
        foreach ( $data[ 'results' ][ 'data' ] as $view )
        {
            // Check dates
            $updated = "" ;
            $created = "" ;

            if ( $view->Updated < 0 )
            {
                $updated = date( Date_Format , $view->Updated ) ;
            }

            if ( $view->Created > 0 )
            {
                $created = date( Date_Format , $view->Created ) ;
            }


            foreach ( $data[ 'results' ][ 'author' ] as $author )
            {
                
            }

            $form = "<form action='" . URL . "crud/delete/posts/" . $data[ 'type' ] . "/remove/" . $data[ 'type' ] . "' method='post' onsubmit=\"return confirm('Er du sikker?')\"><input type='hidden' name='id' value='" . $view->ID . "'>"
                    . "<input type='submit' value='" . i18n::get( 'VIEW_DELETE' ,
                                                                  $data[ 'controller' ] ) . "' class='btn btn-danger'></form>" ;

            Table::data( array(
                "#" . $view->ID ,
                $view->Title . " <small>(" . $view->Slug . ")</small>" ,
                $created ,
                $updated ,
                $author->Firstname . " <small>(" . $author->Username . ")</small>" ,
                "<a class='btn btn-success' href='" . URL . 'crud/update/posts/' . $data[ 'type' ] . '/edit/' . $view->ID . "'>" . i18n::get( 'VIEW_UPDATE' ,                                                                                                                             $data[ 'controller' ] ) . "</a>" ,
                $form
            ) ) ;
        }
        Table::end() ;
        ?>
    </div>
    <p>Sider:</p>
    <?php
    for ( $x = 1 ; $x <= $data[ 'results' ][ 'total' ] ; $x++ )
    {
        ?>
        <a class="btn btn-default" href="<?php echo URL . "crud/read/posts/" . $data[ 'type' ] . "/view/" . $x ; ?>"><?php echo $x ; ?></a>
        <?php
    }
}
else
{
    ?>
    <p><?php i18n::output( 'NO_RESULTS' , 'system' ) ?></p>
    <?php
}