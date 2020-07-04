<?php use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'user_meta', 'Partenaires' )
    ->add_fields( array(
        Field::make( 'text', 'crb_name', 'Nom de lorganisme' ),
        Field::make( 'image', 'crb_image', 'Logo de organisme' ),
    ) );
?>