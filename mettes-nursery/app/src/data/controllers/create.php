<?php

class Create extends Controller
{

    public
            function order()
    {
 
        if ( !Session::exists( 'products' )) 
        {
            Session::put( 'FEEDBACK' ,
                          '<p style="color: red;">Kurv tom. Tilføj produkter til kurven for at fortsætte.</p>' ) ;
            Redirect::to( URL . 'butikken/kassen' ) ;
        }
        if ( !Session::exists( 'order' ) )
        {
            $x = 0 ;
            foreach ( $_POST[ 'amount' ] as $value )
            {
                $order[ $x ][ 'ID' ]     = $_POST[ 'ID' ][ $x ] ;
                $order[ $x ][ 'amount' ] = $_POST[ 'amount' ][ $x ] ;
                $order[ $x ][ 'stk' ]    = $_POST[ 'stk' ][ $x ] ;
                $order[ $x ][ 'name' ]   = $_POST[ 'name' ][ $x ] ;
                $order[ $x ][ 'price' ]  = $_POST[ 'price' ][ $x ] ;
                $x++ ;
            }


            Session::put( 'subtotal' , $_POST[ 'subtotal' ] ) ;
            Session::put( 'order' , $order ) ;

            Redirect::to( URL . 'create/order' ) ;
        }
        else
        {
            if ( !Session::get( 'User' ) )
            {
                Session::flash( 'FEEDBACK' ,
                                '<p style="color: red;">Log ind for at fortsætte.</p>' ) ;
                Redirect::to( URL . 'log-ind' ) ;
            }
            elseif ( Session::exists( 'User' ) && Session::exists( 'order' ) )
            {

                $order_model = $this->loadModel( 'OrderModel' ) ;

                $order_model->createOrder( array(
                    'Date'        => time() ,
                    'Total'       => preg_replace( '/[^0-9.]*/' , '' ,
                                                   Session::get( 'subtotal' ) ) ,
                    'Status_ID'   => 1 ,
                    'Customer_ID' => Session::get( 'User' )
                ) ) ;


                $Order_ID      = $order_model->getLastOrderID() ;
                $product_model = $this->loadModel( 'ProductModel' ) ;
                foreach ( Session::get( 'order' ) as $value )
                {
                    $order_model->createDetails( array(
                        'Product'  => Input::encode( $value[ 'name' ] ) ,
                        'Quantity' => Input::encode( $value[ 'amount' ] ) ,
                        'Price'    => Input::encode( $value[ 'stk' ] ) ,
                        'Subtotal' => Input::encode( $value[ 'price' ] ) ,
                        'Order_ID' => $Order_ID
                    ) ) ;

                    $stock = $product_model->getStock( $value[ 'ID' ] ) ;

                    $new_stock = $stock[ 0 ]->Stock - $value[ 'amount' ] ;
                    $product_model->update( array(
                        'Stock' => $new_stock
                            ) , $value[ 'ID' ] ) ;
                }

                Session::delete( 'products' ) ;
                Session::delete( 'order' ) ;
                //Cache::clear() ;
                Redirect::to( URL . 'tak' ) ;
            }
        }
    }

    public
            function cart()
    {
        if ( Input::exists() )
        {
            $x = 0 ;
            foreach ( $_POST[ 'checkbox' ] as $value )
            {
                $products[ $x ][ 'ID' ]     = $_POST[ 'ID' ][ $value ] ;
                $products[ $x ][ 'amount' ] = $_POST[ 'amount' ][ $value ] ;
                $products[ $x ][ 'name' ]   = $_POST[ 'name' ][ $value ] ;
                $products[ $x ][ 'stk' ]    = $_POST[ 'price' ][ $value ] ;
                $products[ $x ][ 'price' ]  = $_POST[ 'price' ][ $value ] ;

                foreach ( $products as $item )
                {
                    $products[ $x ][ 'price' ] = $item[ 'amount' ] * $item[ 'price' ] ;
                }
                $x++ ;
            }

            if ( !Session::exists( 'products' ) )
            {
                Session::put( 'products' , $products ) ;
                //Cache::clear() ;
                Redirect::to( URL . 'butikken' ) ;
            }
            else
            {
                foreach ( $products as $value )
                {
                    Session::push( 'products' , $value ) ;
                }
                //Cache::clear() ;
                Redirect::to( URL . 'butikken/kassen' ) ;
            }
        }
    }

    public
            function item()
    {
        if ( Input::exists() )
        {
            $product[ 0 ][ 'amount' ] = $_POST[ 'amount' ] ;
            $product[ 0 ][ 'stk' ]    = $_POST[ 'price' ] ;
            $product[ 0 ][ 'price' ]  = $_POST[ 'amount' ] * $_POST[ 'price' ] ;
            $product[ 0 ][ 'name' ]   = $_POST[ 'name' ] ;

            if ( !Session::exists( 'products' ) )
            {
                Session::put( 'products' , $product ) ;
                Cache::clear() ;
                Redirect::to( URL . 'butikken' ) ;
            }
            else
            {
                foreach ( $product as $value )
                {
                    Session::push( 'products' , $value ) ;
                }
                Cache::clear() ;
                Redirect::to( URL . 'butikken/kassen' ) ;
            }
        }
    }

    public
            function customer()
    {
        if ( Input::exists() )
        {
            $validate   = $this->loadModel( 'ValidateModel' ) ;
            $validation = $validate->check( $_POST ,
                                            array(
                'username'  => array(
                    'required' => true ,
                    'min'      => 4 ,
                    'max'      => 32 ,
                    'notTaken' => USERS_TABLE
                ) ,
                'password'  => array(
                    'required'  => true ,
                    'min'       => 4 ,
                    'max'       => 32 ,
                    'validPass' => Input::get( 'password' )
                ) ,
                'email'     => array(
                    'required'   => true ,
                    'min'        => 4 ,
                    'max'        => 254 ,
                    'validEmail' => Input::get( 'email' ) ,
                    'notTaken'   => USERS_TABLE
                ) ,
                'firstname' => array(
                    'required' => true ,
                    'min'      => 2 ,
                    'max'      => 64
                ) ,
                'lastname'  => array(
                    'required' => true ,
                    'min'      => 2 ,
                    'max'      => 64
                ) ,
                'address'   => array(
                    'required' => true ,
                    'min'      => 2 ,
                    'max'      => 254
                )
                    ) ) ;

            if ( $validation->passed() )
            {
                try
                {
                    $user = $this->loadModel( 'UserModel' ) ;
                    $user->create( array(
                        USER_USERNAME  => Input::encode( Input::get( 'username' ) ) ,
                        USER_PASSWORD  => Password::hash( Input::encode( Input::get( 'password' ) ) ) ,
                        USER_EMAIL     => Input::encode( Input::get( 'email' ) ) ,
                        USER_FIRSTNAME => Input::encode( Input::get( 'firstname' ) ) ,
                        USER_LASTNAME  => Input::encode( Input::get( 'lastname' ) ) ,
                        USER_ADDRESS   => Input::encode( Input::get( 'address' ) )
                    ) ) ;

                    Session::flash( 'FEEDBACK' ,
                                    '<p style="color: green;" >Du er nu oprettet og kan logge ind!</p>' ) ;
                    Cache::clear() ;
                    Redirect::to( URL . 'log-ind' ) ;
                }
                catch ( Exception $e )
                {
                    die( $e->getMessage() ) ;
                }
            }
            else
            {
                foreach ( $validation->errors() as $error )
                {
                    $errors[] = $error ;
                }

                Session::flash( 'ERRORS' , $errors ) ;
                Cache::clear() ;
                Redirect::to( URL . 'opret-kunde' ) ;
            }
        }
    }

    public
            function message()
    {
        $message_model = $this->loadModel( 'MessageModel' ) ;
        $message_model->create( array(
            'Name'    => Input::encode( Input::get( 'name' ) ) ,
            'Subject' => Input::encode( Input::get( 'subject' ) ) ,
            'Email'   => Input::encode( Input::get( 'email' ) ) ,
            'Content' => Input::encode( Input::get( 'content' ) )
        ) ) ;

        Session::flash( 'FEEDBACK' ,
                        '<p style="color: green;">Besked sendt!</p>' ) ;
        Redirect::to( URL . 'kontakt' ) ;
    }

}
