<?php

class Rediger extends Controller
{

    public
            function produkt( $ID )
    {
        $product_model = $this->loadModel( 'ProductModel' ) ;
        $product       = $product_model->getProduct( $ID ) ;

        $cat_model = $this->loadModel( 'CategoryModel' ) ;
        $cats      = $cat_model->getCategories() ;

        $img_model = $this->loadModel( 'ImageModel' ) ;
        $images    = $img_model->getImagesToProduct( $ID ) ;

        $this->adminView( 'pages/edit/product' ,
                          ( object ) array(
                    'product' => ( object ) $product ,
                    'cats'    => ( object ) $cats ,
                    'images'  => ( object ) $images
        ) ) ;
    }

    public
            function side( $ID )
    {
        $page_model = $this->loadModel( 'PageModel' ) ;
        $pages      = $page_model->getPageByID( $ID ) ;
        foreach ( $pages as $page )
        {
            ?>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#editor"
        });
    </script>
            <form action="<?php echo URL ; ?>update/page/<?php echo $page->ID ; ?>" method="post">
                <textarea id="editor" cols="100" rows="25" name="content">
                    <?php echo Output::decode( $page->Content ) ; ?>
                </textarea>
                <input type="submit" re>
            </form>
            <?php
        }
    }

    public
            function indstillinger()
    {
        
    }

}
